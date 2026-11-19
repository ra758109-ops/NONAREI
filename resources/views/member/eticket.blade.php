@extends('layouts.member')
@section('title', 'E-Tiket Digital - Noona Rei Hotel & Resort')

@section('content')
<div class="space-y-8 max-w-3xl mx-auto"
     x-data="{ show: false }"
     x-init="setTimeout(() => show = true, 50)"
     class="transition-all duration-700 ease-out transform"
     :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">

    <div class="flex justify-between items-center">
        <div>
            <span class="text-gold text-xs uppercase tracking-widest font-semibold">Pass Masuk Resmi</span>
            <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">E-Tiket Digital Resor</h1>
            <p class="text-stone-500 text-sm mt-1">Tunjukkan tiket digital ini kepada resepsionis saat melakukan check-in di lokasi.</p>
        </div>
        <button onclick="window.print()" class="px-5 py-2.5 bg-stone-200 hover:bg-stone-300 text-stone-800 text-xs font-semibold rounded-xl transition">
            🖨️ Cetak / Unduh
        </button>
    </div>

    <!-- Desain Kartu E-Tiket -->
    <div class="bg-forest-dark text-white rounded-3xl border border-stone-800 shadow-2xl overflow-hidden relative">
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-gold/10 rounded-full blur-3xl"></div>

        <div class="p-8 border-b border-stone-800 flex justify-between items-center relative z-10">
            <div>
                <span class="text-xs uppercase tracking-widest text-gold font-bold">Noona Rei Hotel & Resort</span>
                <h2 class="text-2xl font-serif font-bold mt-1">Presidential Ocean Suite</h2>
            </div>
            <span class="px-4 py-1.5 bg-emerald-500/20 text-emerald-300 text-xs font-bold rounded-full border border-emerald-500/30">Lunas / Terverifikasi</span>
        </div>

        <div class="p-8 grid grid-cols-2 md:grid-cols-4 gap-6 relative z-10 text-xs">
            <div>
                <span class="text-stone-400 block uppercase tracking-wider">Nama Tamu VIP</span>
                <strong class="text-sm font-serif text-white">{{ Auth::user()->name }}</strong>
            </div>
            <div>
                <span class="text-stone-400 block uppercase tracking-wider">Kode Booking</span>
                <strong class="text-sm font-mono text-gold">NR-89234100</strong>
            </div>
            <div>
                <span class="text-stone-400 block uppercase tracking-wider">Check-In</span>
                <strong class="text-sm text-white">25 Des 2026</strong>
            </div>
            <div>
                <span class="text-stone-400 block uppercase tracking-wider">Check-Out</span>
                <strong class="text-sm text-white">28 Des 2026</strong>
            </div>
        </div>

        <div class="p-6 bg-stone-900/80 border-t border-stone-800 flex justify-between items-center text-xs text-stone-400 relative z-10">
            <span>📍 Lokasi: Kawasan Pesisir Sabang, Pulau Weh, Aceh</span>
            <span class="font-mono text-gold font-bold">||| | |||| || | |||||</span>
        </div>
    </div>
</div>
@endsection
