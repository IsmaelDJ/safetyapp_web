<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\DriverQuizResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Notifications\QuizNotification;
use Illuminate\Support\Facades\Notification;

class DriverQuizResponseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
        if (Gate::allows('doAdvanced')) abort(401);
    }

    public function index()
    {
        $driverQuizResponses = DriverQuizResponse::with('driver')->get();

        if (me()->isCarrier()) {
            $driverQuizResponses = $driverQuizResponses->filter(function ($response) {
                return $response->driver->user_id === me()->id;
            });
        }

        $driverQuizResponses = m_paginate($driverQuizResponses, driverQuizResponsesPerPage());
        return view('driver_quiz_responses.index', compact('driverQuizResponses'));
    }

    public function rank()
    {
        $drivers = Driver::select('drivers.*')
            ->selectRaw('COUNT(CASE WHEN driver_quiz_responses.correct = 1 THEN 1 END) as correct_answers')
            ->selectRaw('COUNT(CASE WHEN driver_quiz_responses.correct = 0 THEN 1 END) as incorrect_answers')
            ->leftJoin('driver_quiz_responses', 'drivers.id', '=', 'driver_quiz_responses.driver_id')
            ->where('drivers.role', '=', 'driver')
            ->groupBy('id', 'user_id', 'avatar', 'name', 'phone', 'obc', 'password', 'created_at', 'updated_at', 'role', 'uuid')
            ->orderByDesc('correct_answers'); // Tri par le nombre de bonnes réponses, du plus grand au plus petit
        // ->orderBy('incorrect_answers') // Tri par le nombre de mauvaises réponses, du plus petit au plus grand
        // dump($drivers);
        $drivers = $drivers->get();

        $drivers = m_paginate($drivers, driverQuizResponsesPerPage());
        return view('driver_quiz_responses.rank', compact('drivers'));
    }

    public function quizzes($quiz_question_id)
    {
        $quizQuestion          = QuizQuestion::findOrFail($quiz_question_id);
        $driverQuizResponses   = DriverQuizResponse::where('quiz_question_id', $quiz_question_id)->paginate();
        return view('driver_quiz_responses.quiz', compact('driverQuizResponses', 'quizQuestion'));
    }

    public function drivers($driver_id)
    {
        $driver = Driver::find($driver_id);
        $driverQuizResponses = DriverQuizResponse::where('driver_id', $driver_id)->paginate();
        return view('driver_quiz_responses.driver', compact('driverQuizResponses', 'driver'));
    }

    public function create()
    {
        $drivers = Driver::where('role', 'driver')->get();
        $quizQuestions = QuizQuestion::get();
        return view('driver_quiz_responses.create', compact('drivers', 'quizQuestions'));
    }

    public function store(Request $request)
    {
        $user = User::get();

        $request->validate([
            'driver_id'      => 'required',
            'quiz_question_id' => 'required',
            'correct'          => 'required'
        ]);

        DriverQuizResponse::create([
            'driver_id'        => $request->driver_id,
            'quiz_question_id' => $request->quiz_question_id,
            'correct'          => $request->correct == 'true' ? true : false
        ]);

        Notification::send($user, new QuizNotification($request->driver_id, $request->quiz_question_id));

        return redirect()->route('driver_quiz_responses.index')->with('success', "Quiz avec reponse ajouté");
    }

    public function show(DriverQuizResponse $driverQuizResponse)
    {
        $driverQuizResponses = DriverQuizResponse::paginate(driverQuizResponsesShowPerPage());
        return view('driver_quiz_responses.show', compact('driverQuizResponse', 'driverQuizResponses'));
    }


    public function edit(DriverQuizResponse $driverQuizResponse)
    {
        $drivers = Driver::with('user')->get();
        $quizQuestions = QuizQuestion::with('category')->get();
        return view('driver_quiz_responses.edit', compact('driverQuizResponse', 'drivers', 'quizQuestions'));
    }


    public function update(Request $request, DriverQuizResponse $driverQuizResponse)
    {
        $request->validate([
            'driver_id'      => 'required',
            'quiz_question_id' => 'required',
            'correct'          => 'required'
        ]);

        $driverQuizResponse->update([
            'driver_id'      => $request->driver_id,
            'quiz_question_id' => $request->quiz_question_id,
            'correct'          => $request->correct == 'true' ? true : false
        ]);
        return redirect()->route('driver_quiz_responses.index')->with('success', "Quiz avec reponse modifié");
    }


    public function destroy(DriverQuizResponse $driverQuizResponse)
    {
        $driverQuizResponse->delete();
        return redirect()->route('driver_quiz_responses.index')->with('success', "Quiz avec reponse éffacé");
    }
}
