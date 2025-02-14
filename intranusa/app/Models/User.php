<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'nik', 'npwp', 'password','status_langganan', 'profile_picture'
, 'role'
    ];

    protected $hidden = [
        'password',
    ];
}
