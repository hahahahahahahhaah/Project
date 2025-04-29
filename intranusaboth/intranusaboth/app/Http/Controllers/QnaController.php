<?php

namespace App\Http\Controllers;

use App\Models\Qna;
use Illuminate\Http\Request;
use App\Models\ChatbotLog;
use App\Models\ChatbotQuestion;
use Illuminate\Support\Facades\Cache;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class QnaController extends Controller
{
    public function index()
    {
        $qnas = Qna::orderByDesc('created_at')->paginate(10);
        return view('admin.qna', compact('qnas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        Qna::create([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        // Ambil ulang data setelah create
        $qnas = Qna::orderByDesc('created_at')->paginate(10);
        return view('admin.qna', compact('qnas'))->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ]);

        $qna = Qna::findOrFail($id);
        $qna->update([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        // Ambil ulang data setelah update
        $qnas = Qna::orderByDesc('created_at')->paginate(10);
        return view('admin.qna', compact('qnas'))->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Qna::findOrFail($id)->delete();

        // Ambil ulang data setelah delete
        $qnas = Qna::orderByDesc('created_at')->paginate(10);
        return view('admin.qna', compact('qnas'))->with('success', 'Pertanyaan berhasil dihapus.');
    }


    public function respond(Request $request)
    {
        $message = strtolower(trim($request->input('message')));

        if (!$message) {
            return response()->json(['reply' => 'Pesan tidak boleh kosong.'], 400);
        }

        // 1. Cari pertanyaan langsung di database
        $question = Qna::where('question', 'LIKE', "%$message%")->first();

        if ($question && $question->answer) {
            $question->increment('asked_count');
            Cache::put("chatbot:$message", $question->answer, now()->addHours(6));
            return response()->json(['reply' => $question->answer]);
        }

        // 2. Fuzzy match
        $questions = Qna::all();
        $bestMatch = null;
        $highestSimilarity = 0;

        foreach ($questions as $q) {
            similar_text($message, strtolower($q->question), $percent);
            if ($percent > $highestSimilarity) {
                $highestSimilarity = $percent;
                $bestMatch = $q;
            }
        }

        if ($bestMatch && $highestSimilarity > 60 && $bestMatch->answer) {
            Cache::put("chatbot:$message", $bestMatch->answer, now()->addHours(6));
            return response()->json(['reply' => $bestMatch->answer]);
        }

        // 3. AI response
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post('https://generativelanguage.googleapis.com/v1/models/gemini-1.5-pro:generateContent?key=' . env('AI_API_KEY'), [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => "Kamu adalah Internusa, asisten virtual dari layanan internet 'Internusa'. Tugasmu adalah menjawab pertanyaan dari pelanggan secara ramah, singkat, dan profesional. Jika kamu tidak tahu jawabannya, minta maaf dengan sopan dan arahkan untuk menghubungi CS Internusa melalui email di cs@internusa.com atau nomer telepon di 0800-123-456. Pertanyaan: " . $message]
                        ]
                    ]
                ]
            ]);

            $result = $response->json();

            $aiReply = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya belum bisa menjawab pertanyaan ini.';

            // Filter jawaban tidak relevan
            if (Str::contains($aiReply, ['model bahasa', 'Google', 'Gemini'])) {
                $aiReply = "Saya Internusa, asisten virtual dari layanan internet Internusa. Ada yang bisa saya bantu?";
            }
        } catch (\Exception $e) {
            $aiReply = 'Maaf, terjadi kesalahan saat menjawab: ' . $e->getMessage();
        }

        // 4. Simpan hanya jika jawaban berguna
        // if (
        //     !Str::startsWith($aiReply, 'Maaf, saya belum bisa menjawab') &&
        //     !Str::startsWith($aiReply, 'Maaf, terjadi kesalahan') &&
        //     strlen($message) > 5 // Pastikan pertanyaan tidak terlalu pendek
        // ) {
        //     Qna::create([
        //     'question' => $message,
        //     'answer' => $aiReply
        //     ]);
        // }

        Cache::put("chatbot:$message", $aiReply, now()->addHours(3));

        return response()->json(['reply' => $aiReply]);
    }



    public function listQuestions()
    {
        $questions = Qna::select('question')
            ->selectRaw('COUNT(*) as asked_count')
            ->groupBy('question')
            ->orderByDesc('asked_count')
            ->limit(5)
            ->pluck('question');

        return view('welcome', compact('questions'));
    }
}
