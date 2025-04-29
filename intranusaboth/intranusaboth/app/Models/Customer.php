<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'pelanggan'; // Sesuaikan dengan nama tabel di database

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
}
