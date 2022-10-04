<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Exports\DriversExport;
use Maatwebsite\Excel\Facades\Excel;

class Export extends Component
{
    public $url;
    public function mount($url){
        $this->url = $url;
    }

    public function export(){
        return Excel::download(new DriversExport, date('YmdHis').'_'.'drivers.xlsx');
    }

    public function render()
    {
        return view('livewire.export');
    }
}
