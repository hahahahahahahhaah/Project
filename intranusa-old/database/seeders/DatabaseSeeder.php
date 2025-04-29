<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class); // Tambahkan ini jika belum ada
        $this->call(PaketSeeder::class); // Tambahkan ini jika belum ada
    }
}
