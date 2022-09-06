<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\RuleController;
use App\Http\Controllers\EmployeeController;
use \App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeQuizResponseController;

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

Route::get('register', [HomeController::class, 'register'])->name('register');
Route::post('storeUser', [HomeController::class, 'storeUser'])->name('storeUser');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

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

Route::get('/documentation-api', function () {
    return view('scribe.index');
});

Route::get('/analyze', [App\Http\Controllers\AnalyticController::class, 'index'])->name('analyze.index');
Route::get('/analyse/details', [App\Http\Controllers\AnalyticController::class, 'details'])->name('analyze.details');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/search/{term}', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

//URL::forceScheme('https');

