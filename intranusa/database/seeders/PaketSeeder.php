<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paket::create([
            'nama_paket' => 'Paket 50 Mbps',
            'kecepatan_mbps' => 50,
            'harga' => 333000,
            'deskripsi' => "
                - Streaming Video (HD): 6–10 Perangkat\n
                - Streaming Video (4K): 2–4 Perangkat\n
                - Browsing Media Sosial: 15–20 Perangkat\n
                - Video Call (HD): 8–12 Perangkat\n
                - Gaming Online: 5–8 Perangkat
            ",
        ]);
            }
}
