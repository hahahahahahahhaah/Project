<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'password','status_langganan', 'profile_picture'
, 'role'
    ];
// Model User.php
// Model User.php
public function pelanggan()
{
    return $this->hasOne(Pelanggan::class);
}


    protected $hidden = [
        'password',
    ];
}
