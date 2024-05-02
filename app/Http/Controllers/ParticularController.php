<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Exports\ParticularExport;
use Maatwebsite\Excel\Facades\Excel;

class ParticularController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $particulars = Driver::where('role', 'particular')->paginate(driversPerPage());
        return view('particulars.index', compact('particulars'));
    }


    public function create()
    {
        return view('particulars.create');
    }

    public function store(Request $request)
    {
        $particular = new Driver();

        $request->validate(
            [
                'name'      => 'required',
                'phone'     => 'required',
            ]
        );

        $password = rand(1000, 9999);

        if (isset($request->avatar)) {
            $request->validate([
                'avatar'    => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $particular->avatar = uploadFile($request, 'avatar', 'driver_avatar');
        }

        $particular->name       = $request->name;
        $particular->phone      = $request->phone;
        $particular->uuid       = str_pad(Driver::where('role', 'particular')->count(), 4, '0', STR_PAD_LEFT);
        $particular->password   = $password;
        $particular->role       = 'particular';
        $particular->user_id    = 2;
        $particular->obc        = uniqid();

        $particular->save();
        return redirect()->route('particulars.index')->with('success', "Chauffeur ajouté");
    }

    public function show(Driver $particular)
    {
        return view('particulars.show', compact('particular'));
    }

    public function edit(Driver $particular)
    {
        return view('particulars.edit', compact('particular'));
    }


    public function update(Request $request, Driver $particular)
    {
        if ($request->hasFile('avatar')) {
            $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif']);
            if (file_exists(public_path($particular->avatar)) and !empty($particular->avatar)) {
                unlink(public_path($particular->avatar));
            }
            $particular->avatar = uploadFile($request, 'avatar', 'driver_avatar');
        }

        $request->validate(
            [
                'name'   => 'required',
                'phone'  => 'required',
            ]
        );


        $particular->name    = $request->name;
        $particular->phone   = $request->phone;

        $particular->update();
        return redirect()->route('particulars.index')->with('success', "Particulier modifié");
    }


    public function destroy(Driver $particular)
    {
        $particular->delete();
        return redirect()->route('particulars.index')->with('success', "Particulier supprimé !");
    }

    public function export_xlsx()
    {
        return Excel::download(new ParticularExport, date('YmdHis') . '_' . 'particular.xlsx');
    }
    public function export_pdf()
    {
        $data = [];
        $particulars = Driver::with('user')->where('role', 'particular')->get();

        $iteration = 0;
        foreach ($particulars as $driver) {
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

        return view('particulars.export_pdf', compact('drivers'));
    }
}
