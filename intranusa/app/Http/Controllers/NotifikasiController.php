<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    // Menampilkan daftar pelanggan dengan status pending
    public function index()
    {
        $notifikasi = Pelanggan::where('status_langganan', 'Pending')->get();
        return view('admin.notifikasi', compact('notifikasi'));
    }

    // Menyetujui langganan dan mengubah status menjadi aktif
    // public function approveLangganan($id)
    // {
    //     $pelanggan = Pelanggan::findOrFail($id);
    //     $pelanggan->update([
    //         'status_langganan' => 'Aktif',
    //         'status_notif' => 'diproses'
    //     ]);

    //     // Jika pelanggan terkait dengan user di tabel users, update juga statusnya
    //     if ($pelanggan->user_id) {
    //         User::where('id', $pelanggan->user_id)->update(['status_langganan' => 'aktif']);
    //     }

    //     return redirect()->back()->with('success', 'Langganan berhasil diaktifkan.');
    // }

// Menyetujui langganan dan mengubah status menjadi disetujui [TAMBAHAN: ubah "Aktif" jadi "Disetujui"]
public function approveLangganan($id)
{
    $pelanggan = Pelanggan::findOrFail($id);
    $pelanggan->update([
        'status_langganan' => 'Disetujui', // [TAMBAHAN]
        'status_notif' => 'diproses'
    ]);

    // Jika pelanggan terkait dengan user di tabel users, update juga statusnya
    if ($pelanggan->user_id) {
        User::where('id', $pelanggan->user_id)->update(['status_langganan' => 'Disetujui']); // [TAMBAHAN]
    }

    return redirect()->back()->with('success', 'Langganan telah disetujui. Menunggu pembayaran.');
}

// [TAMBAHAN] Fungsi ini bisa dipanggil dari route webhook (misal: /midtrans/callback)
// public function handleMidtransCallback(Request $request)
// {
//     $serverKey = config('midtrans.server_key');
//     $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

//     if ($hashed === $request->signature_key) {
//         $pelanggan = Pelanggan::where('order_id', $request->order_id)->first(); // pastikan kamu punya kolom order_id di tabel pelanggan

//         if ($pelanggan && $request->transaction_status === 'settlement') {
//             $pelanggan->update([
//                 'status_langganan' => 'Aktif' // [TAMBAHAN]
//             ]);

//             if ($pelanggan->user_id) {
//                 User::where('id', $pelanggan->user_id)->update(['status_langganan' => 'aktif']); // [TAMBAHAN]
//             }
//         }
//     }

//     return response()->json(['message' => 'Callback processed']); // [TAMBAHAN]
// }



    // Menolak langganan dan mengubah status menjadi tidak aktif
    public function rejectLangganan($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'status_langganan' => 'Tidak aktif',
            'status_notif' => 'diproses'
        ]);

        // Jika pelanggan terkait dengan user di tabel users, update juga statusnya
        if ($pelanggan->user_id) {
            User::where('id', $pelanggan->user_id)->update(['status_langganan' => 'tidak aktif']);
        }

        return redirect()->back()->with('error', 'Langganan telah ditolak.');
    }
}
