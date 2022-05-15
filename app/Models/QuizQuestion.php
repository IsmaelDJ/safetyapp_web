<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function responses(){
        return $this->hasMany(QuizResponse::class);
    }


    public static function boot()
    {
        parent::boot();
        static::deleting(function($quizQuestion){
            foreach ($quizQuestion->responses as $response){
                $response->delete();
            }


            if (file_exists(public_path($quizQuestion->image)) AND !empty($quizQuestion->image)){
                unlink(public_path($quizQuestion->image));
            }
            if (file_exists(public_path($quizQuestion->fr)) AND !empty($quizQuestion->fr)){
                unlink(public_path($quizQuestion->fr));
            }
            if (file_exists(public_path($quizQuestion->ar)) AND !empty($quizQuestion->ar)){
                unlink(public_path($quizQuestion->ar));
            }
            if (file_exists(public_path($quizQuestion->ng)) AND !empty($quizQuestion->ng)){
                unlink(public_path($quizQuestion->ng));
            }
        });
    }
}
