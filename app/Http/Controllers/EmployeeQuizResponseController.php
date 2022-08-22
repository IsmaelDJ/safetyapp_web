<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\EmployeeQuizResponse;

class EmployeeQuizResponseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    public function index()
    {
        $employeeQuizResponses = EmployeeQuizResponse::paginate();
        //dd($employeeQuizResponses->employee_quiz_responses->first()->quiz_question);
        return view('employee_quiz_responses.index', compact('employeeQuizResponses'));
    }

    public function quizzes($quiz_question_id)
    {
        $quizQuestion          = QuizQuestion::findOrFail($quiz_question_id);
        $employeeQuizResponses = EmployeeQuizResponse::where('quiz_question_id', $quiz_question_id)->paginate();
        return view('employee_quiz_responses.quiz', compact('employeeQuizResponses', 'quizQuestion'));
    }

    public function employees($employee_id)
    {
        $employee = Employee::find($employee_id);
        $employeeQuizResponses = EmployeeQuizResponse::where('employee_id', $employee_id)->paginate();
        return view('employee_quiz_responses.employee', compact('employeeQuizResponses', 'employee'));
    }

    public function create()
    {
        $employees = Employee::all();
        $quizQuestions = QuizQuestion::all();
        return view('employee_quiz_responses.create', compact('employees', 'quizQuestions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'      => 'required',
            'quiz_question_id' => 'required',
            'correct'          => 'required'
        ]);

        EmployeeQuizResponse::create(
            [
                'employee_id'      => $request->employee_id,
                'quiz_question_id' => $request->quiz_question_id,
                'correct'          => $request->correct == 'true' ? true: false
            ]);
        

        return redirect()->route('employee_quiz_responses.index')->with('success', "Quiz avec reponse ajouté");
    }

    public function show(EmployeeQuizResponse $employeeQuizResponse)
    {
        $employeeQuizResponses = EmployeeQuizResponse::paginate(4);
        return view('employee_quiz_responses.show', compact('employeeQuizResponse', 'employeeQuizResponses'));
    }


    public function edit(EmployeeQuizResponse $employeeQuizResponse)
    {
        $employees = Employee::all();
        $quizQuestions = QuizQuestion::all();
        return view('employee_quiz_responses.edit', compact('employeeQuizResponse', 'employees', 'quizQuestions'));
    }


    public function update(Request $request, EmployeeQuizResponse $employeeQuizResponse)
    {
        $request->validate([
            'employee_id'      => 'required',
            'quiz_question_id' => 'required',
            'correct'          => 'required'
        ]);

        $employeeQuizResponse->update([
                'employee_id'      => $request->employee_id,
                'quiz_question_id' => $request->quiz_question_id,
                'correct'          => $request->correct == 'true' ? true: false
        ]);
        return redirect()->route('employee_quiz_responses.index')->with('success', "Quiz avec reponse modifié");
    }


    public function destroy(EmployeeQuizResponse $employeeQuizResponse)
    {
        $employeeQuizResponse->delete();
        return redirect()->route('employee_quiz_responses.index')->with('success', "Quiz avec reponse éffacé");
    }
}
