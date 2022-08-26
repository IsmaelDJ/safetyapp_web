<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

     public function login(Request $request){

        try{
            if (!$request->only('uid', 'password')) {
                return response()->json([
                    'status' => false,
                    'message' => 'Information de connection invalid'
                ], 401);
            }
    
            $employee = Employee::where('uid', $request['uid'])->first();
    
            if(!$employee){
                return response()->json('Aucun employee correspondant à ce uid', 404);
            }

            if(!($employee->password == $request['password'])){
                return response()->json([
                    'status' => false,
                    'message' => 'Mot de passe incorrect'
                ], 404);
            }
    
            return response()->json([
                'status'       =>  true,
                'message'      => 'Connection reuissi',
                'employee'     =>  $employee,
            ]);
        }catch(Throwable $th){
           
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
