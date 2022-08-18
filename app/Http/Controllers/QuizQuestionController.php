<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Category;
use App\Models\QuizQuestion;
=======
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizResponse;
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
<<<<<<< HEAD
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

        $quizQuestion = QuizQuestion::create([
            'category_id'     => $request->category_id,
            'description'     => $request->description,
            'image'           => uploadFile($request, 'image', 'qz_question_image'),
            'fr'              => uploadFile($request, 'fr', 'qz_question_fr'),
            'ar'              => uploadFile($request, 'ar', 'qz_question_ar'),
            'ng'              => uploadFile($request, 'ng', 'qz_question_ng'),
            'correct'         => $request->correct == 'true'?true:false
        ]);

        return redirect()->route('quiz_questions.show', ['quiz_question' => $quizQuestion])->with('success', 'Question modifiée !');
=======
        $quiz_questions = QuizQuestion::paginate(quizQuestionsPerPage());
        return view('quiz_questions.index', compact('quiz_questions'));
    }


    public function create(Quiz $quiz)
    {
        return view('quiz_questions.create', compact('quiz'));
    }


    public function store(Request $request)
    {
        $quiz = Quiz::where('id',$request->quiz_id)->first();
        $request->validate(
            [
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'fr' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ar' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
                'ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'
            ]
        );
        $quizQuestion = new QuizQuestion();
        $quizQuestion->quiz_id = $quiz->id;
        $quizQuestion->description = $request->description;
        $quizQuestion->image = uploadFile($request, 'image', 'qz_question_image');
        $quizQuestion->fr = uploadFile($request, 'fr', 'qz_question_fr');
        $quizQuestion->ar = uploadFile($request, 'ar', 'qz_question_ar');
        $quizQuestion->ng = uploadFile($request, 'ng', 'qz_question_ng');

        $quizQuestion->save();

        $quiz_questions = QuizQuestion::where('quiz_id', $quiz->id)->paginate(quizQuestionsPerPage());

        return view('quizzes.show',compact('quiz', 'quiz_questions'))->with('success', 'Question ajoutée !');

>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }


    public function show(QuizQuestion $quizQuestion)
    {
<<<<<<< HEAD
        $quizQuestions = QuizQuestion::paginate(quizResponsePerPage());
        return view('quiz_questions.show', compact('quizQuestion', 'quizQuestions'));
=======
        $quizResponses = QuizResponse::where('quiz_question_id', $quizQuestion->id)->paginate(quizResponsePerPage());
        return view('quiz_questions.show', compact('quizQuestion', 'quizResponses'));
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }


    public function edit(QuizQuestion $quizQuestion)
    {
<<<<<<< HEAD
        $categories = Category::get();
        return view('quiz_questions.edit', compact('quizQuestion','categories'));
    }

=======
        $quiz = Quiz::where('id', $quizQuestion->quiz_id)->first();
        return view('quiz_questions.edit', compact('quizQuestion', 'quiz'));
    }


>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
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
<<<<<<< HEAD
            $request->validate(['ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
=======
            $quizQuestion->validate(['ng' => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav']);
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
            if (file_exists(public_path($quizQuestion->ng)) and !empty($quizQuestion->ng)) {
                unlink(public_path($quizQuestion->ng));
            }
            $quizQuestion->ng = uploadFile($request, 'ng', 'qz_question_ng');
        }

        $request->validate(
            [
<<<<<<< HEAD
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
=======
                'description' => 'required'
            ]
        );

        $quizQuestion->description = $request->description;

        $quizQuestion->update();
        $quiz = Quiz::where('id', $quizQuestion->quiz_id)->first();
        $quiz_questions = QuizQuestion::where('quiz_id', $quiz->id)->paginate(quizQuestionsPerPage());
        return redirect()->route('quizzes.show', compact('quiz', 'quiz_questions'))->with('success', 'Question modifiée !');
    }


    public function destroy(QuizQuestion $quizQuestion)
    {
        $quizQuestion->delete();
        $quiz = Quiz::where('id', $quizQuestion->quiz_id)->first();
        $quizQuestions = QuizQuestion::where('quiz_id', $quiz->id)->paginate(quizQuestionsPerPage());
        return redirect()->route('quiz.show', compact('quiz', 'quizQuestions'))->with('success', "Question supprimée !");
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }
}
