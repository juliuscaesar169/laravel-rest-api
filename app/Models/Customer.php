<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;//simil User model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\Customer as Authenticatable;//simil User model
use Illuminate\Notifications\Notifiable;//simil User model

class Customer extends Model
{
    public $timestamps = false;

    use HasApiTokens, HasFactory, Notifiable;//simil User model
    
    // use HasFactory;//original

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dni',
        'id_reg',
        'id_com',
        'email',
        'name',
        'last_name',
        'date_reg'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
