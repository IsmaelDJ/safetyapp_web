<?php

namespace App\Http\Controllers;

use stdClass;
use Analytics;
use Carbon\Carbon;
use App\Models\Rule;
use App\Models\Driver;
use App\Models\Carrier;
use App\Models\Reading;
use App\Models\Category;
use App\Models\Presence;
use App\Charts\QuizChart;
use App\Charts\ChartChart;
use Illuminate\Support\Str;
use App\Charts\ReadingChart;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use App\Exports\DetailsExport;
use App\Exports\QuizFalseExport;
use App\Exports\QuizCorrectExport;
use App\Exports\RuleNotReadExport;
use App\Models\DriverQuizResponse;
use App\Exports\QuizWaittingExport;
use App\Exports\RuleMostReadExport;
use Maatwebsite\Excel\Facades\Excel;

class AnalyticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $quizNoAnswereds  = QuizQuestion::whereDoesntHave("driver_quiz_responses")
        ->get();
        
        $quizAnswereds    = QuizQuestion::whereHas("driver_quiz_responses")
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->paginate(10);
        
        $quizBadAnswereds = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", false);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->paginate(10);

        $quizGoodAnswereds = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", true);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->get();

        $rulesMoreRead = Rule::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->get();

        $rulesNotRead = Rule::whereDoesntHave("readings")->get();

        $driver_quiz_responses_total = DriverQuizResponse::count();

        $categoriesMoreRead = Category::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->get();

        $bestdrivers = Reading::groupBy('driver_id')
            ->selectRaw('count(*) as readings_count, driver_id')
            ->with('driver')
            ->orderBy('readings_count', 'desc')
            ->get();
        
       // $analyticsData  = Analytics::fetchMostVisitedPages(Period::days(7));

        $total_quizzes     = QuizQuestion::count();
        $total_rules       = Rule::count();
        $total_drivers     = Driver::where('role', 'driver')->count();
        $total_readings    = Reading::count(); 
        $total_categories  = Category::count();
        $total_carriers    = Carrier::count();

        $reading_per_month = Reading::select('id', 'created_at')
        ->whereYear('created_at', now()->year)
        ->get()
        ->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $reading_per_month_labels = [];
        $reading_per_month_data  = [];

        foreach($reading_per_month as $month => $readings){
            $reading_per_month_labels[] = $month;
            $reading_per_month_data [] = count($readings);
        }

        $readingChart = new ReadingChart();
        $readingChart->labels($reading_per_month_labels);
        $readingChart->label("Lecture");
        $readingChart->displayLegend(false);
        $readingChart->dataset('Lecture par moi', 'line', $reading_per_month_data)
        ->options([
            'color' => 'hsla(209, 100%, 53%, 1)'
        ]);

        $quizChart = new ChartChart();
        $quizChart->minimalist(true);
        $quizChart->displayLegend(true);
        $quizChart->labels(['Correct', 'Faux', 'Non pratiqué']);
        $quizChart->dataset('Lecture par mois', 'polarArea', 
        [round(count($quizGoodAnswereds), 1), 
        round(count($quizBadAnswereds), 1),
        round(count($quizNoAnswereds), 1)])
        ->backgroundColor([
            'rgb(255, 99, 132)',
            'rgb(255, 205, 86)',
            'rgb(54, 162, 235)'
        ]);

        $ruleChart = new ChartChart();
        $ruleChart->minimalist(true);
        $ruleChart->displayLegend(true);
        $ruleChart->labels(['Lu', 'Non lu']);
        $ruleChart->dataset('Lecture par mois', 'doughnut', [round(count($rulesMoreRead), 1), 
        round( count($rulesNotRead), 1)])->backgroundColor([
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
        ]);
        
        $globalChart = new ChartChart();
        $globalChart->displayLegend(false);
        $globalChart->labels(['Catégories', 'Règles', 'Lecture', 'Sous-traitant', 'Employées', 'Quiz']);
        $globalChart->dataset('Statut global', 'bar',
         [  $total_categories, $total_rules, $total_readings, $total_carriers, $total_drivers,  $total_quizzes])
        ->backgroundColor([
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 205, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(153, 102, 255, 0.6)'
        ]);

        $reading_by_category_data = [];
        $reading_by_category_label = [];

        foreach($categoriesMoreRead as $category){
            $reading_by_category_label[]  = Str::limit($category->name, 6, '..');
            $reading_by_category_data []  = $category->readings_count;
        }

        $categorieReadingChart = new ReadingChart();
        $categorieReadingChart->labels($reading_by_category_label);
        $categorieReadingChart->dataset('Lecture par catégorie', 'pie', $reading_by_category_data)->options([
            'color' => [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(153, 102, 255, 1)'
            ],
        ]);

        return view('analyze.index', compact('total_quizzes',
                                             'total_rules', 
                                             'total_drivers',
                                             'total_readings', 
                                             'quizNoAnswereds', 
                                             'quizGoodAnswereds',
                                             'quizBadAnswereds',
                                             'rulesMoreRead',
                                             'categoriesMoreRead',
                                             'bestdrivers',
                                             'readingChart',
                                             'quizChart',
                                             'ruleChart',
                                             'globalChart',
                                             'categorieReadingChart',
                                             'driver_quiz_responses_total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $data = [];

        $events_quiz = DriverQuizResponse::with("driver")
        ->with('quiz_question')
        ->get();

        $events_rule = Reading::with('driver')
        ->with('rule')
        ->get();

        $events_presence = Presence::with('driver')
        ->get();

        foreach($events_quiz as $event){
            $tmp = new stdClass();
            $tmp->type      = 1;
            $tmp->driver    = $event->driver;
            $tmp->action    = $event->quiz_question;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        foreach($events_rule as $event){
            $tmp            = new stdClass();
            $tmp->type      = 2;
            $tmp->driver    = $event->driver;
            $tmp->action    = $event->rule;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        foreach($events_presence as $event){
            $tmp = new stdClass();
            $tmp->type      = 3;
            $tmp->driver    = $event->driver;
            $tmp->action    = 'Lancement de l\'aplication';
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        $data = m_paginate(collect($data)->sortBy('created_at'));
        $data->setPath('details');
        return view('analyze.details', compact('data'));
    }

    public function quiz_waitting(){
        $quizzes  = QuizQuestion::whereDoesntHave("driver_quiz_responses")
        ->paginate(10);

        return view('analyze.quiz-waitting', compact('quizzes'));
    }

    public function quiz_false(){
        $quizzes = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", false);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->paginate(10);

        return view('analyze.quiz-false', compact('quizzes'));
    }

    public function quiz_correct(){
        $quizzes = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", true);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->paginate(10);

        return view('analyze.quiz-correct', compact('quizzes'));
    }

    public function rule_more_read(){
        $rules = Rule::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->paginate(10);

        return view('analyze.rule-read', compact('rules'));
    }

    public function rule_not_read(){
        $rules = Rule::whereDoesntHave("readings")->paginate(10);

        return view('analyze.rule-not-read', compact('rules'));
    }

    public function category_more_read(){
        $categories = Category::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->paginate(10);

        return view('analyze.category-more-read', compact('categories'));
    }

    public function from_best_driver(){
        $drivers = Reading::groupBy('driver_id')
            ->selectRaw('count(*) as readings_count, driver_id')
            ->with('driver')
            ->orderBy('readings_count', 'desc')
            ->paginate(10);
        
        return view('analyze.from-best-driver', compact('drivers'));
    }
        
    //pdf exportation
    public function export_details()
    {
        $data = [];

        $events_quiz = DriverQuizResponse::with("driver")
        ->with('quiz_question')
        ->get();

        $events_rule = Reading::with('driver')
        ->with('rule')
        ->get();

        $events_presence = Presence::with('driver')
        ->get();

        foreach($events_quiz as $event){
            $tmp = new stdClass();
            $tmp->type      = 1;
            $tmp->driver    = $event->driver;
            $tmp->action    = $event->quiz_question;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        foreach($events_rule as $event){
            $tmp            = new stdClass();
            $tmp->type      = 2;
            $tmp->driver    = $event->driver;
            $tmp->action    = $event->rule;
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        foreach($events_presence as $event){
            $tmp = new stdClass();
            $tmp->type      = 3;
            $tmp->driver    = $event->driver;
            $tmp->action    = 'Lancement de l\'aplication';
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        $data = collect($data)->sortBy('created_at');
        return view('analyze.export-details', compact('data'));
    }

    public function export_quiz_waitting(){
        $quizzes  = QuizQuestion::whereDoesntHave("driver_quiz_responses")
        ->get();

        return view('analyze.export-quiz-waitting', compact('quizzes'));
    }

    public function export_quiz_false(){
        $quizzes = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", false);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->get();

        return view('analyze.export-quiz-false', compact('quizzes'));
    }

    public function export_quiz_correct(){
        $quizzes = QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", true);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->get();

        return view('analyze.export-quiz-correct', compact('quizzes'));
    }

    public function export_rule_more_read(){
        $rules = Rule::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->get();

        return view('analyze.export-rule-read', compact('rules'));
    }

    public function export_rule_not_read(){
        $rules = Rule::whereDoesntHave("readings")->get();

        return view('analyze.export-rule-not-read', compact('rules'));
    }

    //xlsx exportation
    public function export_xlsx_details()
    {
        return Excel::download(new DetailsExport, date('YmdHis').'_'.'details.xlsx');
    }

    public function export_xlsx_quiz_waitting(){
        return Excel::download(new QuizWaittingExport, date('YmdHis').'_'.'quiz_attente.xlsx');
    }

    public function export_xlsx_quiz_false(){
        return Excel::download(new QuizFalseExport, date('YmdHis').'_'.'quiz_faux.xlsx');
    }

    public function export_xlsx_quiz_correct(){
        return Excel::download(new QuizCorrectExport, date('YmdHis').'_'.'quiz_correct.xlsx');
    }

    public function export_xlsx_rule_more_read(){
        return Excel::download(new RuleMostReadExport, date('YmdHis').'_'.'rule_more_read.xlsx');
    }

    public function export_xlsx_rule_not_read(){
        return Excel::download(new RuleNotReadExport, date('YmdHis').'_'.'rule_not_read.xlsx');
    }
}
