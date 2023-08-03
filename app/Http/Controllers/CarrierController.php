<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\User;
use App\Models\Driver;
use App\Models\Carrier;
use Illuminate\Http\Request;
use App\Exports\CarriersExport;
use App\Exports\CarriersExportPDF;
use Maatwebsite\Excel\Facades\Excel;

class CarrierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carriers = Carrier::paginate(carriersPerPage());
        return view('carriers.index', compact('carriers'));
    }

    public function create()
    {
        $users = User::where('role', 'transporteur')->get();
        return view('carriers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id'=>'required',
                'phone'  =>'required',
                'address'=>'required'
            ]
        );

        $carrier = new carrier();
        
        $carrier->user_id = $request->user_id;
        $carrier->phone   = $request->phone;
        $carrier->address = $request->address;

        $carrier->save();
        return redirect()->route('carriers.index')->with('success', "Transporteur ajouté");
    }

    public function show($id)
    {
        $carrier        = Carrier::find($id);
        $carrierDrivers = Driver::where([['user_id', '=', $carrier->user_id], ['role', '=', 'driver']])->paginate(driversPerPage());
        return view('carriers.show', compact('carrier', 'carrierDrivers'));
    }

    public function export_drivers(Carrier $carrier)
    {
        $drivers = Driver::where([['user_id', '=', $carrier->user_id], ['role', '=', 'driver']])->get();
        return view('carriers.export_drivers', compact('carrier', 'drivers'));
    }

    public function edit($id)
    {
        $carrier = Carrier::find($id);
        return view('carriers.edit',compact('carrier'));
    }


    public function update(Request $request, $id)
    {
        $carrier = Carrier::find($id);
        
        $request->validate(
            [
                'user_id'=>'required',
                'phone'  =>'required',
                'address'=>'required'
            ]
        );

        $carrier->user_id = $request->user_id;
        $carrier->phone   = $request->phone;
        $carrier->address = $request->address;

        $carrier->update();
        return redirect()->route('carriers.index')->with('success', "Transporteur modifié");
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('carriers.index')->with('success', "Transporteur supprimé !");
    }

    public function export_xlsx(){
        return Excel::download(new CarriersExport, date('YmdHis').'_'.'carriers.xlsx');
    }

    public function export_pdf(){
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

        return view('carriers.export_pdf', compact('carriers'));    
    }
}
