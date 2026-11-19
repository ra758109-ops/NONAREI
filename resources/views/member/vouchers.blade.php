@extends('layouts.member')
@section('title', 'Promo & Voucher VIP - Noona Rei Hotel & Resort')

@section('content')
<div class="space-y-8"
     x-data="{ show: false, copiedCode: '' }"
     x-init="setTimeout(() => show = true, 50)"
     class="transition-all duration-700 ease-out transform"
     :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">

    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Eksklusif Member VIP</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Promo & Voucher Resort</h1>
        <p class="text-stone-500 text-sm mt-1">Gunakan kupon diskon khusus untuk reservasi kamar dan fasilitas spa Anda berikutnya.</p>
    </div>

    <!-- Alert Sukses Salin -->
    <div x-show="copiedCode" x-transition class="p-4 bg-emerald-950/80 border border-emerald-800 text-emerald-200 rounded-2xl text-xs">
        Voucher berhasil disalin: <strong class="underline" x-text="copiedCode"></strong>
    </div>

    <!-- Grid Voucher -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Voucher 1 -->
        <div class="bg-forest-dark text-white p-6 rounded-3xl border border-stone-800 shadow-xl relative overflow-hidden flex flex-col justify-between group hover:-translate-y-1 transition duration-300">
            <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-gold/10 rounded-full blur-2xl"></div>
            <div class="space-y-3 relative z-10">
                <span class="px-3 py-1 bg-gold/20 text-gold text-[10px] font-bold uppercase tracking-wider rounded-md border border-gold/30">Diskon Menginap</span>
                <h3 class="font-serif font-bold text-2xl text-gold">Potongan 25%</h3>
                <p class="text-xs text-stone-300">Berlaku untuk semua tipe suite dan villa di Noona Rei Resort Sabang.</p>
            </div>
            <div class="pt-6 border-t border-stone-800 flex items-center justify-between relative z-10">
                <code class="text-xs font-mono font-bold text-gold tracking-widest bg-stone-900 px-3 py-1.5 rounded-lg border border-stone-800">NOONAREI25</code>
                <button @click="navigator.clipboard.writeText('NOONAREI25'); copiedCode = 'NOONAREI25'" class="px-3 py-1.5 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-lg text-xs transition">Salin</button>
            </div>
        </div>

        <!-- Voucher 2 -->
        <div class="bg-forest-dark text-white p-6 rounded-3xl border border-stone-800 shadow-xl relative overflow-hidden flex flex-col justify-between group hover:-translate-y-1 transition duration-300">
            <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-gold/10 rounded-full blur-2xl"></div>
            <div class="space-y-3 relative z-10">
                <span class="px-3 py-1 bg-gold/20 text-gold text-[10px] font-bold uppercase tracking-wider rounded-md border border-gold/30">Spa & Wellness</span>
                <h3 class="font-serif font-bold text-2xl text-gold">Free Spa Voucher</h3>
                <p class="text-xs text-stone-300">Gratis sesi aromaterapi tradisional khusus member VIP Gold.</p>
            </div>
            <div class="pt-6 border-t border-stone-800 flex items-center justify-between relative z-10">
                <code class="text-xs font-mono font-bold text-gold tracking-widest bg-stone-900 px-3 py-1.5 rounded-lg border border-stone-800">SPARESORTVIP</code>
                <button @click="navigator.clipboard.writeText('SPARESORTVIP'); copiedCode = 'SPARESORTVIP'" class="px-3 py-1.5 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-lg text-xs transition">Salin</button>
            </div>
        </div>

        <!-- Voucher 3 -->
        <div class="bg-forest-dark text-white p-6 rounded-3xl border border-stone-800 shadow-xl relative overflow-hidden flex flex-col justify-between group hover:-translate-y-1 transition duration-300">
            <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-gold/10 rounded-full blur-2xl"></div>
            <div class="space-y-3 relative z-10">
                <span class="px-3 py-1 bg-gold/20 text-gold text-[10px] font-bold uppercase tracking-wider rounded-md border border-gold/30">Kuliner Pesisir</span>
                <h3 class="font-serif font-bold text-2xl text-gold">Dining Pass 15%</h3>
                <p class="text-xs text-stone-300">Diskon spesial untuk seluruh menu seafood di restoran utama resort.</p>
            </div>
            <div class="pt-6 border-t border-stone-800 flex items-center justify-between relative z-10">
                <code class="text-xs font-mono font-bold text-gold tracking-widest bg-stone-900 px-3 py-1.5 rounded-lg border border-stone-800">RESETOFSEA</code>
                <button @click="navigator.clipboard.writeText('RESETOFSEA'); copiedCode = 'RESETOFSEA'" class="px-3 py-1.5 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-lg text-xs transition">Salin</button>
            </div>
        </div>

    </div>
</div>
@endsection
