<?php

namespace App\Models;

<<<<<<< HEAD
use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60

class Category extends Model
{
    use HasFactory;

    public function rules(){
        return $this->hasMany(Rule::class);
    }

<<<<<<< HEAD
    public function quizzes(){
        return $this->hasMany(QuizQuestion::class);
    }

=======
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    public static function boot()
    {
        parent::boot();
        static::deleting(function($category){
            foreach ($category->rules as $rule){
                $rule->delete();
            }
            if (file_exists(public_path($category->image)) AND !empty($category->image)){
                unlink(public_path($category->image));
            }
        });
    }
}
