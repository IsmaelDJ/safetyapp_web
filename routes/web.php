<?php

use App\Http\Controllers\ContractorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeQuizResponseController;
<<<<<<< HEAD
use App\Http\Controllers\QuizQuestionController;
=======
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\QuizResponseController;
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
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

<<<<<<< HEAD
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
=======
//quiz
Route::resource('quizzes', QuizController::class);

//Route::resource('quiz_questions', QuizQuestionController::class);

Route::get('quiz_questions', [QuizQuestionController::class,'index'])->name('quiz_questions.index');
Route::post('quiz_questions', [QuizQuestionController::class,'store'])->name('quiz_questions.store');
Route::get('quiz_questions/create/{quiz}', [QuizQuestionController::class,'create'])->name('quiz_questions.create');
Route::get('quiz_questions/{quiz_question}', [QuizQuestionController::class,'show'])->name('quiz_questions.show');
Route::put('quiz_questions/{quiz_question}', [QuizQuestionController::class,'update'])->name('quiz_questions.update');
Route::delete('quiz_questions/{quiz_question}', [QuizQuestionController::class,'destroy'])->name('quiz_questions.destroy');
Route::get('quiz_questions/{quiz_question}/edit', [QuizQuestionController::class,'edit'])->name('quiz_questions.edit');

Route::get('quiz_responses', [QuizResponseController::class,'index'])->name('quiz_responses.index');
Route::post('quiz_responses', [QuizResponseController::class,'store'])->name('quiz_responses.store');
Route::get('quiz_responses/create/{quiz_question}', [QuizResponseController::class,'create'])->name('quiz_responses.create');
Route::get('quiz_responses/{quiz_response}', [QuizResponseController::class,'show'])->name('quiz_responses.show');
Route::put('quiz_responses/{quiz_response}', [QuizResponseController::class,'update'])->name('quiz_responses.update');
Route::delete('quiz_responses/{quiz_response}', [QuizResponseController::class,'destroy'])->name('quiz_responses.destroy');
Route::get('quiz_responses/{quiz_response}/edit', [QuizResponseController::class,'edit'])->name('quiz_responses.edit');

Route::get('employee_quiz_responses', [EmployeeQuizResponseController::class,'index'])->name('employee_quiz_responses.index');
Route::get('employee_quiz_responses/{employee_id}/{quiz_id}', [EmployeeQuizResponseController::class,'employee'])->name('employee_quiz_responses.employee');


>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


