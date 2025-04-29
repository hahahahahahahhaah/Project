<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the feedback (optional).
     */
    public function index(Request $request)
    {
        $month = $request->input('month');
        $feedbackQuery = Feedback::query();

        if ($month) {
            $feedbackQuery->whereMonth('created_at', $month);
        }

        $qnas = $feedbackQuery->latest()->paginate(10);

        return view('admin.feedback', compact('qnas', 'month'));
    }

    /**
     * Show the form for creating a new feedback (optional).
     */
    public function create()
    {
        return view('feedback-form');  
    } 

    /**
     * Store feedback data from the form.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'koneksi' => 'required|in:1,2,3,4,5',
            'puas_cs' => 'required|in:1,2,3,4,5',
            'puas_teknisi' => 'required|in:1,2,3,4,5',
            'gangguan' => 'required|string',
            'kecepatan' => 'required|string',
            'harga' => 'required|string',
            'rekomendasi' => 'required|string',
            'saran' => 'nullable|string',
        ]);

        $feedbackData = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'koneksi' => $request->input('koneksi'),
            'puas_cs' => $request->input('puas_cs'),
            'puas_teknisi' => $request->input('puas_teknisi'),
            'gangguan' => $request->input('gangguan'),
            'kecepatan' => $request->input('kecepatan'),
            'harga' => $request->input('harga'),
            'rekomendasi' => $request->input('rekomendasi'),
            'saran' => $request->input('saran'),
        ];
        
        \Log::info('Storing feedback data:', $feedbackData);

       
        try {
            Feedback::create($feedbackData);
            \Log::info('Feedback successfully stored.');
        } catch (\Exception $e) {
            \Log::error('Error storing feedback data: ' . $e->getMessage());
        }

        return redirect('/')->with('success', 'Terima kasih atas feedback Anda!');


    }

    /**
     * Display specific feedback entry (optional).
     */
    public function show(Feedback $feedback)
    {
        return view('feedback.show', compact('feedback'));
    }

    /**
     * Destroy feedback entry (optional).
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', 'Feedback berhasil dihapus');
    }

    /**
     * Export feedback data to PDF.
     */
    public function exportPdf(Request $request)
    {
        $month = $request->input('month');
        $feedbackQuery = Feedback::query();

        if ($month) {
            $feedbackQuery->whereMonth('created_at', $month);
        }

        $feedback = $feedbackQuery->get();

        $pdf = Pdf::loadView('admin.feedback-pdf', compact('feedback'));
        return $pdf->download('feedback.pdf');
    }
}
