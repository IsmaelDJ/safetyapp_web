<?php

namespace App\Http\Controllers;

use stdClass;
use Carbon\Carbon;
use App\Models\Rule;
use App\Models\User;
use App\Models\Driver;
use App\Models\Reading;
use App\Models\Category;
use App\Models\Presence;
use Illuminate\Support\Str;
use App\Charts\ReadingChart;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Exports\DriversExport;
use App\Exports\DriversExportPDF;
use App\Models\driverQuizResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
                'name'      =>'required',
                'phone'     =>'required',
            ]
        );
          
        $password = rand(1000,9999);

        if(isset($request->avatar)){
            $request->validate([
                'avatar'    =>'required|image|mimes:jpeg,png,jpg',
            ]);
            $particular->avatar = uploadFile($request, 'avatar','driver_avatar');
        }

        $particular->name       = $request->name;
        $particular->phone      = $request->phone;
        $particular->uuid       = substr(Str::uuid(), 0, 4);
        $particular->password   = $password;
        $particular->role       = 'particular';

        $particular->save();
        return redirect()->route('particulars.index')->with('success', "Chauffeur ajouté");
    }

    public function show(Driver $particular)
    {
        return view('particulars.show', compact('particular'));
    }

    public function edit(Driver $particular)
    {
        return view('particulars.edit',compact('particular'));
    }


    public function update(Request $request, Driver $particular)
    {
        if ($request->hasFile('avatar')) {
            $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif']);
            if (file_exists(public_path($particular->avatar)) and !empty($particular->avatar)) {
                unlink(public_path($particular->avatar));
            }
            $particular->avatar = uploadFile($request, 'avatar','driver_avatar');
        }

        $request->validate(
            [
                'name'   =>'required',
                'phone'  =>'required',
            ]);
         
            
        $particular->name    = $request->name;
        $particular->phone   = $request->phone;

        $particular->update();
        return redirect()->route('particulars.index')->with('success', "Chauffeur modifié");
    }


    public function destroy(Driver $particular)
    {
        $particular->delete();
        return redirect()->route('particulars.index')->with('success', "Chauffeur supprimé !");
    }

}
