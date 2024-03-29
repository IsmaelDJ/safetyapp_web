<?php

namespace App\Models;

use App\Models\Reading;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rule extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function readings() {
        return $this->hasMany(Reading::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($rule){
            if (file_exists(public_path($rule->image)) AND !empty($rule->image)){
                unlink(public_path($rule->image));
            }
            if (file_exists(public_path($rule->fr)) AND !empty($rule->fr)){
                unlink(public_path($rule->fr));
            }
            if (file_exists(public_path($rule->ar)) AND !empty($rule->ar)){
                unlink(public_path($rule->ar));
            }
            if (file_exists(public_path($rule->ng)) AND !empty($rule->ng)){
                unlink(public_path($rule->ng));
            }
        });
    }
}
