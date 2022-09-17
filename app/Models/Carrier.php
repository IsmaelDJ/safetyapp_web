<?php

namespace App\Models;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrier extends Model
{
    use HasFactory;
 
    /**
     * Get the user associated with the Carrier
     *
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($carrier){
            foreach ($carrier->drivers as $driver){
                $driver->delete();
            }
        });
    }
}
