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

//Category
Route::get('show/{category}',  [CategoryController::class, 'show'])->name('categories.show');
Route::get('edit/{category}',  [CategoryController::class, 'edit'])->name('categories.edit');
Route::get('create',  [CategoryController::class, 'create'])->name('categories.create');
Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

//Rule
Route::prefix('rules')->group(function () {
    Route::get('/',  [RuleController::class, 'index'])->name('rules.index');
    Route::get('show/{rule}',  [RuleController::class, 'show'])->name('rules.show');
    Route::get('edit/{rule}',  [RuleController::class, 'edit'])->name('rules.edit');
    Route::get('create/{category_id}',  [RuleController::class, 'create'])->name('rules.create');
    Route::post('/', [RuleController::class, 'store'])->name('rules.store');
    Route::put('/', [RuleController::class, 'update'])->name('rules.update');
    Route::delete('/{rule}', [RuleController::class, 'destroy'])->name('rules.destroy');
});


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

Route::prefix("driver_quiz_responses")->group(
    function(){
        Route::controller(DriverQuizResponseController::class)->group(
            function(){
                Route::get('/', 'index')->name('driver_quiz_responses.index');
                Route::get('/{quiz_question_id}/quizzes', 'quizzes')->name('driver_quiz_responses.quizzes');
                Route::get('/{driver_id}/drivers', 'drivers')->name('driver_quiz_responses.drivers');
            }
        );
    }
);

Route::get('/documentation-api', function () {
    return view('scribe.index');
});

Route::prefix("analyze")->group(function(){
    Route::controller(App\Http\Controllers\AnalyticController::class)->group(
        function(){
            Route::get('/', 'index')->name('analyze.index');
            Route::get('/details', 'details')->name('analyze.details');
            Route::get('/quiz/false', 'quiz_false')->name('analyze.quiz.false');
            Route::get('/quiz/correct', 'quiz_correct')->name('analyze.quiz.correct');
            Route::get('/quiz/waitting', 'quiz_waitting')->name('analyze.quiz.waitting');
            Route::get('/rule/read', 'rule_more_read')->name('analyze.rule.read');
            Route::get('/driver/read', 'from_best_driver')->name('analyze.driver.read');
            Route::get('/category/read', 'category_more_read')->name('analyze.category.read');
            Route::get('/rule/notread', 'rule_not_read')->name('analyze.rule.notread');
            //analyze : pdf exportation 
            Route::prefix("/export/pdf")->group(
                function(){
                    Route::get('/details', 'export_details')->name('analyze.export.pdf.details');
                    Route::get('/quiz/false', 'export_quiz_false')->name('analyze.export.pdf.quiz.false');
                    Route::get('/quiz/correct', 'export_quiz_correct')->name('analyze.export.pdf.quiz.correct');
                    Route::get('/quiz/waitting', 'export_quiz_waitting')->name('analyze.export.pdf.quiz.waitting');
                    Route::get('/rule/read', 'export_rule_more_read')->name('analyze.export.pdf.rule.read');
                    Route::get('/rule/notread', 'export_rule_not_read')->name('analyze.export.pdf.rule.notread');
                }
            );
            //analyze : xlsx exportation 
            Route::prefix("/export/xlsx")->group(
                function(){
                    Route::get('/details', 'export_xlsx_details')->name('analyze.export.xlsx.details');
                    Route::get('/quiz/false', 'export_xlsx_quiz_false')->name('analyze.export.xlsx.quiz.false');
                    Route::get('/quiz/correct', 'export_xlsx_quiz_correct')->name('analyze.export.xlsx.quiz.correct');
                    Route::get('/quiz/waitting', 'export_xlsx_quiz_waitting')->name('analyze.export.xlsx.quiz.waitting');
                    Route::get('/rule/read', 'export_xlsx_rule_more_read')->name('analyze.export.xlsx.rule.read');
                    Route::get('/rule/notread', 'export_xlsx_rule_not_read')->name('analyze.export.xlsx.rule.notread');
                }
            );     
        }
    );
});

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('search/{term}', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


