<?php

namespace App\Models;

use App\Models\User;
use App\Models\Carrier;
use App\Models\Reading;
use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function driver_quiz_responses() {
        return $this->hasMany(DriverQuizResponse::class);
    }

    public function readings() {
        return $this->hasMany(Reading::class);
    }
}
