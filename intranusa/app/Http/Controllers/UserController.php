<?php

namespace App\Http\Controllers;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id); // Menangani jika user tidak ditemukan

        // Kirim data user ke view
        return view('user.show', compact('user'));
    }
}


