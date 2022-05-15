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
        static::deleting(function($quizResponse){



            if (file_exists(public_path($quizResponse->image)) AND !empty($quizResponse->image)){
                unlink(public_path($quizResponse->image));
            }
            if (file_exists(public_path($quizResponse->fr)) AND !empty($quizResponse->fr)){
                unlink(public_path($quizResponse->fr));
            }
            if (file_exists(public_path($quizResponse->ar)) AND !empty($quizResponse->ar)){
                unlink(public_path($quizResponse->ar));
            }
            if (file_exists(public_path($quizResponse->ng)) AND !empty($quizResponse->ng)){
                unlink(public_path($quizResponse->ng));
            }
        });
    }
}
