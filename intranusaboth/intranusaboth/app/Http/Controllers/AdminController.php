<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use App\Models\Pelanggan;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin', $admin->username);
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
        }

        return back()->withErrors(['error' => 'Username atau password salah']);
    }

    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('admin.login')->with('logout_success', 'Logout berhasil!');
    }

    // public function dashboard()
    // {

    //     if (!Session::has('admin')) {
    //         return redirect()->route('admin.login');
    //     }

    //     return view('admin.dashboard');
    // }
    // public function dashboard()
    // {
    //     // Pastikan hanya admin yang bisa mengakses
    //     if (!Auth::check() || Auth::user()->role !== 'admin') {
    //         return redirect()->route('admin.login');
    //     }

    //     // Ambil semua data pelanggan dari database
    //     $pelanggan = Pelanggan::all();
    //     $totalPelanggan = Pelanggan::count();

    //     // Kirim data ke view admin
    //     return view('admin.dashboard', compact('pelanggan'));
    // }
    public function dashboard()
    {
        // Pastikan hanya admin yang bisa mengakses
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('admin.login');
        }

        // Ambil semua data pelanggan dari database
        $pelanggan = Pelanggan::all();
        // Hitung total pelanggan
        $totalPelanggan = Pelanggan::count();

        // Kirim data ke view admin
        return view('admin.dashboard', compact('pelanggan', 'totalPelanggan'));
    }

    public function data()
    {
        // Ambil semua data pelanggan dari database
        $pelanggan = Pelanggan::all();

        // Kirim data ke view admin
        return view('admin.data', compact('pelanggan'));


    }
}
