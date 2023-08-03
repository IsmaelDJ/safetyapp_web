<?php

namespace App\Http\Controllers;

use stdClass;
use Carbon\Carbon;
use App\Models\Rule;
use App\Models\User;
use App\Models\Driver;
use App\Models\Reading;
use App\Models\Category;
use App\Models\Presence;
use App\Charts\ReadingChart;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Exports\DriversExport;
use App\Exports\DriversExportPDF;
use App\Models\DriverQuizResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $drivers = Driver::where('role', 'driver')->paginate(driversPerPage());
        return view('drivers.index', compact('drivers'));
    }


    public function create()
    {
        $this->authorize('create', Driver::class);
        $users = User::where('role', 'transporteur')->get();
        return view('drivers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $driver = new Driver();

        if(Gate::allows('doAdvanced')){
            $request->validate(
                [
                    'obc'       =>'required|unique:drivers',
                    'name'      =>'required',
                    'user_id'   =>'required',
                    'phone'     =>'required',
                ]
            );

            $driver->user_id    = $request->user_id;
        }
        else {
            $request->validate(
                [
                    'obc'       =>'required|unique:drivers',
                    'name'      =>'required',
                    'phone'     =>'required',
                ]
            );
     
            $driver->user_id    = Auth::user()->id;
        }
     
        $password = rand(1000,9999);

        if(isset($request->avatar)){
            $request->validate([
                'avatar'    =>'required|image|mimes:jpeg,png,jpg',
            ]);
            $driver->avatar = uploadFile($request, 'avatar','driver_avatar');
        }

        $driver->name       = $request->name;
        $driver->phone      = $request->phone;
        $driver->obc        = $request->obc;
        $driver->user_id    = $request->user_id;
        $driver->password   = $password;
        $driver->role       = 'driver';

        $driver->save();
        return redirect()->route('drivers.index')->with('success', "Chauffeur ajouté");
    }

    public function show(Driver $driver)
    {
        $data = [];

        $events_quiz = DriverQuizResponse::with("driver")
        ->with('quiz_question')
        ->where('driver_id', $driver->id)
        ->get();

        $events_rule = Reading::with('driver')
        ->with('rule')
        ->where('driver_id', $driver->id)
        ->get();

        $events_presence = Presence::with('driver')
        ->get();

        foreach($events_quiz as $event){
            $tmp = new stdClass();
            $tmp->type      = 1;
            $tmp->action    = $event->quiz_question;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        foreach($events_rule as $event){
            $tmp = new stdClass();
            $tmp->type      = 2;
            $tmp->action    = $event->rule;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        foreach($events_presence as $event){
            $tmp = new stdClass();
            $tmp->type      = 3;
            $tmp->action    = 'Lancement de l\'aplication';
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        $data = m_paginate(collect($data)->sortBy('created_at'), 4);
        $data->setPath('/drivers/'.$driver->id);

        $reading_per_month = Reading::select('id', 'driver_id', 'created_at')
        ->where('driver_id', $driver->id)
        ->whereYear('created_at', now()->year)
        ->get()
        ->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $reading_per_month_labels = [];
        $reading_per_month_data  = [];

        foreach($reading_per_month as $month => $readings){
            $reading_per_month_labels[] = $month;
            $reading_per_month_data [] = count($readings);
        }

        $readingChart = new ReadingChart();
        $readingChart->labels($reading_per_month_labels);
        $readingChart->label("Lecture");
        $readingChart->displayLegend(false);
        $readingChart->height(250);
        $readingChart->dataset('Lecture par moi', 'line', $reading_per_month_data)
        ->options([
            'height'=> '330'
        ]);

        $total_quizzes     = DriverQuizResponse::where('driver_id', $driver->id)->get()->groupBy('quiz_question_id')->count();
        $total_rules       = Reading::where('driver_id', $driver->id)->get()->groupBy('rule_id')->count(); 

        $userdrivers = Driver::where('user_id', $driver->user_id)->paginate(driversPerPage());
        return view('drivers.show', compact('driver', 'userdrivers', 'data', 'readingChart', 'total_quizzes', 'total_rules'));
    }

    public function edit(Driver $driver)
    {
        $users = User::where('id','!=',$driver->user_id)->get();
        return view('drivers.edit',compact('driver','users'));
    }


    public function update(Request $request, Driver $driver)
    {
        if ($request->hasFile('avatar')) {
            $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif']);
            if (file_exists(public_path($driver->avatar)) and !empty($driver->avatar)) {
                unlink(public_path($driver->avatar));
            }
            $driver->avatar = uploadFile($request, 'avatar','driver_avatar');
        }

        if(Gate::allows('doAdvanced')){
            $request->validate(
                [
                    'obc'    => 'required',
                    'name'   =>'required',
                    'user_id'=>'required',
                    'phone'  =>'required',
                ]);
            
            $driver->user_id = $request->user_id;
        }

        else {
            $request->validate(
                [
                    'obc'  => 'required',
                    'name' =>'required',
                    'phone'=>'required',
                ]
            );
            
            $driver->user_id = Auth::user()->id;
        }

        $driver->name    = $request->name;
        $driver->phone   = $request->phone;
        $driver->obc     = $request->obc;

        $driver->update();
        return redirect()->route('drivers.index')->with('success', "Chauffeur modifié");
    }


    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', "Chauffeur supprimé !");
    }

    public function export_xlsx(){
        return Excel::download(new DriversExport, date('YmdHis').'_'.'drivers.xlsx');
    }

    public function export_pdf(){
        $data = [];
        $drivers = Driver::with('user')->where('role', 'driver')->get();

        $iteration = 0;
        foreach($drivers as $driver){
            $iteration += 1;
            $tmp = new stdClass();
            $tmp->number    = $iteration;
            $tmp->name      = $driver->name;
            $tmp->carrier   = $driver->user->name;
            $tmp->obc       = $driver->obc;
            $tmp->phone     = $driver->phone;
            $tmp->password  = $driver->password;
            
            $data[] = $tmp;
        }

        $drivers = collect($data);

        return view('drivers.export_pdf', compact('drivers'));
    }
}
