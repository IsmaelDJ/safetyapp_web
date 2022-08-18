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

class Employee extends Model
{
    use HasFactory;

    public function contractor(){
        return $this->belongsTo(Contractor::class);
    }
<<<<<<< HEAD

    public function employee_quiz_responses() {
        return $this->hasMany(EmployeeQuizResponse::class);
    }
=======
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
}
