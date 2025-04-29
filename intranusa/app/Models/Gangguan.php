<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gangguan extends Model
{
    protected $fillable = [ 'user_id', 'hari','nama', 'tanggal', 'jenis', 'keterangan', 'penyebab', 'alamat', 'status'
];

// app/Models/Gangguan.php
public function user()
{
    return $this->belongsTo(User::class);
}

}
