<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Role;
use App\Models\Rule;
use App\Models\User;
use App\Models\Driver;
use App\Models\Carrier;
use App\Models\Reading;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Presence;
use App\Charts\ChartChart;
use App\Charts\ReadingChart;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\DriverQuizResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'role'    => 'required',
            'password'=> 'required',
            'avatar'  => 'required|image|mimes:jpg,jpeg,png'
        ]);

        if($request->has('phone')){
            $request->validate([
                'phone'  =>'required',
                'address'=>'required',
            ]);
        }

        $avatar = uploadFile($request, 'avatar', 'user_avatar');

        $user = User::create([
            'role'     => $request['role'],
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
            'avatar'   => $avatar,
        ]);

        if($request->has('phone')){
            Carrier::create([
                'user_id' => $user->id,
                'phone'   => $request->phone,
                'address' => $request->address,
            ]);            
        }

        return redirect()->route('root');
    }

    public function register(){
        return view('auth.register');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root(Request $request )
    {
        $param_month = $request->query('month');

        $quizNoAnswereds  = QuizQuestion::whereDoesntHave("driver_quiz_responses")
        ->paginate(10);
        
        $quizAnswereds    = QuizQuestion::whereHas("driver_quiz_responses")
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->paginate(10);
        
        $quizBadAnswereds = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", false);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->paginate(10);

        $quizGoodAnswereds = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", true);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->paginate(10);

        $rulesMoreRead = Rule::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->paginate(10);

        $driver_quiz_responses_total = DriverQuizResponse::count();

        $categoriesMoreRead = Category::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->paginate(10);

        $bestDrivers = Reading::groupBy('driver_id')
            ->selectRaw('count(*) as readings_count, driver_id')
            ->with('driver')
            ->orderBy('readings_count', 'desc')
            ->paginate(10);
        
       // $analyticsData  = Analytics::fetchMostVisitedPages(Period::days(7));

        $total_quizzes  = QuizQuestion::count();
        $total_rules    = Rule::count();
        $total_drivers  = Driver::count();
        $total_readings = Reading::count(); 


        //get presence data
        $presences = Presence::whereYear('created_at', now()->year)
        ->whereMonth('created_at', ($param_month != null) ? $param_month : now()->month)
        ->with('driver')
        ->get()
        ->groupBy(function($data){
            return $data->created_at->day;
        });

        $prensence_labels = [];
        $prensence_data   = [];

        foreach($presences as $day=>$values){
            $prensence_labels[] = $day;
            $prensence_data[]   = count($values);
        }

        $presenceChart = new ReadingChart();

        $presenceChart->labels($prensence_labels);
        $presenceChart->displayLegend(false);
        $presenceChart->label(false);
        $presenceChart->dataset('Présence par jour', 'spline', $prensence_data)
        ->options([
            'color' => 'hsla(209, 100%, 53%, 1)'
        ]);

        $months = [" janv", "févr", "mars", "avri", "mai", "juin", "juil", 
                "août", "sept", "octo", "nove", "déce"];
        $current_month = ($param_month != null) ? $param_month : now()->month;

        return view('index',  compact('total_quizzes',
                                             'total_rules', 
                                             'total_drivers',
                                             'total_readings', 
                                             'quizNoAnswereds', 
                                             'quizGoodAnswereds',
                                             'quizBadAnswereds',
                                             'rulesMoreRead',
                                             'categoriesMoreRead',
                                             'bestDrivers',
                                             'presenceChart',
                                             'months',
                                             'current_month',
                                             'driver_quiz_responses_total'));
    }

    public function search($term){
        $data = [];

        $quiz = QuizQuestion::where('description', 'LIKE', '%'.$term.'%')
        ->get();

        $rule = Rule::where('description', 'LIKE', '%'.$term.'%')
        ->get();

        foreach($quiz as $event){
            $tmp = new stdClass();
            $tmp->type      = 1;
            $tmp->content    = $event;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        foreach($rule as $event){
            $tmp = new stdClass();
            $tmp->type      = 2;
            $tmp->content    = $event;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        $data = m_paginate(collect($data)->sortBy('created_at'), 6);
        $data->setPath("/search/".$term);
        return view('search.index', compact('data'));
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
            $user->avatar = '/images/' . $avatarName;
        }

        $user->update();

        if($request->has('phone')){
            $request->validate([
                'phone'  =>'required',
                'address'=>'required',
            ]);
        }

        if($request->has('phone')){
            Carrier::create([
                'user_id' => $user->id,
                'phone'   => $request->phone,
                'address' => $request->address,
            ]);            
        }

        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return response()->json([
                'isSuccess' => true,
                'Message' => "User Details Updated successfully!"
            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return response()->json([
                'isSuccess' => true,
                'Message' => "Something went wrong!"
            ], 200); // Status code here
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
