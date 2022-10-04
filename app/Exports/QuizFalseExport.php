<?php

namespace App\Exports;

use App\Models\QuizQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class QuizFalseExport implements FromCollection, WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 40,
            'C' => 40,
            'D' => 40,
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return QuizQuestion::whereHas("driver_quiz_responses", function ($query){
            $query->where("correct", false);
        })
        ->withCount("driver_quiz_responses")
        ->orderBy("driver_quiz_responses_count", 'desc')
        ->get();
    }
}
