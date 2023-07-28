<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Reading;
use Livewire\Component;
use App\Charts\ReadingChart;

class ChartReading extends Component
{
    public $year;

    public function mount(){
        $this->year = now()->year;
    } 
    
    public function render()
    {
        $current_year      = now()->year;
        $first_year        = 2022;
        $range             = $current_year - $first_year;

        $reading_per_month = Reading::select('id', 'created_at')
        ->whereYear('created_at', $this->year)
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
        $readingChart->label(false);
        $readingChart->displayLegend(false);
        $readingChart->height(250);
        $readingChart->dataset('Lecture par moi', 'line', $reading_per_month_data)
        ->options([
            'color' => 'hsla(209, 100%, 53%, 1)'
        ]);

        return view('livewire.chart-reading', compact('first_year', 'range', 'readingChart'));
    }
}
