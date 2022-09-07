<?php

namespace App\Http\Controllers;

use stdClass;
use Carbon\Carbon;
use App\Models\Rule;
use App\Models\Reading;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Presence;
use App\Models\Contractor;
use App\Charts\ReadingChart;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\EmployeeQuizResponse;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::paginate(contractorsPerPage());
        return view('employees.index', compact('employees'));
    }


    public function create()
    {

        $contractors = Contractor::get();
        return view('employees.create', compact('contractors'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'contractor_id'=>'required',
                'phone'=>'required'
            ]
        );
        $uid = 0;
        do{
            $uid = rand(1000,9999) ."";
        }while(Employee::where('uid',$uid)->exists());
        $password = rand(1000,9999);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->contractor_id = $request->contractor_id;
        $employee->uid = $uid;;
        $employee->password = $password;

        $employee->save();
        return redirect()->route('employees.index')->with('success', "Sous-traitant ajouté");
    }

    public function show(Employee $employee)
    {
        $data = [];

        $events_quiz = EmployeeQuizResponse::with("employee")
        ->with('quiz_question')
        ->where('employee_id', $employee->id)
        ->get();

        $events_rule = Reading::with('employee')
        ->with('rule')
        ->where('employee_id', $employee->id)
        ->get();

        $events_presence = Presence::with('employee')
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
        $data->setPath('/employees/'.$employee->id);

        $reading_per_month = Reading::select('id', 'employee_id', 'created_at')
        ->where('employee_id', $employee->id)
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
        $readingChart->dataset('Lecture par moi', 'line', $reading_per_month_data)
        ->options([
            'height'=> '330'
        ]);

        $total_quizzes     = EmployeeQuizResponse::where('employee_id', $employee->id)->get()->groupBy('quiz_question_id')->count();
        $total_rules       = Reading::where('employee_id', $employee->id)->get()->groupBy('rule_id')->count(); 

        $contractorEmployees = Employee::where('contractor_id', $employee->contractor_id)->paginate(employeesPerPage());
        return view('employees.show', compact('employee', 'contractorEmployees', 'data', 'readingChart', 'total_quizzes', 'total_rules'));
    }

    public function edit(Employee $employee)
    {
        $contractors = Contractor::where('id','!=',$employee->contractor_id)->get();
        return view('employees.edit',compact('employee','contractors'));
    }


    public function update(Request $request, Employee $employee)
    {

        $request->validate(
            [
                'name'=>'required',
                'contractor_id'=>'required',
                'phone'=>'required'
            ]
        );


        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->contractor_id = $request->contractor_id;

        $employee->update();
        return redirect()->route('employees.index')->with('success', "Utilisateur modifié");
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', "Utilisateur supprimé !");
    }
}
