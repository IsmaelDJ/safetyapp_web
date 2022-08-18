<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;
    public function employees(){
        return $this->hasMany(Employee::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($contractor){
            foreach ($contractor->employees as $employee){
                $employee->delete();
            }
        });
    }
}
