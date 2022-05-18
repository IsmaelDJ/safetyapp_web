<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeQuizResponse extends Model
{
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($employe) {

            $quiz_responses = EmployeeQuizResponse::where('employee_id')->get();
            foreach ($quiz_responses as $quiz_response){
                $quiz_response->delete();
            }
        });
    }
}
