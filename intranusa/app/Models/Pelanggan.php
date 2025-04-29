<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'pelanggan_id';

    protected $fillable = [
        'user_id', // Tambahkan user_id
        'nama_pelanggan',
        'email',
        'lokasi_pemasangan',
  'latitude',
        'longitude',
        // 'paket',
        'nik',
        'no_handphone_wa',
        'no_handphone_2',
        'npwp',
        'alamat_lengkap',
        'sumber_informasi',
        'status_langganan',
        'paket_id',
        'status_notif',
    ];

    // Relasi ke model User (Opsional)
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'pelanggan_id');  // Pastikan kolom relasi yang benar
    }


}
