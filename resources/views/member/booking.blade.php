@extends('layouts.member')
@section('title', 'Pesanan Saya - Noona Rei Hotel & Resort')
@section('content')
<div class="space-y-6">
    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Manajemen Pemesanan</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Riwayat Reservasi</h1>
        <p class="text-stone-500 text-sm mt-1">Daftar seluruh pesanan kamar dan resort mewah yang pernah Anda buat.</p>
    </div>

    <div class="space-y-4">
        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-6 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start space-x-4">
                <div class="w-16 h-16 rounded-xl bg-forest-dark text-gold font-serif font-bold flex items-center justify-center text-xl flex-shrink-0">NR</div>
                <div class="space-y-1">
                    <div class="flex items-center space-x-3">
                        <h3 class="font-bold text-stone-900 text-base">Presidential Ocean Suite</h3>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Confirmed</span>
                    </div>
                    <p class="text-xs text-stone-500">Kode Booking: <span class="font-mono font-semibold text-stone-700">NR-89234100</span></p>
                    <p class="text-xs text-stone-500">Check-in: 25 Des 2026 | Check-out: 28 Des 2026 (3 Malam)</p>
                </div>
            </div>
            <div class="flex items-center justify-between md:justify-end md:space-x-6 border-t md:border-t-0 pt-4 md:pt-0 border-stone-100">
                <div class="text-left md:text-right">
                    <p class="text-xs text-stone-400">Total Harga</p>
                    <p class="text-base font-bold text-stone-900">IDR 4.500.000</p>
                </div>
                <a href="{{ route('member.payment') }}" class="px-4 py-2 bg-stone-100 hover:bg-stone-200 text-stone-700 text-xs font-semibold rounded-xl transition">Pembayaran</a>
            </div>
        </div>
    </div>
</div>
@endsection
