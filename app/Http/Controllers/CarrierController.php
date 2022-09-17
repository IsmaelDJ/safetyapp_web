<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\carrier;
use Illuminate\Http\Request;

class CarrierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carriers = User::where('role', 'transporteur')->paginate(carriersPerPage());
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
        $carrier        = User::where('id', $id)->first();
        $carrierDrivers = Driver::paginate(driversPerPage());
        return view('carriers.show', compact('carrier', 'carrierDrivers'));
    }

    public function export_Drivers($id)
    {
        $Drivers = Driver::where('user_id', $carrier->id)->get();
        return view('carriers.export_Drivers', compact('carrier', 'Drivers'));
    }

    public function edit($id)
    {
        dd('edit');
        return view('carriers.edit',compact('carrier'));
    }


    public function update(Request $request, $id)
    {
        
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
}
