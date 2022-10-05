<?php

namespace App\Http\Controllers\Api;

use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizQuestionController extends Controller
{

    /**
     * Display a listing of the quiz.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(QuizQuestion::with("category")->get(), 200);
    }

    /**
     * Display the QuizQestion.
     *
     * @param  int  $id
     * @return \Models\QuizQuestion;
     */
    public function show($id)
    {
        return response()->json(QuizQuestion::find($id), 200);
    }

    /**
     * Show question by rule's category.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function category($category_id){
        return response()->json(QuizQuestion::where('category_id', $category_id)->get(), 200);
    }

     /**
     * Show question that employee with current id didn't answer yet.
     *
     * @param  int  $driver_id
     * @return \Illuminate\Http\Response
     */
    public function notanswered($driver_id){
        return response()->json(QuizQuestion::whereDoesntHave("driver_quiz_responses", function ($query) use($driver_id){
            $query->where("driver_id", $driver_id);
        })->get()->shuffle()->first());
    }

    public function notanswereds($driver_id){
        return response()->json(QuizQuestion::whereDoesntHave("driver_quiz_responses", function ($query) use($driver_id){
            $query->where("driver_id", $driver_id);
        })->get()->shuffle());
    }
}
