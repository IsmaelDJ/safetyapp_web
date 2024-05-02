<?php

namespace App\Exports;

use stdClass;
use App\Models\Driver;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DriversQuizExport implements FromView
{
    /** 
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        $drivers = Driver::select('drivers.*')
            ->selectRaw('COUNT(CASE WHEN driver_quiz_responses.correct = 1 THEN 1 END) as correct_answers')
            ->selectRaw('COUNT(CASE WHEN driver_quiz_responses.correct = 0 THEN 1 END) as incorrect_answers')
            ->leftJoin('driver_quiz_responses', 'drivers.id', '=', 'driver_quiz_responses.driver_id')
            ->where('drivers.role', '=', 'driver')
            ->groupBy('id', 'user_id', 'avatar', 'name', 'phone', 'obc', 'password', 'created_at', 'updated_at', 'role', 'uuid')
            ->orderByDesc('correct_answers'); // Tri par le nombre de bonnes réponses, du plus grand au plus petit
        // ->orderBy('incorrect_answers') // Tri par le nombre de mauvaises réponses, du plus petit au plus grand
        // dump($drivers);
        $drivers = $drivers->get();

        return view('driver_quiz_responses.export_xlsx', compact('drivers'));
    }
}
