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

   
   /* public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'category_id'    => 'required',
                'description'    => 'required',
                'image'          => 'required|image|mimes:jpeg,png,jpg,gif',
                'fr'             => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ar'             => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ng'             => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'correct'        => 'required'
            ]
        );

        if($validation->fails()){
            return response()->json([
                    'status' => false,
                    'message'=> 'Validation error',
                    'errors' => $validation->errors()
            ], 401);
        }

        $quizQuestion = new QuizQuestion();
        $quizQuestion->category_id = $request->category_id;
        $quizQuestion->description = $request->description;
        $quizQuestion->correct     = $request->correct == 'true'?true:false;

        $quizQuestion->image = uploadFile($request, 'image', 'qz_question_image');
        $quizQuestion->fr    = uploadFile($request, 'fr','rule_fr');
        $quizQuestion->ar    = uploadFile($request, 'ar','rule_ar');
        $quizQuestion->ng    = uploadFile($request, 'ng', 'rule_ng');

        $quizQuestion->save();

        return response()->json("Success", 201);
    }*/

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


    /* public function update(Request $request, $id)
    {
        $quizQuestion = QuizQuestion::find($id);

        if ($request->hasFile('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif']);
            if (file_exists(public_path($quizQuestion->image)) and !empty($quizQuestion->image)) {
                unlink(public_path($quizQuestion->image));
            }
            $quizQuestion->image = uploadFile($request, 'image', 'qz_question_image');
        }
        if ($request->hasFile('fr')) {
            $request->validate(['fr' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizQuestion->fr)) and !empty($quizQuestion->fr)) {
                unlink(public_path($quizQuestion->fr));
            }
            $quizQuestion->fr = uploadFile($request, 'fr', 'qz_question_fr');
        }
        if ($request->hasFile('ar')) {
            $request->validate(['ar' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizQuestion->ar)) and !empty($quizQuestion->ar)) {
                unlink(public_path($quizQuestion->ar));
            }
            $quizQuestion->ar = uploadFile($request, 'ar', 'qz_question_ar');
        }
        if ($request->hasFile('ng')) {
            $request->validate(['ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizQuestion->ng)) and !empty($quizQuestion->ng)) {
                unlink(public_path($quizQuestion->ng));
            }
            $quizQuestion->ng = uploadFile($request, 'ng', 'qz_question_ng');
        }

        $validation = $request->validate(
            [
                'category_id'    => 'required',
                'description'    => 'required',
                'correct'        => 'required'
            ]
        );

        if($validation->fails()){
            return response()->json([
                    'status' => false,
                    'message'=> 'Validation error',
                    'errors' => $validation->errors()
            ], 401);
        }

        $quizQuestion->category_id = $request->category_id;
        $quizQuestion->description = $request->description;
        $quizQuestion->correct     = $request->correct == "true" ? true :false;

        $quizQuestion->update(); 

        return response()->json("Success", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        QuizQuestion::find($id)->delete();
        return response()->json("Success", 200);
    } */
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
     * @param  int  $employee_id
     * @return \Illuminate\Http\Response
     */
    public function notanswered($employee_id){
        return response()->json(QuizQuestion::whereDoesntHave("employee_quiz_responses", function ($query) use($employee_id){
            $query->where("employee_id", $employee_id);
        })->first());
    }

    public function notanswereds($employee_id){
        return response()->json(QuizQuestion::whereDoesntHave("employee_quiz_responses", function ($query) use($employee_id){
            $query->where("employee_id", $employee_id);
        }));
    }
}
