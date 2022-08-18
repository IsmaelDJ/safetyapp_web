<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::paginate(contractorsPerPage());
        return view('employees.index', compact('employees'));
    }


    public function create()
    {

        $contractors = Contractor::get();
        return view('employees.create', compact('contractors'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'contractor_id'=>'required',
                'phone'=>'required'
            ]
        );
        $uid = 0;
        do{
            $uid = rand(1000,9999) ."";
        }while(Employee::where('uid',$uid)->exists());
        $password = rand(1000,9999);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->contractor_id = $request->contractor_id;
        $employee->uid = $uid;;
        $employee->password = $password;

        $employee->save();
        return redirect()->route('employees.index')->with('success', "Sous-traitant ajouté");
    }

    public function show(Employee $employee)
    {
        $contractorEmployees = Employee::where('contractor_id', $employee->contractor_id)->paginate(employeesPerPage());
        return view('employees.show', compact('employee', 'contractorEmployees'));
    }

    public function edit(Employee $employee)
    {
        $contractors = Contractor::where('id','!=',$employee->contractor_id)->get();
        return view('employees.edit',compact('employee','contractors'));
    }


    public function update(Request $request, Employee $employee)
    {

        $request->validate(
            [
                'name'=>'required',
                'contractor_id'=>'required',
                'phone'=>'required'
            ]
        );


        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->contractor_id = $request->contractor_id;

        $employee->update();
        return redirect()->route('employees.index')->with('success', "Utilisateur modifié");
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', "Utilisateur supprimé !");
    }
}
