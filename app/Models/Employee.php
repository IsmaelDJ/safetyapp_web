<?php

namespace App\Models;

use App\Models\Reading;
use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    public function contractor(){
        return $this->belongsTo(Contractor::class);
    }

    public function employee_quiz_responses() {
        return $this->hasMany(EmployeeQuizResponse::class);
    }

    public function readings() {
        return $this->hasMany(Reading::class);
    }
}
