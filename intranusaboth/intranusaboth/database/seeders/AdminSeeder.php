<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin123'), // Gunakan hash bcrypt
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
