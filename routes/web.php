<?php

use App\Http\Controllers\ContractorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeQuizResponseController;
use App\Http\Controllers\QuizQuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RuleController;
use \App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

//Rule
Route::resource('rules', RuleController::class);
//Category
Route::resource('categories', CategoryController::class);

//contractor
Route::resource('contractors', ContractorController::class);

//employees
Route::resource('employees', EmployeeController::class);

//contractor employee
Route::get('contractor_employees/{contractor}', [ContractorController::class,'export_employees'])->name('contractor_employees');

//quiz question
Route::resource('quiz_questions', QuizQuestionController::class);

Route::get('quiz_questions', [QuizQuestionController::class,'index'])->name('quiz_questions.index');
Route::post('quiz_questions', [QuizQuestionController::class,'store'])->name('quiz_questions.store');
Route::get('quiz_questions/create', [QuizQuestionController::class,'create'])->name('quiz_questions.create');

//quiz question avec reponse
Route::resource('employee_quiz_responses', EmployeeQuizResponseController::class);
Route::get('employee_quiz_responses', [EmployeeQuizResponseController::class,'index'])->name('employee_quiz_responses.index');
Route::get('employee_quiz_responses/{quiz_question_id}/quizzes', [EmployeeQuizResponseController::class,'quizzes'])->name('employee_quiz_responses.quizzes');
Route::get('employee_quiz_responses/{employee_id}/employees', [EmployeeQuizResponseController::class,'employees'])->name('employee_quiz_responses.employees');
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
