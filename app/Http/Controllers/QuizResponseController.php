<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use App\Models\QuizResponse;
use Illuminate\Http\Request;

class QuizResponseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quiz_responses = QuizResponse::paginate(quizResponsePerPage());
        return view('quiz_responses.index', compact('quiz_responses'));
    }


    public function create(QuizResponse $quizResponse)
    {
        return view('quiz_responses.create', compact('quizResponse'));
    }


    public function store(Request $request)
    {
        $quizQuestion = QuizQuestion::where('id', $request->quiz_question_id)->first();
        $request->validate(
            [
                'correct' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'fr' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ar' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'
            ]
        );
        $quizResponse = new QuizResponse();
        $quizResponse->quiz_question_id = $quizQuestion->id;
        if ($request->correct=="true"){
            $quizResponse->correct = true;
        }else{

            $quizResponse->correct = false;
        }
        $quizResponse->description = $request->description;
        $quizResponse->image = uploadFile($request, 'image', 'qz_response_image');
        $quizResponse->fr = uploadFile($request, 'fr', 'qz_response_fr');
        $quizResponse->ar = uploadFile($request, 'ar', 'qz_reponse_ar');
        $quizResponse->ng = uploadFile($request, 'ng', 'qz_response_ng');

        $quizResponse->save();

        $quizResponses = QuizResponse::where('quiz_question_id', $quizQuestion->id)->paginate(quizResponsePerPage());

        return view('quiz_questions.show', compact('quizQuestion', 'quizResponses'))->with('success', 'Reponse ajoutée !');

    }


    public function show(QuizResponse $quizResponse)
    {
        $sameQuizQuizResponses = QuizResponse::where('quiz_question_id', $quizResponse->quiz_question_id)->where('id', '!=', $quizResponse->id)->paginate(quizResponsePerPage());
        return view('quiz_responses.show', compact('quizResponse', 'sameQuizQuizResponses'));
    }


    public function edit(QuizResponse $quizResponse)
    {
        $quizQuestion = QuizQuestion::where('id', $quizResponse->quiz_question_id)->first();
        return view('quiz_responses.edit', compact('quizResponse', 'quizQuestion'));
    }


    public function update(Request $request, QuizResponse $quizResponse)
    {
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif']);
            if (file_exists(public_path($quizResponse->image)) and !empty($quizResponse->image)) {
                unlink(public_path($quizResponse->image));
            }
            $quizResponse->image = uploadFile($request, 'image', 'qz_response_image');
        }
        if ($request->hasFile('fr')) {
            $request->validate(['fr' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizResponse->fr)) and !empty($quizResponse->fr)) {
                unlink(public_path($quizResponse->fr));
            }
            $quizResponse->fr = uploadFile($request, 'fr', 'qz_response_fr');
        }
        if ($request->hasFile('ar')) {
            $request->validate(['ar' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizResponse->ar)) and !empty($quizResponse->ar)) {
                unlink(public_path($quizResponse->ar));
            }
            $quizResponse->ar = uploadFile($request, 'ar', 'qz_response_ar');
        }
        if ($request->hasFile('ng')) {
            $quizResponse->validate(['ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
            if (file_exists(public_path($quizResponse->ng)) and !empty($quizResponse->ng)) {
                unlink(public_path($quizResponse->ng));
            }
            $quizResponse->ng = uploadFile($request, 'ng', 'qz_response_ng');
        }

        $request->validate(
            [
                'correct' => 'required',
                'description' => 'required'
            ]
        );

        $quizResponse->description = $request->description;
        if ($request->correct=="true"){
            $quizResponse->correct = true;
        }else{
            $quizResponse->correct = false;
        }

        $quizResponse->update();
        $quizQuestion = QuizQuestion::where('id', $quizResponse->quiz_question_id)->first();
        $quizResponses = QuizResponse::where('quiz_question_id', $quizQuestion->id)->paginate(quizResponsePerPage());

        return view('quiz_questions.show', compact('quizQuestion', 'quizResponses'))->with('success', 'Reponse modifiée !');
    }


    public function destroy(QuizResponse $quizResponse)
    {
        $quizQuestion = QuizQuestion::where('id', $quizResponse->quiz_question_id)->first();
        $quizResponse->delete();
        $quizResponses = QuizResponse::where('quiz_question_id', $quizResponse->id)->paginate(quizResponsePerPage());
        return view('quiz_questions.show', compact('quizQuestion', 'quizResponses'))->with('success', 'Reponse supprimée !');
    }
}
