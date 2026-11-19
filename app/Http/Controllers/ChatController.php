<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Menampilkan halaman chat dengan data dari database
    public function index()
    {
        // Mengambil semua riwayat pesan milik user yang sedang login
        $chats = Chat::where('user_id', Auth::id())->orderBy('created_at', 'asc')->get();

        return view('member.chat', compact('chats'));
    }

    // Menyimpan pesan baru yang dikirim user ke database
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Chat::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->route('member.chat');
    }
}
