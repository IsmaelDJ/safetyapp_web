<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DriverQuizResponse;

class DriverQuizResponseController extends Controller
{
    /**
     * Display a listing of quiz.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DriverQuizResponse::with(["driver", "quiz_question"])->get(), 200);;
    }

    /**
     * Store a newly created quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DriverQuizResponse::create($request->all());
        return response()->json("Success", 201);
    }

    /**
     * Display the Driver_quiz_response resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(DriverQuizResponse::with(["driver", "quiz_question"])->find($id));;
    }

    /**
     * Update the Driver_quiz_response in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DriverQuizResponse::find($id)->update($request->all());
        return response()->json("Success");
    }

    /**
     * Remove the Driver_quiz_response from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DriverQuizResponse::find($id)->delete();
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
        return response()->json(DriverQuizResponse::with(["driver", "quiz_question"])->where('quiz_question_id', $quiz_question_id)->get(), 200);
    }
    /**
     * Get all responses from the current user.
     *
     * @param  int  $driver_id
     * @return \Illuminate\Http\Response
     */
    public function Drivers($driver_id)
    {
        return response()->json(DriverQuizResponse::with(["driver", "quiz_question"])->where('Driver_id', $driver_id)->first(), 200);
    }
}
