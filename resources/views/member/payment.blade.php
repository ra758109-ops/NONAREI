@extends('layouts.member')
@section('title', 'NoonaPay Gateway - Pembayaran Instan')

@section('content')
<div class="max-w-xl mx-auto space-y-6" x-data="{ method: 'qris', processing: false }">
    <div class="bg-forest-dark text-white p-6 rounded-3xl border border-stone-800 shadow-xl flex justify-between items-center">
        <div>
            <span class="text-[10px] uppercase tracking-widest text-gold font-bold">NoonaPay Secure Gateway</span>
            <h1 class="text-xl font-serif font-bold mt-0.5">Selesaikan Pembayaran</h1>
        </div>
        <div class="text-right">
            <span class="text-[10px] text-stone-400 block">Total Tagihan</span>
            <span class="text-xl font-serif font-bold text-gold">IDR 1.500.000</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm space-y-5">
        <p class="text-xs font-bold uppercase tracking-wider text-stone-500">Pilih Metode Pembayaran Instan</p>

        <div class="grid grid-cols-3 gap-3 text-xs font-semibold">
            <button type="button" @click="method = 'qris'" :class="method === 'qris' ? 'border-gold bg-amber-50/50 text-stone-900' : 'border-stone-200 text-stone-500'" class="p-3 rounded-xl border-2 text-center transition">QRIS Instan</button>
            <button type="button" @click="method = 'va'" :class="method === 'va' ? 'border-gold bg-amber-50/50 text-stone-900' : 'border-stone-200 text-stone-500'" class="p-3 rounded-xl border-2 text-center transition">Virtual Account</button>
            <button type="button" @click="method = 'ewallet'" :class="method === 'ewallet' ? 'border-gold bg-amber-50/50 text-stone-900' : 'border-stone-200 text-stone-500'" class="p-3 rounded-xl border-2 text-center transition">GoPay / DANA</button>
        </div>

        <!-- Detail Metode -->
        <div class="p-5 bg-stone-50 rounded-2xl border border-stone-200 text-center space-y-2">
            <div x-show="method === 'qris'">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=NOONA-REI-HOTEL-RESORT-SABANG-1500000"
                     alt="QRIS Noona Rei"
                     class="w-36 h-36 mx-auto bg-white p-2 rounded-xl border border-stone-300 shadow-sm object-contain">
                <p class="text-xs text-stone-500 mt-2">Scan menggunakan aplikasi m-Banking atau E-Wallet Anda.</p>
            </div>
            <div x-show="method === 'va'" class="py-4 space-y-1">
                <span class="text-xs text-stone-500">BCA Virtual Account</span>
                <p class="text-lg font-mono font-bold text-stone-900 tracking-widest">8830 0812 6406 6128</p>
            </div>
            <div x-show="method === 'ewallet'" class="py-4 space-y-1">
                <span class="text-xs text-stone-500">Nomor Pembayaran E-Wallet</span>
                <p class="text-lg font-mono font-bold text-stone-900">0812-6406-6128 (Noona Rei)</p>
            </div>
        </div>

        <form action="{{ route('member.payment.process') }}" method="POST" @submit="processing = true">
            @csrf
            <button type="submit" :disabled="processing" class="w-full py-3.5 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-sm transition shadow-lg">
                <span x-show="!processing">Simulasikan Pembayaran Berhasil →</span>
                <span x-show="processing">Memverifikasi Transaksi...</span>
            </button>
        </form>
    </div>
</div>
@endsection
