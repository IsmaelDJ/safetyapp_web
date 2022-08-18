<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeQuizResponse extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $fillable = ['employee_id', 'quiz_question_id', 'correct'];

    public function employee() {

        return $this->belongsTo(Employee::class);
    }

    public function quiz_question() {

        return $this->belongsTo(QuizQuestion::class);
=======
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($employe) {

            $quiz_responses = EmployeeQuizResponse::where('employee_id')->get();
            foreach ($quiz_responses as $quiz_response){
                $quiz_response->delete();
            }
        });
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
    }
}
