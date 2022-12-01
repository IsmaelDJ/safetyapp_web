<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\RuleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CarrierController;
use \App\Http\Controllers\CategoryController;
use App\Http\Controllers\ParticularController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DriverQuizResponseController;

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

//Rule
Route::resource('rules', RuleController::class);

//Category
Route::resource('categories', CategoryController::class);

//carrier
Route::get('carriers',  [CarrierController::class, 'index'])->name('carriers.index');
Route::get('carriers/{id}',  [CarrierController::class, 'show'])->name('carriers.show');
Route::post('carriers',  [CarrierController::class, 'store'])->name('carriers.store');
Route::put('carriers/{id}', [CarrierController::class, 'update'])->name('carriers.update');
Route::delete('carriers/{id}',  [CarrierController::class, 'destroy'])->name('carriers.destroy');
Route::get('carriers/{id}/edit',  [CarrierController::class, 'edit'])->name('carriers.edit');
//particulars
Route::resource('particulars', ParticularController::class);

//drivers
Route::resource('drivers', DriverController::class);
Route::get('drivers/xlsx/export', [DriverController::class, 'export_xlsx'])->name('drivers.export.xlsx');
Route::get('drivers/pdf/export', [DriverController::class, 'export_pdf'])->name('drivers.export.pdf');
//carrier's driver
Route::get('carrier_drivers/{carrier}', [CarrierController::class,'export_drivers'])->name('carrier_drivers');
Route::get('carriers/xlsx/export', [CarrierController::class, 'export_xlsx'])->name('carriers.export.xlsx');
Route::get('carriers/pdf/export', [CarrierController::class, 'export_pdf'])->name('carriers.export.pdf');
//quiz question
Route::resource('quiz_questions', QuizQuestionController::class);

Route::get('quiz_questions', [QuizQuestionController::class,'index'])->name('quiz_questions.index');
Route::post('quiz_questions', [QuizQuestionController::class,'store'])->name('quiz_questions.store');
Route::get('quiz_questions/create', [QuizQuestionController::class,'create'])->name('quiz_questions.create');

//quiz question avec reponse
Route::resource('driver_quiz_responses', DriverQuizResponseController::class);
Route::get('driver_quiz_responses', [DriverQuizResponseController::class,'index'])->name('driver_quiz_responses.index');
Route::get('employee_quiz_responses/{quiz_question_id}/quizzes', [DriverQuizResponseController::class,'quizzes'])->name('driver_quiz_responses.quizzes');
Route::get('driver_quiz_responses/{employee_id}/employees', [DriverQuizResponseController::class,'employees'])->name('driver_quiz_responses.employees');

Route::get('/documentation-api', function () {
    return view('scribe.index');
});

Route::get('analyze', [App\Http\Controllers\AnalyticController::class, 'index'])->name('analyze.index');
Route::get('analyze/details', [App\Http\Controllers\AnalyticController::class, 'details'])->name('analyze.details');
Route::get('analyze/quiz/false', [App\Http\Controllers\AnalyticController::class, 'quiz_false'])->name('analyze.quiz.false');
Route::get('analyze/quiz/correct', [App\Http\Controllers\AnalyticController::class, 'quiz_correct'])->name('analyze.quiz.correct');
Route::get('analyze/quiz/waitting', [App\Http\Controllers\AnalyticController::class, 'quiz_waitting'])->name('analyze.quiz.waitting');
Route::get('analyze/rule/read', [App\Http\Controllers\AnalyticController::class, 'rule_more_read'])->name('analyze.rule.read');
Route::get('analyze/driver/read', [App\Http\Controllers\AnalyticController::class, 'from_best_driver'])->name('analyze.driver.read');
Route::get('analyze/category/read', [App\Http\Controllers\AnalyticController::class, 'category_more_read'])->name('analyze.category.read');
Route::get('analyze/rule/notread', [App\Http\Controllers\AnalyticController::class, 'rule_not_read'])->name('analyze.rule.notread');
//analyze : pdf exportation 
Route::get('analyze/export/pdf/details', [App\Http\Controllers\AnalyticController::class, 'export_details'])->name('analyze.export.pdf.details');
Route::get('analyze/export/pdf/quiz/false', [App\Http\Controllers\AnalyticController::class, 'export_quiz_false'])->name('analyze.export.pdf.quiz.false');
Route::get('analyze/export/pdf/quiz/correct', [App\Http\Controllers\AnalyticController::class, 'export_quiz_correct'])->name('analyze.export.pdf.quiz.correct');
Route::get('analyze/export/pdf/quiz/waitting', [App\Http\Controllers\AnalyticController::class, 'export_quiz_waitting'])->name('analyze.export.pdf.quiz.waitting');
Route::get('analyze/export/pdf/rule/read', [App\Http\Controllers\AnalyticController::class, 'export_rule_more_read'])->name('analyze.export.pdf.rule.read');
Route::get('analyze/export/pdf/rule/notread', [App\Http\Controllers\AnalyticController::class, 'export_rule_not_read'])->name('analyze.export.pdf.rule.notread');
//analyze : xlsx exportation 
Route::get('analyze/export/xlsx/details', [App\Http\Controllers\AnalyticController::class, 'export_xlsx_details'])->name('analyze.export.xlsx.details');
Route::get('analyze/export/xlsx/quiz/false', [App\Http\Controllers\AnalyticController::class, 'export_xlsx_quiz_false'])->name('analyze.export.xlsx.quiz.false');
Route::get('analyze/export/xlsx/quiz/correct', [App\Http\Controllers\AnalyticController::class, 'export_xlsx_quiz_correct'])->name('analyze.export.xlsx.quiz.correct');
Route::get('analyze/export/xlsx/quiz/waitting', [App\Http\Controllers\AnalyticController::class, 'export_xlsx_quiz_waitting'])->name('analyze.export.xlsx.quiz.waitting');
Route::get('analyze/export/xlsx/rule/read', [App\Http\Controllers\AnalyticController::class, 'export_xlsx_rule_more_read'])->name('analyze.export.xlsx.rule.read');
Route::get('analyze/export/xlsx/rule/notread', [App\Http\Controllers\AnalyticController::class, 'export_xlsx_rule_not_read'])->name('analyze.export.xlsx.rule.notread');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('search/{term}', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


