<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function checkSubscription(Request $request)
    {
        $user = Auth::user();
        $pelanggan = $user->pelanggan;

        if ($pelanggan && $pelanggan->status_langganan == 'Aktif') {
            return response()->json([
                'message' => 'Anda bisa membatalkan langganan.'
            ]);
        }

        return response()->json([
            'message' => 'Anda tidak bisa membatalkan langganan karena sudah tidak aktif atau tidak ada langganan.'
        ]);
    }

    public function cancelSubscription(Request $request)
    {
        $user = Auth::user();
        $pelanggan = $user->pelanggan;

        if ($pelanggan && $pelanggan->status_langganan == 'Aktif') {
            $pelanggan->update([
                'status_langganan' => 'Pending'
            ]);

            return response()->json([
                'message' => 'Permintaan pembatalan langganan Anda telah diajukan dan menunggu persetujuan admin.'
            ]);
        }

        return response()->json([
            'message' => 'Langganan tidak dapat dibatalkan karena tidak aktif.'
        ]);
    }

    public function showPendingCancellations()
    {
        $admin = Auth::user();

        if ($admin->role !== 'admin') {
            abort(403, 'Anda tidak memiliki hak akses.');
        }

        $pendingCancellations = Pelanggan::where('status_langganan', 'Pending')
            ->with('user')
            ->get();

        return view('admin.berhenti-berlangganan', compact('pendingCancellations'));
    }

    public function approveCancelSubscription($userId, $status)
    {
        $admin = Auth::user();

        if ($admin->role !== 'admin') {
            abort(403, 'Anda tidak memiliki hak akses.');
        }

        $user = User::findOrFail($userId);
        $pelanggan = $user->pelanggan;

        if (!$pelanggan) {
            return redirect()->back()->with('error', 'Pelanggan tidak ditemukan.');
        }

        if ($status == 'approve') {
            $pelanggan->update([
                'status_langganan' => 'Dihentikan'
            ]);

            return redirect()->back()->with('success', 'Permintaan pembatalan langganan telah disetujui.');
        } else {
            $pelanggan->update([
                'status_langganan' => 'Aktif'
            ]);

            return redirect()->back()->with('success', 'Permintaan pembatalan langganan telah ditolak.');
        }
    }
}
