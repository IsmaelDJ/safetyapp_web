<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResponse extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($quizResponse) {

            //deletel all user response
            $employeeQuizResponses = EmployeeQuizResponse::where('quiz_response_id', $quizResponse->id)->get();
            foreach ($employeeQuizResponses as $employeeQuizResponse) {
                $employeeQuizResponse->delete();
            }


            if (file_exists(public_path($quizResponse->image)) and !empty($quizResponse->image)) {
                unlink(public_path($quizResponse->image));
            }
            if (file_exists(public_path($quizResponse->fr)) and !empty($quizResponse->fr)) {
                unlink(public_path($quizResponse->fr));
            }
            if (file_exists(public_path($quizResponse->ar)) and !empty($quizResponse->ar)) {
                unlink(public_path($quizResponse->ar));
            }
            if (file_exists(public_path($quizResponse->ng)) and !empty($quizResponse->ng)) {
                unlink(public_path($quizResponse->ng));
            }
        });
    }
}
