<?php

use App\Models\Quiz;
use App\Models\Rule;
use App\Models\Reading;
use App\Models\Category;
use App\Models\Driver;
use App\Models\Presence;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\DriverQuizResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuizQuestionController;
use App\Http\Controllers\Api\DriverQuizResponseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::group([
    'prefix' => 'v1'
], function () {
    /**
     * Logoin with uid & password
     *
     * @return \Illuminate\Http\Response
     */
    Route::post('/login', [AuthController::class, 'login']);
    
    /**
     * Get list of rule's categories
     *
     * @return \Illuminate\Http\Response
     */
    Route::get('categories', function () {
        return Category::orderBy('position')->get();
    });

    /**
     * Get catodry with current id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    Route::get('categories/{id}', function ($id) {
        return Category::where('id', $id)->first();
    });

    /**
     * Get all rules of current category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    Route::get('categories/{id}/rules', function ($id) {
        return Rule::where('category_id', $id)->get();
    });

    /**
     * Get all rules
     *
     * @return \Illuminate\Http\Response
     */
    Route::get('rules', function () {
        return Rule::get();
    });

    /**
     * Get rule with current id
     *
     * @return \Illuminate\Http\Response
     */
    Route::get('rules/{id}', function ($id) {
        return Rule::where('id', $id)->first();
    });

    //Reading 
    Route::get('Drivers/{Driver_id}/rules/{rule_id}', function ( $Driver_id, $rule_id) {

        Reading::create([
            'Driver_id' => $Driver_id,
            'rule_id'     => $rule_id,
            'category_id'    => Rule::find($rule_id)->category_id
        ]);
        
        return response()->json(
           [ 
            'status' => true
            ]
        );
    })->whereNumber('driver_id')->whereNumber('rule_id');

    //Reading 
    Route::get('drivers/{driver_id}/presence', function ($driver_id) {
        Presence::create([
            'driver_id' => $driver_id
        ]);
        
        return response()->json(
        [ 
            'status' => true
            ]
        );
    })->whereNumber('driver_id');

    //Quiz question
    Route::get('quizzes',  [QuizQuestionController::class, 'index']);
    Route::get('quizzes/{id}', [QuizQuestionController::class, 'show'])->whereNumber('id');
    Route::get('quizzes/{driver_id}/notanswered', [QuizQuestionController::class, 'notanswered'])->whereNumber('driver_id');
    Route::get('quizzes/{driver_id}/notanswereds   ', [QuizQuestionController::class, 'notanswereds'])->whereNumber('driver_id');

    Route::get('quizzes/{category_id}/category', [QuizQuestionController::class, 'category'])->whereNumber('category_id');

    //Quiz response
    Route::apiResource('responses', DriverQuizResponseController::class);

    Route::get('responses/{id}/quizzes', [DriverQuizResponseController::class, 'quizzes'])->whereNumber('id');
    Route::get('responses/{id}/drivers', [DriverQuizResponseController::class, 'Drivers'])->whereNumber('id');
});


