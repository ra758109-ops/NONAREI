@extends('layouts.member')
@section('title', 'Ulasan Pengunjung - Noona Rei Hotel & Resort')
@section('content')
<div class="space-y-6">
    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Testimoni</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Ulasan Pengunjung</h1>
        <p class="text-stone-500 text-sm mt-1">Bagikan pengalaman menginap mewah Anda di Noona Rei Hotel & Resort.</p>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-4 max-w-xl">
        <h3 class="font-serif font-bold text-stone-900 text-lg">Tulis Ulasan Anda</h3>
        <textarea rows="4" placeholder="Ceritakan pengalaman menginap Anda..." class="w-full p-4 border border-stone-200 rounded-2xl text-sm focus:outline-none focus:border-gold bg-stone-50"></textarea>
        <button class="px-6 py-3 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-xs transition shadow-sm">Kirim Ulasan</button>
    </div>
</div>
@endsection
