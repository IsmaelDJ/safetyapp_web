<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function rules(){
        return $this->hasMany(Rule::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($category){
            foreach ($category->rules as $rule){
                $rule->delete();
            }
            if (file_exists(public_path($category->image)) AND !empty($category->image)){
                unlink(public_path($category->image));
            }
        });
    }
}
