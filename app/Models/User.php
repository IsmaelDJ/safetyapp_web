<?php

namespace App\Models;

use App\Models\Carrier;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'avatar',
        'expires_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperAdmin(){
        return $this->role == 'superadmin';
    }

    public function isAdmin(){
        return $this->role == 'admin';
    }

    public function isCarrier(){
        return $this->role === 'transporteur';
    }

    /**
     * Get the carrier that owns the User
     */
    public function carrier()
    {
        return $this->hasOne(Carrier::class);
    }

    public function drivers(){
        return $this->hasMany(Driver::class);
    }
}
