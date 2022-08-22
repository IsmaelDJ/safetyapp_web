<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quizQuestions = QuizQuestion::paginate(quizQuestionsPerPage());
        return view('quiz_questions.index', compact('quizQuestions'));
    }


    public function create()
    {
        $categories = Category::get();
        return view('quiz_questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        
        $request->validate(
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
        
       
        $quizQuestion = new QuizQuestion();
        $quizQuestion->category_id = $request->category_id;
        $quizQuestion->description = $request->description;
        $quizQuestion->correct     = $request->correct == 'true'?true:false;
        
 
        $quizQuestion->image = uploadFile($request, 'image', 'qz_question_image');
        $quizQuestion->fr    = uploadFile($request, 'fr','rule_fr');
        $quizQuestion->ar    = uploadFile($request, 'ar','rule_ar');
        $quizQuestion->ng    = uploadFile($request, 'ng', 'rule_ng');
       
 

        $quizQuestion->save();
        return redirect()->route('quiz_questions.show', ['quiz_question' => $quizQuestion])->with('success', 'Question modifiée !');
    }


    public function show(QuizQuestion $quizQuestion)
    {
        $quizQuestions = QuizQuestion::paginate(quizQuestionsShowPerPage());
        return view('quiz_questions.show', compact('quizQuestion', 'quizQuestions'));
    }


    public function edit(QuizQuestion $quizQuestion)
    {
        $categories = Category::get();
        return view('quiz_questions.edit', compact('quizQuestion','categories'));
    }

    public function update(Request $request, QuizQuestion $quizQuestion)
    {
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

        $request->validate(
            [
                'category_id'    => 'required',
                'description'    => 'required',
                'correct'        => 'required'
            ]
        );

        $quizQuestion->category_id = $request->category_id;
        $quizQuestion->description = $request->description;
        $quizQuestion->correct     = $request->correct == "true" ? true :false;

        $quizQuestion->update();
        return redirect()->route('quiz_questions.show', ['quiz_question' => $quizQuestion])->with('success', 'Question modifiée !');
    }

    public function destroy(QuizQuestion $quizQuestion)
    {
        $quizQuestion->delete();
        $quizQuestions = QuizQuestion::paginate(quizQuestionsPerPage());
        return redirect()->route('quiz_questions.show', compact('quizQuestion', 'quizQuestions'))->with('success', "Question supprimée !");
    }
}
