<?php

namespace App\Exports;

use stdClass;
use App\Models\Carrier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CarriersExport implements FromView
{
    use Exportable;
    
    /**
    * @return \Illuminate\Support\View
    */
    public function view():View
    {
        $data = [];
        $carriers = Carrier::with('user')->get();
        $iteration = 0;
        foreach($carriers as $carrier){
            $iteration += 1;
            $tmp = new stdClass();
            $tmp->number    = $iteration;
            $tmp->name      = $carrier->user->name;
            $tmp->phone     = $carrier->phone;
            $tmp->address   = $carrier->address;
            
            $data[] = $tmp;
        }

        $carriers = collect($data);

        return view('carriers.export_xlsx', compact('carriers'));
    }
}
