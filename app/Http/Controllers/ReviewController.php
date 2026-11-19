<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Menyimpan ulasan (Hanya bisa jika user pernah booking / selesai checkout)
    public function store(Request $request)
    {
        $request->validate([
            'room_type' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Validasi: Cek apakah user sudah pernah memesan kamar tersebut dan statusnya confirmed/selesai
        $hasCompletedBooking = Booking::where('user_id', Auth::id())
            ->where('room_type', $request->room_type)
            ->where('payment_status', 'paid')
            ->exists();

        if (!$hasCompletedBooking) {
            return back()->withErrors(['error' => 'Anda hanya dapat memberikan ulasan setelah menyelesaikan pemesanan dan pembayaran kamar ini.']);
        }

        Review::create([
            'user_id' => Auth::id(),
            'room_type' => $request->room_type,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Ulasan Anda berhasil dipublikasikan pada halaman detail akomodasi.');
    }
}
