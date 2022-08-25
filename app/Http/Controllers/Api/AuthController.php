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

        if (!$request->only('uid', 'password')) {
            return response()->json([
                'message' => 'Information de connection invalid'
            ], 401);
        }

        $employee = Employee::where('uid', $request['uid'])->firstOrFail();

        return response()->json([
            'status'       =>  true,
            'message'      => 'Connection reuissi',
            'employee'     =>  $employee,
        ]);
    }
}
