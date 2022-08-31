<?php

namespace App\Http\Controllers;

use Analytics;
use App\Models\Rule;
use App\Models\Reading;
use App\Models\Category;
use App\Models\Employee;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use App\Models\EmployeeQuizResponse;

class AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num_items = 10;

        $quizNoAnswereds  = QuizQuestion::whereDoesntHave("employee_quiz_responses")
        ->get()->forPage(1, $num_items);
        
        $quizAnswereds    = QuizQuestion::whereHas("employee_quiz_responses")
        ->withCount("employee_quiz_responses")
        ->orderBy("employee_quiz_responses_count", 'desc')
        ->get()->forPage(1, $num_items);
        
        $quizBadAnswereds = QuizQuestion::whereHas("employee_quiz_responses", function ($query){
            $query->where("correct", false);
        })
        ->withCount("employee_quiz_responses")
        ->orderBy("employee_quiz_responses_count", 'desc')
        ->get()->forPage(1, $num_items);

        $quizGoodAnswereds = QuizQuestion::whereHas("employee_quiz_responses", function ($query){
            $query->where("correct", true);
        })
        ->withCount("employee_quiz_responses")
        ->orderBy("employee_quiz_responses_count", 'desc')
        ->get()->forPage(1, $num_items);

        $rulesMoreRead = Rule::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->get()->forPage(1, $num_items);

        $employee_quiz_responses_total = EmployeeQuizResponse::count();

        $categoriesMoreRead = Category::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->get()->forPage(1, $num_items);

        $bestEmployees = Reading::groupBy('employee_id')
            ->selectRaw('count(*) as readings_count, employee_id')
            ->with('employee')
            ->orderBy('readings_count', 'desc')
            ->get()->forPage(1, $num_items);
        
       // $analyticsData  = Analytics::fetchMostVisitedPages(Period::days(7));

        $total_quizzes  = QuizQuestion::count();
        $total_rules    = Rule::count();
        $total_employees= Employee::count();
        $total_readings = Reading::count(); 

        return view('analyze.index', compact('total_quizzes',
                                             'total_rules', 
                                             'total_employees',
                                             'total_readings', 
                                             'quizNoAnswereds', 
                                             'quizGoodAnswereds',
                                             'quizBadAnswereds',
                                             'rulesMoreRead',
                                             'categoriesMoreRead',
                                             'bestEmployees',
                                             'employee_quiz_responses_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
