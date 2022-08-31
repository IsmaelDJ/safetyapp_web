<?php

namespace App\Models;

use App\Models\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reading extends Model
{
    use HasFactory;

    
    protected $fillable = ['employee_id', 'rule_id', 'category_id'];

    public function employee() {

        return $this->belongsTo(Employee::class);
    }

    public function rule() {

        return $this->belongsTo(Rule::class);
    }

    public function Category() {

        return $this->belongsTo(Category::class);
    }
}
