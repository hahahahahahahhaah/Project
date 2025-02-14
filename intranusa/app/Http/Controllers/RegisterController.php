<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Menangani proses registrasi.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi input dari pengguna
        $request->validate([
            'name' => 'required|unique:users',
            'nik' => 'required|unique:users',
            'npwp' => 'required|unique:users',
        ]);

        try {
            // Membuat pengguna baru dengan data yang sudah divalidasi
            $user = User::create([
                'name' => $request->name,
                'nik' => $request->nik,
                'npwp' => $request->npwp,
            ]);

            // Login otomatis setelah registrasi berhasil
            Auth::login($user);

            // Redirect ke dashboard atau halaman lain setelah registrasi berhasil
            return redirect()->route('dashboard'); // Ganti dengan rute yang sesuai
        } catch (\Exception $e) {
            // Menangani error jika ada kesalahan dalam proses pembuatan user
            return back()->withErrors(['msg' => 'Terjadi kesalahan saat mendaftar.']);
        }
    }
}
