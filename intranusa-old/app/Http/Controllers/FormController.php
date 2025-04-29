<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Paket;

class FormController extends Controller
{
    public function step1()
    {
        return view('user.form.lokasi');
    }

    public function step2(Request $request)
    {
        // Validasi dan simpan data form step 1 ke session
        $request->validate([
            'lokasi_pemasangan' => 'required',
            'alamat_lengkap' => 'required',
  'latitude' => 'required',
        'longitude' => 'required'
        ]);

        session()->put('form_data', array_merge(session('form_data', []), $request->all()));

        return redirect()->route('user.form.datadiri');

    }

    public function showStep2()
    {
        return view('user.form.datadiri');
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
        return redirect()->route('user.form.paket');

    }

    public function showStep3()
    {
        $pakets = Paket::all();

        // return view('user.form.paket');
        return view('user.form.paket', compact('pakets'));

    }

    // public function step4(Request $request)
    // {
    //     // Validasi data form step 3 (paket)
    //     $request->validate([
    //         'paket' => 'required',
    //     ]);

    //     // Simpan pilihan paket ke session
    //     session()->put('paket_id', $request->paket);

    //     // Arahkan ke halaman syarat dan ketentuan
    //     return redirect()->route('user.form.syarat');

    // }

    public function step4(Request $request)
    {
        // Validasi inputan radio paket (pastikan ada)
        $request->validate([
            'paket' => 'required|exists:pakets,id', // validasi apakah id paket valid
        ]);

        // Simpan ke session dengan key paket_id (agar jelas)
        session()->put('paket_id', $request->paket);

        // Arahkan ke halaman syarat dan ketentuan
        return redirect()->route('user.form.syarat');
    }


    public function showSyarat()
    {
        return view('user.form.syarat');
    }

       public function acceptSyarat(Request $request)
    {
        $request->validate([
            'syarat' => 'accepted',
        ]);

        session()->put('syarat', true);

        $user = auth()->user(); // Ambil user yang sedang login

        // Gabungkan data form dengan pilihan paket dan set status menjadi "pending"
        $formData = array_merge(session('form_data', []), [
            'paket_id' => session('paket_id'),
            'status_langganan' => 'pending',
            'user_id' => $user->id, // Simpan user_id untuk relasi
        ]);

        // Simpan data pelanggan baru
        $pelanggan = Pelanggan::create($formData);

        // Perbarui status user di tabel users
        $user->update(['status_langganan' => 'pending']);

        session()->forget('form_data');
        session()->forget('paket');
        session()->forget('syarat');

        return redirect()->route('user.form.success')->with('success', 'Permohonan langganan berhasil diajukan, menunggu persetujuan admin.');
    }



    public function success()
    {
        return view('user.form.success');
}
}
