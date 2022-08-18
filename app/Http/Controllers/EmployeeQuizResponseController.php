<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Employee;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\EmployeeQuizResponse;
=======
use App\Models\EmployeeQuizResponse;
use Illuminate\Http\Request;
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60

class EmployeeQuizResponseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    public function index()
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }

    public function create()
    {
<<<<<<< HEAD
        $employees = Employee::all();
        $quizQuestions = QuizQuestion::all();
        return view('employee_quiz_responses.create', compact('employees', 'quizQuestions'));
=======
        //
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
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
=======
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
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }

    public function show(EmployeeQuizResponse $employeeQuizResponse)
    {
<<<<<<< HEAD
        $employeeQuizResponses = EmployeeQuizResponse::paginate();
        return view('employee_quiz_responses.show', compact('employeeQuizResponse', 'employeeQuizResponses'));
=======
        //
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }


    public function edit(EmployeeQuizResponse $employeeQuizResponse)
    {
<<<<<<< HEAD
        $employees = Employee::all();
        $quizQuestions = QuizQuestion::all();
        return view('employee_quiz_responses.edit', compact('employeeQuizResponse', 'employees', 'quizQuestions'));
=======
        //
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }


    public function update(Request $request, EmployeeQuizResponse $employeeQuizResponse)
    {
<<<<<<< HEAD
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
=======
        //
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }


    public function destroy(EmployeeQuizResponse $employeeQuizResponse)
    {
<<<<<<< HEAD
        $employeeQuizResponse->delete();
        return redirect()->route('employee_quiz_responses.index')->with('success', "Quiz avec reponse éffacé");
=======
        //
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }
}
