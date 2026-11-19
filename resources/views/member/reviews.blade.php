@extends('layouts.member')
@section('title', 'Ulasan Tamu - Noona Rei Hotel & Resort')

@section('content')
<div class="space-y-8"
     x-data="{ show: false }"
     x-init="setTimeout(() => show = true, 50)"
     class="transition-all duration-700 ease-out transform"
     :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">

    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Testimoni Pengunjung</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Ulasan & Penilaian Resor</h1>
        <p class="text-stone-500 text-sm mt-1">Lihat pengalaman nyata dari para tamu VIP yang telah menginap di Noona Rei Sabang.</p>
    </div>

    <!-- Grid Ulasan Global -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-4 hover:shadow-md transition">
            <div class="flex justify-between items-center">
                <span class="font-bold text-stone-900">Dr. Teuku Farhan</span>
                <span class="text-xs text-gold font-bold">★ 5.0 / 5.0</span>
            </div>
            <p class="text-xs text-stone-400">Presidential Ocean Suite — Menginap November 2026</p>
            <p class="text-sm text-stone-600 leading-relaxed">"Suasana pantai Sabang yang sangat tenang berpadu sempurna dengan kemewahan interior kamar. Pelayanan staf sangat profesional!"</p>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-4 hover:shadow-md transition">
            <div class="flex justify-between items-center">
                <span class="font-bold text-stone-900">Cut Mutia Sari</span>
                <span class="text-xs text-gold font-bold">★ 4.9 / 5.0</span>
            </div>
            <p class="text-xs text-stone-400">Deluxe Garden Villa — Menginap Oktober 2026</p>
            <p class="text-sm text-stone-600 leading-relaxed">"Tempat terbaik untuk melepas penat dari kesibukan kota. Taman tropisnya asri dan makanan di restorannya luar biasa enak."</p>
        </div>

    </div>
</div>
@endsection
