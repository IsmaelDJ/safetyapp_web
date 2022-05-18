<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Employee;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contractors = Contractor::paginate(contractorsPerPage());
        return view('contractors.index', compact('contractors'));
    }



    public function create()
    {
        return view('contractors.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'phone'=>'required',
                'address'=>'required'
            ]
        );

        $contractor = new Contractor();
        $contractor->name = $request->name;
        $contractor->phone = $request->phone;
        $contractor->address = $request->address;
        $contractor->nif = $request->nif;

        $contractor->save();
        return redirect()->route('contractors.index')->with('success', "Sous-traitant ajouté");
    }

    public function show(Contractor $contractor)
    {
        $contractorEmployees = Employee::where('contractor_id',$contractor->id)->paginate(employeesPerPage());
        return view('contractors.show', compact('contractor', 'contractorEmployees'));
    }

    public function export_employees(Contractor $contractor)
    {
        $employees = Employee::where('contractor_id',$contractor->id)->get();
        return view('contractors.export_employees', compact('contractor', 'employees'));
    }

    public function edit(Contractor $contractor)
    {
        return view('contractors.edit',compact('contractor'));
    }


    public function update(Request $request, Contractor $contractor)
    {
        $request->validate(
            [
                'name'=>'required',
                'phone'=>'required',
                'address'=>'required'
            ]
        );

        $contractor->name = $request->name;
        $contractor->phone = $request->phone;
        $contractor->address = $request->address;
        $contractor->nif = $request->nif;

        $contractor->update();
        return redirect()->route('contractors.index')->with('success', "Sous-traitant modifié");
    }


    public function destroy(Contractor $contractor)
    {
        $contractor->delete();
        return redirect()->route('contractors.index')->with('success', "Sous-traitant supprimé !");
    }
}
