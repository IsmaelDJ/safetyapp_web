<?php

namespace App\Exports;

use stdClass;
use App\Models\Driver;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ParticularExport  implements FromView
{

    public function view(): View
    {
        $data = [];
        $drivers = Driver::with('user')->where('role', 'particular')->get();

        $iteration = 0;
        foreach ($drivers as $driver) {
            $iteration += 1;
            $tmp = new stdClass();
            $tmp->number    = $iteration;
            $tmp->name      = $driver->name;
            $tmp->carrier   = $driver->user->name;
            $tmp->obc       = $driver->obc;
            $tmp->phone     = $driver->phone;
            $tmp->password  = $driver->password;

            $data[] = $tmp;
        }

        $particulars = collect($data);

        return view('particulars.export_xlsx', compact('particulars'));
    }
}
