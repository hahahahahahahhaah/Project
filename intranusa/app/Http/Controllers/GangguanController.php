<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gangguan;

class GangguanController extends Controller
{
    // Menampilkan semua laporan gangguan untuk admin
    public function index()
    {
        // Hanya admin yang bisa melihat semua laporan
        if(auth()->user()->role === 'admin') {
            $gangguans = Gangguan::all(); // Ambil semua data gangguan
        } else {
            // User biasa hanya bisa melihat laporan mereka sendiri
            $gangguans = Gangguan::where('user_id', auth()->id())->get();
        }

        return view('admin.gangguan', compact('gangguans'));  // Ganti view dengan yang sesuai untuk admin
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required|date',
            'jenis' => 'required',
        ]);

        Gangguan::create([
            'user_id'    => auth()->id(),
            'hari'       => $request->hari,
            'nama'       => $request->nama,
            'tanggal'    => $request->tanggal,
            'alamat'     => $request->alamat,
            'jenis'      => $request->jenis,
            'keterangan' => $request->keterangan,
            'penyebab'   => $request->penyebab,
            'status'     => 'menunggu',
        ]);

        return redirect()->route('gangguan.create')->with('success', 'Laporan berhasil dikirim!');
    }
    public function show($id)
    {
        // Cek apakah gangguan ada, jika tidak ada maka akan dilemparkan error 404
        $gangguan = Gangguan::findOrFail($id);

        // Mengembalikan view dengan data gangguan
        return view('admin.gangguan_show', compact('gangguan'));
    }
    public function updateStatus(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',  // Ganti dengan status yang diinginkan
        ]);

        // Temukan gangguan berdasarkan ID
        $gangguan = Gangguan::findOrFail($id);

        // Perbarui status gangguan
        $gangguan->status = $request->status;
        $gangguan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('gangguan.index')->with('success', 'Status laporan gangguan berhasil diperbarui!');
    }

}
