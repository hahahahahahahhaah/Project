<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'nama', 'email', 'alamat', 'koneksi', 'puas_cs', 'puas_teknisi',
        'gangguan', 'kecepatan', 'harga', 'rekomendasi', 'saran'
    ];
    
}
