<?php

namespace App\Http\Controllers\Api;

use Throwable;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

     public function login(Request $request){

        try{
            $driver = new Driver();

            if($request->is_driver == 1){
                if (!$request->only('obc', 'password')) {
                    return response()->json([
                        'status'  => false,
                        'message' => 'Mot de passe incorrect'
                    ], 200);
                }
        
                $driver = Driver::where('obc', $request['obc'])->first();
            }

            else {
                if (!$request->only('uuid', 'password')) {
                    return response()->json([
                        'status'  => false,
                        'message' => 'Mot de passe incorrect'
                    ], 200);
                }
        
                $driver = Driver::where('uuid', $request['uuid'])->first();
            }
    
            if(!$driver){
                return response()->json([
                    'status'  => false,
                    'message' => 'Mot de passe incorrect'
                ], 200);
            }

            if(!($driver->password == $request['password'])){
                return response()->json([
                    'status' => false,
                    'message' => 'Mot de passe incorrect'
                ], 200);
            }
    
            return response()->json([
                'status'       =>  true,
                'message'      => 'Connexion reuissi',
                'driver'     =>  $driver,
            ]);
        }catch(Throwable $th){
           
            return response()->json([
                'status'  => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
