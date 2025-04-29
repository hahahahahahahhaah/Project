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
    public function data_laporan()
    {
        $pelanggan = Pelanggan::all();

        // Kirim data ke view admin
        return view('admin.data_pelanggan', compact('pelanggan'));
    }

    public function getDetail($id)
    {
        $data = Pelanggan::findOrFail($id);
        return response()->json([
            'nama_pelanggan' => $data->nama_pelanggan,
            'email' => $data->email,
            'paket' => $data->paket,
            'latitude' => $data->latitude,
            'longitude' => $data->longitude,
            'nik'=> $data->nik,
            'no_handphone_wa'=> $data->no_handphone_wa,
            'no_handphone_2'=> $data->no_handphone_2,
            'npwp'=> $data->npwp,
            'alamat_lengkap'=> $data->alamat_lengkap,
            'sumber_informasi'=> $data->sumber_informasi,
            'lokasi_pemasangan' => $data->lokasi_pemasangan,
            'created_at' => $data->created_at ? $data->created_at->format('d-m-Y') : 'Tidak tersedia' // Format tanggal
        ]);
    }

    public function forceDelete($id)
    {
        $pelanggan = Pelanggan::withTrashed()->find($id);

        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan.');
        }

        $pelanggan->forceDelete(); // Menghapus data secara permanen

        return redirect()->back()->with('success', 'Pelanggan berhasil dihapus secara permanen.');
    }

}
