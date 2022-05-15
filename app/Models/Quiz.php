<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function quizQuestions(){
        return $this->hasMany(QuizQuestion::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($quiz){
            foreach ($quiz->quizQuestions as $quizQuestion){
                $quizQuestion->delete();
            }
            if (file_exists(public_path($quiz->image)) AND !empty($quiz->image)){
                unlink(public_path($quiz->image));
            }
        });
    }
}
