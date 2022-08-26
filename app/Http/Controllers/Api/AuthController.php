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
                    'status'  => false,
                    'message' => 'Mot de passe incorrect'
                ], 200);
            }
    
            $employee = Employee::where('uid', $request['uid'])->first();
    
            if(!$employee){
                return response()->json([
                    'status'  => false,
                    'message' => 'Mot de passe incorrect'
                ], 200);
            }

            if(!($employee->password == $request['password'])){
                return response()->json([
                    'status' => false,
                    'message' => 'Mot de passe incorrect'
                ], 200);
            }
    
            return response()->json([
                'status'       =>  true,
                'message'      => 'Connexion reuissi',
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
