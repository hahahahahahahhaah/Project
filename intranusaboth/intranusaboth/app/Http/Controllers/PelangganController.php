<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Menampilkan halaman admin/data dengan form pelanggan
    public function data()
    {
        return view('admin.data'); // View ini bisa berisi form pembuatan pelanggan
    }

    // Menyimpan data pelanggan ke database
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi data yang diterima
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email' => 'required|email|string:pelanggan,email',
            'lokasi_pemasangan' => 'required|string',
            'paket' => 'required|string',
            'nik' => 'required|string|string:pelanggan,nik',
            'no_handphone_wa' => 'required|string|max:15',
            'no_handphone_2' => 'nullable|string|max:15',
            'npwp' => 'nullable|string|max:20',
            'alamat_lengkap' => 'required|string',
            'sumber_informasi' => 'required|string',
        ]);

        // Menyimpan data pelanggan
        $pelanggan = new Pelanggan();
        $pelanggan->nama_pelanggan = $validated['nama_pelanggan'];
        $pelanggan->email = $validated['email'];
        $pelanggan->lokasi_pemasangan = $validated['lokasi_pemasangan'];
        $pelanggan->paket = $validated['paket'];
        $pelanggan->nik = $validated['nik'];
        $pelanggan->no_handphone_wa = $validated['no_handphone_wa'];
        $pelanggan->no_handphone_2 = $validated['no_handphone_2'];
        $pelanggan->npwp = $validated['npwp'];
        $pelanggan->alamat_lengkap = $validated['alamat_lengkap'];
        $pelanggan->sumber_informasi = $validated['sumber_informasi'];
        $pelanggan->save();

        // Redirect atau response
        return redirect()->route('admin.data')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

}
