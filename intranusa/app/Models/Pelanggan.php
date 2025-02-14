<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama_pelanggan',
        'email',
        'lokasi_pemasangan',
        'paket',
        'nik',
        'no_handphone_wa',
        'no_handphone_2',
        'npwp',
        'alamat_lengkap',
        'sumber_informasi',
    ];
    protected $attributes = [
        'status_notif' => 'pending', // Nilai default
    ];
}
