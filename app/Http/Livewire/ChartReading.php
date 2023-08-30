<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Reading;
use Livewire\Component;
use App\Charts\ReadingChart;

class ChartReading extends Component
{
    public $year;
    public $param_month;

    public function mount(){
        $this->year = now()->year;
        $this->param_month = now()->month;
    } 
    
    public function render()
    {
        $months = [" janv", "févr", "mars", "avri", "mai", "juin", "juil", 
                "août", "sept", "octo", "nove", "déce"];
        $current_month = ($this->param_month != null) ? $this->param_month : now()->month;

        $current_year      = now()->year;
        $first_year        = 2022;
        $range             = $current_year - $first_year;

        $reading_per_day = Reading::select('id', 'created_at')
        ->whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->param_month)
        ->get()
        ->groupBy(function($data){
            return $data->created_at->day;
        });

        $reading_per_day_labels = [];
        $reading_per_day_data  = [];


        foreach($reading_per_day as $day => $readings){
            $reading_per_day_labels[] = $day;
            $reading_per_day_data [] = count($readings);
        }

        $readingChart = new ReadingChart();
        $readingChart->labels($reading_per_day_labels);
        $readingChart->label(false);
        $readingChart->displayLegend(false);
        $readingChart->height(250);
        $readingChart->dataset('Nombre de lecture', 'line', $reading_per_day_data)
        ->options([
            'color' => 'hsla(209, 100%, 53%, 1)'
        ]);

        return view('livewire.chart-reading', compact('first_year', 'range', 'months', 'current_month', 'readingChart'));
    }
}
