<?php

namespace App\Models;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverQuizResponse extends Model
{
    use HasFactory;

    protected $fillable = ['driver_id', 'quiz_question_id', 'correct'];

    public function driver() {

        return $this->belongsTo(Driver::class);
    }

    public function quiz_question() {

        return $this->belongsTo(QuizQuestion::class);
    }
}
