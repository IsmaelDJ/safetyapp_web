<?php

use App\Models\Quiz;
use App\Models\Rule;
use App\Models\Category;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\EmployeeQuizResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

    //categories
    Route::get('categories', function () {
        return Category::get();
    });
    Route::get('categories/{id}', function ($id) {
        return Category::where('id', $id)->first();
    });
    Route::get('categories/{id}/rules', function ($id) {
        return Rule::where('category_id', $id)->get();
    });

    //Rule
    Route::get('rules', function () {
        return Rule::get();
    });
    Route::get('rules/{id}', function ($id) {
        return Rule::where('id', $id)->first();
    });

    //Quiz question

    Route::apiResource('quizzes', QuizQuestionController::class);

    Route::get('quizzes/{category_id}/category', [QuizQuestionController::class, 'category']);

    //Quiz response
    Route::apiResource('responses', EmployeeQuizResponseController::class);

    Route::get('responses/{id}/quizzes', [EmployeeQuizResponseController::class, 'quizzes']);
    Route::get('responses/{id}/employees', [EmployeeQuizResponseController::class, 'employees']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

