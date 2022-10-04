<?php

namespace App\Exports;

use stdClass;
use App\Models\Driver;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DriversExport implements FromView
{
   /** 
    * @return \Illuminate\Support\View
    */
    public function view():View
    {
        $data = [];
        $drivers = Driver::with('user')->get();

        $iteration = 0;
        foreach($drivers as $driver){
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

        $drivers = collect($data);

        return view('drivers.export_xlsx', compact('drivers'));
    }
}
