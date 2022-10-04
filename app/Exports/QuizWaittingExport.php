<?php

namespace App\Exports;

use App\Models\QuizQuestion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class QuizWaittingExport implements FromCollection, WithColumnWidths
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
    * @return \Illuminate\Support\array
    */
    public function collection()
    {
        return QuizQuestion::whereDoesntHave("driver_quiz_responses")
        ->get();
    }
}
