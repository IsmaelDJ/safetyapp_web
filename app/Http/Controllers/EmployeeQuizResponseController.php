<?php

namespace App\Http\Controllers;

use App\Models\EmployeeQuizResponse;
use Illuminate\Http\Request;

class EmployeeQuizResponseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    public function index()
    {
        $responses = EmployeeQuizResponse::join('employees', 'employees.id', '=', 'employee_quiz_responses.employee_id')
            ->join('quiz_responses', 'quiz_responses.id', '=', 'employee_quiz_responses.quiz_response_id')
            ->join('quiz_questions', 'quiz_questions.id', '=', 'quiz_responses.quiz_question_id')
            ->join('quizzes', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->select(
                'employees.id as employee_id',
                'quiz_responses.id as quiz_response_id',
                'quiz_questions.id as quiz_question_id',
                'quizzes.id as quiz_id',
                'employees.name as employee_name',
                'quiz_questions.description as quiz_question_description',
                'quiz_questions.image as quiz_question_image',
                'quiz_responses.description as quiz_response_description',
                'quiz_responses.image as quiz_response_image',
                'quiz_responses.correct as response_correct',
                'quizzes.name as quiz_name',
                'quizzes.image as quiz_image'
            )
            ->paginate(quizResponsePerPage());
        return view('employee_quiz_responses.index', compact('responses'));
    }

    public function employee($employee_id, $quiz_id)
    {
        $responses = EmployeeQuizResponse::join('employees', 'employees.id', '=', 'employee_quiz_responses.employee_id')
            ->join('quiz_responses', 'quiz_responses.id', '=', 'employee_quiz_responses.quiz_response_id')
            ->join('quiz_questions', 'quiz_questions.id', '=', 'quiz_responses.quiz_question_id')
            ->join('quizzes', 'quizzes.id', '=', 'quiz_questions.quiz_id')
            ->where('employee_id', $employee_id)
            ->where('quizzes.id', $quiz_id)
            ->select(
                'employees.id as employee_id',
                'quiz_responses.id as quiz_response_id',
                'quiz_questions.id as quiz_question_id',
                'quizzes.id as quiz_id',
                'employees.name as employee_name',
                'quiz_questions.description as quiz_question_description',
                'quiz_questions.image as quiz_question_image',
                'quiz_responses.description as quiz_response_description',
                'quiz_responses.image as quiz_response_image',
                'quiz_responses.correct as response_correct',
                'quizzes.name as quiz_name',
                'quizzes.image as quiz_image'
            )
            ->paginate(quizResponsePerPage());
        return view('employee_quiz_responses.employee', compact('responses'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $success = true;
        $fieldRequired = [];
        $message = '';
        $response = [];

        if (!$request->has('employee_id')) {
            $success = false;
            $fieldRequired[] = 'employee_id';
        }
        if (!$request->has('quiz_response_id')) {
            $success = false;
            $fieldRequired[] = 'quiz_response_id';
        }
        $request['success'] = $success;

        if (!$success) {
            $text = 'champs requis :';
            foreach ($fieldRequired as $field) {
                $text = $text . $field . ' ';
            }
            $response['message'] = $text;
        } else {
            $empoyeeQuizResponse = new EmployeeQuizResponse();
            $empoyeeQuizResponse->employee_id = $request->employee_id;
            $empoyeeQuizResponse->quiz_response_id = $request->quiz_response_id;
            $success = $empoyeeQuizResponse->save() > 0;
        }
        $response['success'] = $success;
        return $response;
    }

    public function show(EmployeeQuizResponse $employeeQuizResponse)
    {
        //
    }


    public function edit(EmployeeQuizResponse $employeeQuizResponse)
    {
        //
    }


    public function update(Request $request, EmployeeQuizResponse $employeeQuizResponse)
    {
        //
    }


    public function destroy(EmployeeQuizResponse $employeeQuizResponse)
    {
        //
    }
}
