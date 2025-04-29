<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan; // Pastikan model Pelanggan sudah dibuat

class FormController extends Controller
{
    public function step1()
    {
        return view('form.lokasi');
    }

    public function step2(Request $request)
    {
        // Validasi dan simpan data form step 1 ke session
        $request->validate([
            'lokasi_pemasangan' => 'required',
            'alamat_lengkap' => 'required',
        ]);

        session()->put('form_data', array_merge(session('form_data', []), $request->all()));

        return redirect()->route('form.datadiri');
    }

    public function showStep2()
    {
        return view('form.datadiri');
    }

    public function step3(Request $request)
    {
        // Validasi data form step 2
        $request->validate([
            'email' => 'required|email',
            'nik' => 'required',
            'nama_pelanggan' => 'required',
            'no_handphone_wa' => 'required',
            'no_handphone_2' => 'required',
            'npwp' => 'required',
            'sumber_informasi' => 'required',
        ]);

        // Simpan data ke session
        session()->put('form_data', array_merge(session('form_data', []), $request->all()));

        // Arahkan ke halaman paket
        return redirect()->route('form.paket');
    }

    public function showStep3()
    {
        return view('form.paket');
    }

    public function step4(Request $request)
    {
        // Validasi data form step 3 (paket)
        $request->validate([
            'paket' => 'required',
        ]);

        // Simpan pilihan paket ke session
        session()->put('paket', $request->paket);

        // Arahkan ke halaman syarat dan ketentuan
        return redirect()->route('form.syarat');
    }

    public function showSyarat()
    {
        return view('form.syarat');
    }

    public function acceptSyarat(Request $request)
    {
        // Pastikan pengguna mencentang checkbox syarat dan ketentuan
        $request->validate([
            'syarat' => 'accepted',
        ]);

        // Simpan persetujuan di session
        session()->put('syarat', true);

        // Gabungkan data form dengan pilihan paket dan simpan ke database
        $formData = array_merge(session('form_data', []), [
            'paket' => session('paket'),
        ]);

        // Simpan data ke database
        Pelanggan::create($formData);

        // Hapus data session setelah disimpan
        session()->forget('form_data');
        session()->forget('paket');
        session()->forget('syarat'); // Hapus status persetujuan setelah data disimpan

        return redirect()->route('form.success');
    }

    public function success()
    {
        return view('form.success');
    }
}
