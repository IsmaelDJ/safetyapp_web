<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeQuizResponse;

class EmployeeQuizResponseController extends Controller
{
    /**
     * Display a listing of quiz.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->get(), 200);;
    }

    /**
     * Store a newly created quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmployeeQuizResponse::create($request->all());
        return response()->json("Success", 201);
    }

    /**
     * Display the employee_quiz_response resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->find($id));;
    }

    /**
     * Update the employee_quiz_response in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        EmployeeQuizResponse::find($id)->update($request->all());
        return response()->json("Success");
    }

    /**
     * Remove the employee_quiz_response from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeQuizResponse::find($id)->delete();
        return response()->json("Success");
    }

    /**
     * Get all the answers to the current question
     *
     * @param  int  $quiz_question_id
     * @return \Illuminate\Http\Response
     */
    public function quizzes($quiz_question_id)
    {
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->where('quiz_question_id', $quiz_question_id)->get(), 200);
    }
    /**
     * Get all responses from the current user.
     *
     * @param  int  $employee_id
     * @return \Illuminate\Http\Response
     */
    public function employees($employee_id)
    {
        return response()->json(EmployeeQuizResponse::with(["employee", "quiz_question"])->where('employee_id', $employee_id)->first(), 200);
    }
}
