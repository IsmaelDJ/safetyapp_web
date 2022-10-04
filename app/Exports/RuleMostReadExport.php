<?php

namespace App\Exports;

use App\Models\Rule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class RuleMostReadExport implements FromCollection, WithColumnWidths
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
        return Rule::whereHas("readings")
        ->withCount("readings")
        ->orderBy("readings_count", 'desc')
        ->get();
    }
}
