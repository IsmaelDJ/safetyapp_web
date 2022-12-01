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
        if(Gate::allows('doAdvanced')) abort(401);
    }

    public function index()
    {
        $driverQuizResponses = DriverQuizResponse::all();
        if(Auth::user()->isCarrier()){
            $driverQuizResponses = $driverQuizResponses->filter(function ($response) {
                return $response->driver->user_id === Auth::user()->id;
            });
        }

        $driverQuizResponses = m_paginate($driverQuizResponses, driverQuizResponsesPerPage());
        return view('driver_quiz_responses.index', compact('driverQuizResponses'));
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
        $drivers = Driver::where('role', 'driver');
        $quizQuestions = QuizQuestion::all();
        return view('driver_quiz_responses.create', compact('drivers', 'quizQuestions'));
    }

    public function store(Request $request)
    {
        $user = User::all();

        $request->validate([
            'driver_id'      => 'required',
            'quiz_question_id' => 'required',
            'correct'          => 'required'
        ]);

        DriverQuizResponse::create([
            'driver_id'      => $request->driver_id,
            'quiz_question_id' => $request->quiz_question_id,
            'correct'          => $request->correct == 'true' ? true: false
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
        $drivers = Driver::all();
        $quizQuestions = QuizQuestion::all();
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
                'correct'          => $request->correct == 'true' ? true: false
        ]);
        return redirect()->route('driver_quiz_responses.index')->with('success', "Quiz avec reponse modifié");
    }


    public function destroy(DriverQuizResponse $driverQuizResponse)
    {
        $driverQuizResponse->delete();
        return redirect()->route('driver_quiz_responses.index')->with('success', "Quiz avec reponse éffacé");
    }
}
