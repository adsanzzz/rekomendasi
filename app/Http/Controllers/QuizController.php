<?php
// app/Http/Controllers/QuizController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;  // Pastikan Anda sudah memiliki model untuk produk
use App\Models\Skincare;

class QuizController extends Controller
{
    // Menghitung tipe kulit berdasarkan jawaban
    public function calculateSkinType(Request $request)
    {
        $answers = $request->input('answers');  // Jawaban dari user

        // Menentukan bobot untuk setiap parameter
        $weights = [
            'oily' => 0.4,
            'normal' => 0.3,
            'acne' => 0.2,
            'dry' => 0.1,
        ];

        $maxScore = 4;  // Skor maksimal untuk setiap pertanyaan
        $score = 1;

        // Menghitung skor berdasarkan jawaban
        foreach ($answers as $parameter => $value) {
            $normalized = $value / $maxScore;  // Normalisasi nilai jawaban
            $score *= pow($normalized, $weights[$parameter]);  // Hitung skor akhir
        }
        // Tentukan tipe kulit berdasarkan skor
        if ($score > 0.7) {
            $skinType = 'oily';
        } elseif ($score > 0.5) {
            $skinType = 'normal';
        } elseif ($score > 0.3) {
            $skinType = 'acne';
        } else {
            $skinType = 'dry';
        }

        // Menampilkan produk yang cocok berdasarkan tipe kulit
        $products = Skincare::where('cocok_untuk', 'like', "%{$skinType}%")->get();

        // Kirim hasil skor, tipe kulit, dan produk ke view
        return view('result', compact('score', 'skinType', 'products'));
    }
}
