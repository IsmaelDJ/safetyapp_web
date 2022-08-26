<?php

use App\Models\Quiz;
use App\Models\Rule;
use App\Models\Category;
use App\Models\Employee;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\EmployeeQuizResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuizQuestionController;
use App\Http\Controllers\Api\EmployeeQuizResponseController;

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
        return Category::get();
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

    //Quiz question
    Route::get('quizzes',  [QuizQuestionController::class, 'index']);
    Route::get('quizzes/{id}', [QuizQuestionController::class, 'show']);
    Route::get('quizzes/{employee_id}/notanswered', [QuizQuestionController::class, 'notanswered']);
    Route::get('quizzes/{employee_id}/notanswered', [QuizQuestionController::class, 'notanswereds']);

    Route::get('quizzes/{category_id}/category', [QuizQuestionController::class, 'category']);

    //Quiz response
    Route::apiResource('responses', EmployeeQuizResponseController::class);

    Route::get('responses/{id}/quizzes', [EmployeeQuizResponseController::class, 'quizzes']);
    Route::get('responses/{id}/employees', [EmployeeQuizResponseController::class, 'employees']);
});

//URL::forceScheme('https');


