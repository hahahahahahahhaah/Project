<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Paket.php
class Paket extends Model
{
    protected $fillable = ['nama_paket', 'kecepatan_mbps', 'harga', 'status'];

    public function pelanggan()
    {
        return $this->hasMany(Pelanggan::class);
    }
}

