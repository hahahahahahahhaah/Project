<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pelanggan;

class PDFController extends Controller
{
    public function viewPDF()
    {
        $pelanggan = Pelanggan::all();
        $imagePath = public_path('images/Llogo.png'); // Tambahkan path gambar

        $pdf = Pdf::loadView('admin.laporan_pelanggan', compact('pelanggan', 'imagePath'))
            ->setPaper('legal', 'landscape');

        return $pdf->stream('laporan_pelanggan.pdf');
    }

    public function downloadPDF()
    {
        $pelanggan = Pelanggan::all();
        $imagePath = public_path('images/logo.png'); // Tambahkan path gambar

        $pdf = Pdf::loadView('admin.laporan_pelanggan', compact('pelanggan', 'imagePath'))
        ->setPaper('legal', 'landscape');

        return $pdf->download('laporan_pelanggan.pdf');
    }
}
