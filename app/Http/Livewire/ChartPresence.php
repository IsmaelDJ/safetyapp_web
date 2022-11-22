<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Presence;
use App\Charts\ReadingChart;

class ChartPresence extends Component
{
    public $param_month;
    public $year;


    public function mount(){
        $this->param_month = now()->month;
        $this->year        = now()->year;
    }

    public function render()
    {
        $current_year      = now()->year;
        $first_year        = 2022;
        $range             = $first_year - $current_year;
        //get presence data
        $presences = Presence::whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->param_month)
        ->with('driver')
        ->get()
        ->groupBy(function($data){
            return $data->created_at->day;
        });

        $prensence_labels = [];
        $prensence_data   = [];

        foreach($presences as $day=>$values){
            $prensence_labels[] = $day;
            $prensence_data[]   = count($values);
        }

        $presenceChart = new ReadingChart();

        $presenceChart->labels($prensence_labels);
        $presenceChart->displayLegend(false);
        $presenceChart->label(false);
        $presenceChart->dataset('Présence par jour', 'spline', $prensence_data)
        ->options([
            'color' => 'hsla(209, 100%, 53%, 1)'
        ]);

        $months = [" janv", "févr", "mars", "avri", "mai", "juin", "juil", 
                "août", "sept", "octo", "nove", "déce"];
        $current_month = ($this->param_month != null) ? $this->param_month : now()->month;

        return view('livewire.chart-presence', compact('presenceChart',
                                                        'months',
                                                        'current_month',
                                                        'first_year', 
                                                        'range',));
    }
}