<?php

namespace Database\Seeders; // 🛑 Pastikan namespace ini benar

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            // 'nik' => null,
            // 'npwp' => null,
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'user1',
            // 'nik' => '1234567890123456',
            // 'npwp' => '123456789012345',
            'password' => Hash::make('password'),
            'profile_picture' => 'default-profile.jpg',
            'status_langganan' => 'Tidak Aktif',
            'role' => 'user',
        ]);
        // User::create([
        //     'username' => 'user2',
        //     'nik' => '1234567890123457',
        //     'npwp' => '123456789012346',
        //     'password' => null,
        //     'profile_picture' => 'default-profile.jpg',
        //     'status_langganan' => 'Tidak Aktif',
        //     'role' => 'user',
        // ]);
    }
}
