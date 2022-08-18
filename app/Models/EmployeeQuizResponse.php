<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeQuizResponse extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'quiz_question_id', 'correct'];

    public function employee() {

        return $this->belongsTo(Employee::class);
    }

    public function quiz_question() {

        return $this->belongsTo(QuizQuestion::class);
    }
}
