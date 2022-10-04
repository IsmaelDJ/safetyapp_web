<?php

namespace App\Exports;

use stdClass;
use App\Models\Reading;
use App\Models\Presence;
use App\Models\DriverQuizResponse;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DetailsExport implements FromArray, WithColumnWidths
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
    public function array(): array
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
            $tmp->driver   = $event->driver;
            $tmp->action    = 'Lancement de l\'aplication';
            $tmp->created_at= Date($event->created_at);
            $data[] = $tmp;
        }

        return $data;
    }
}
