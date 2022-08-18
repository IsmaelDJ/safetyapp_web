<?php

namespace App\Models;

<<<<<<< HEAD
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60

class QuizQuestion extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['category_id', 'description', 'image', 'fr', 'ar', 'ng', 'correct'];

    
    public function category(){
        return $this->belongsTo(Category::class);
    }

     public function employee_quiz_responses() {
        return $this->hasMany(EmployeeQuizResponse::class);
    }

=======
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function responses(){
        return $this->hasMany(QuizResponse::class);
    }


>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    public static function boot()
    {
        parent::boot();
        static::deleting(function($quizQuestion){
<<<<<<< HEAD
=======
            foreach ($quizQuestion->responses as $response){
                $response->delete();
            }

>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60

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
