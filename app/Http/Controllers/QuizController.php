<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $quizzes = Quiz::paginate(quizzesPerPage());
        return view('quizzes.index', compact('quizzes'));
    }


    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'image'=>'required'
            ]
        );

        $quiz = new Quiz();
        $quiz->name = $request->name;
        $quiz->image = uploadFile($request,'image','qz');

        $quiz->save();
        return redirect()->route('quizzes.show')->with('success', "Quiz créé, vous pouvez maintenant ajouter des questions à ce quiz");
    }

    public function show(Quiz $quiz)
    {
        $quizQuestions = QuizQuestion::where('quiz_id',$quiz->id)->paginate(quizQuestionsPerPage());
        return view('quizzes.show', compact('quiz', 'quizQuestions'));
    }

    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit',compact('quiz'));
    }


    public function update(Request $request, Quiz $quiz)
    {
        $request->validate(
            [
                'name'=>'required'
            ]
        );

        if ($request->hasFile('image')){
            $request->validate(
                [
                    'image'=>'required'
                ]
            );
            if (file_exists(public_path($quiz->image)) AND !empty($quiz->image)){
                unlink(public_path($quiz->image));
            }
            $quiz->image = uploadFile($request, 'image', 'qz');
        }

        $quiz->name = $request->name;

        $quiz->update();
        return redirect()->route('quizzes.index')->with('success', "Quiz modifié");
    }


    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', "Quiz supprimé !");
    }
}
