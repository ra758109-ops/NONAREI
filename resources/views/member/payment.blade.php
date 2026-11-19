@extends('layouts.member')
@section('title', 'Pembayaran - Noona Rei Hotel & Resort')
@section('content')
<div class="space-y-6">
    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Checkout Transaksi</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Konfirmasi Pembayaran</h1>
        <p class="text-stone-500 text-sm mt-1">Selesaikan pembayaran reservasi kamar Anda melalui metode pilihan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-4">
            <h3 class="font-serif font-bold text-lg text-stone-900">Pilih Metode Pembayaran</h3>
            <div class="space-y-3">
                <label class="flex items-center justify-between p-4 border border-stone-200 rounded-2xl cursor-pointer hover:border-gold transition">
                    <div class="flex items-center space-x-3">
                        <input type="radio" name="payment" checked class="text-gold focus:ring-gold">
                        <span class="text-sm font-semibold text-stone-800">Transfer Bank (BSI / BCA)</span>
                    </div>
                    <span class="text-xs text-gold font-bold">Virtual Account</span>
                </label>
                <label class="flex items-center justify-between p-4 border border-stone-200 rounded-2xl cursor-pointer hover:border-gold transition">
                    <div class="flex items-center space-x-3">
                        <input type="radio" name="payment" class="text-gold focus:ring-gold">
                        <span class="text-sm font-semibold text-stone-800">QRIS Instant Payment</span>
                    </div>
                    <span class="text-xs text-gold font-bold">Auto Confirm</span>
                </label>
            </div>
        </div>

        <div class="bg-forest-dark text-white p-6 rounded-3xl shadow-xl space-y-4 border border-stone-800 flex flex-col justify-between">
            <div class="space-y-3">
                <h3 class="font-serif font-bold text-lg text-gold">Ringkasan Tagihan</h3>
                <div class="space-y-2 text-xs text-stone-300 border-b border-stone-800 pb-4">
                    <p class="flex justify-between"><span>Presidential Ocean Suite (3 Malam)</span> <span class="text-white">IDR 4.500.000</span></p>
                    <p class="flex justify-between"><span>Biaya Layanan Resort</span> <span class="text-white">Gratis (VIP)</span></p>
                </div>
                <div class="flex justify-between text-base font-bold text-white pt-2">
                    <span>Total Pembayaran</span>
                    <span class="text-gold font-serif">IDR 4.500.000</span>
                </div>
            </div>
            <a href="{{ route('member.eticket') }}" class="block text-center w-full py-3.5 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-sm transition shadow-lg">
                Bayar Sekarang & Ambil E-Tiket
            </a>
        </div>
    </div>
</div>
@endsection
