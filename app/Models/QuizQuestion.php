<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'description', 'image', 'fr', 'ar', 'ng', 'correct'];

    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function employee_quiz_responses() {
        return $this->hasMany(EmployeeQuizResponse::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($quizQuestion){

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
