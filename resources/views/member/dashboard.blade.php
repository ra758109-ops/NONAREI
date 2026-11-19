@extends('layouts.member')
@section('title', 'Dashboard Member - Noona Rei Hotel & Resort')

@section('content')
<!-- Wrapper dengan animasi Alpine.js saat halaman dimuat (fade-in & slide-up) -->
<div class="space-y-8"
     x-data="{ showWelcome: false }"
     x-init="setTimeout(() => showWelcome = true, 100)"
     class="transition-all duration-700 ease-out transform"
     :class="showWelcome ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">

    <!-- Header Selamat Datang dengan Efek Animasi Halus -->
    <div class="bg-forest-dark text-white p-8 md:p-10 rounded-3xl relative overflow-hidden shadow-2xl border border-stone-800">
        <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-gold/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#9c7c47_1px,transparent_1px)] [background-size:20px_20px] opacity-10 pointer-events-none"></div>

        <div class="relative z-10 space-y-3 max-w-2xl">
            <span class="text-gold text-xs uppercase tracking-widest font-semibold px-3 py-1 bg-stone-900/80 rounded-full border border-stone-800">
                Member Area VIP • Sabang, Aceh
            </span>
            <h1 class="text-3xl md:text-4xl font-serif font-bold tracking-wide">
                Selamat Datang Kembali, <span class="text-gold">{{ Auth::user()->name ?? 'Raihan' }}</span>!
            </h1>
            <p class="text-stone-300 text-sm leading-relaxed">
                Nikmati kenyamanan dan kemewahan eksklusif di ujung barat Indonesia. Kelola reservasi kamar, cek voucher VIP, dan hubungi resepsionis kami kapan saja.
            </p>
        </div>

        <div class="mt-8 flex flex-wrap gap-4 relative z-10">
            <a href="{{ route('member.akomodasi') }}" class="px-6 py-3.5 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-xs transition duration-300 shadow-lg shadow-gold/20 transform hover:-translate-y-0.5">
                Jelajahi Akomodasi
            </a>
            <a href="{{ route('member.booking') }}" class="px-6 py-3.5 bg-stone-800 hover:bg-stone-700 text-stone-100 font-semibold rounded-xl text-xs transition duration-300 border border-stone-700">
                Lihat Pesanan Saya
            </a>
        </div>
    </div>

    <!-- Statistik Interaktif (Efek Hover Halus) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2 group">
            <div class="flex justify-between items-center text-stone-400 group-hover:text-gold transition">
                <span class="text-xs uppercase tracking-wider font-semibold">Status Keanggotaan</span>
                <span class="text-xl">👑</span>
            </div>
            <p class="text-2xl font-serif font-bold text-stone-900">VIP Gold</p>
            <p class="text-xs text-stone-500">ID: NR-VIP-2026-009</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2 group">
            <div class="flex justify-between items-center text-stone-400 group-hover:text-gold transition">
                <span class="text-xs uppercase tracking-wider font-semibold">Total Reservasi</span>
                <span class="text-xl">🧳</span>
            </div>
            <p class="text-2xl font-serif font-bold text-stone-900">
                {{ \App\Models\Booking::where('user_id', Auth::id())->count() }} Kamar
            </p>
            <p class="text-xs text-stone-500">Aktif & Riwayat Menginap</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 space-y-2 group">
            <div class="flex justify-between items-center text-stone-400 group-hover:text-gold transition">
                <span class="text-xs uppercase tracking-wider font-semibold">Voucher Tersedia</span>
                <span class="text-xl">🎟️</span>
            </div>
            <p class="text-2xl font-serif font-bold text-gold">3 Voucher</p>
            <p class="text-xs text-stone-500">Diskon Eksklusif Resort</p>
        </div>

    </div>

    <!-- Quick Access / Section Bawah -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Info Cepat Sabang -->
        <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-4">
            <span class="text-gold text-xs uppercase tracking-widest font-semibold">Destinasi Pilihan</span>
            <h3 class="font-serif font-bold text-xl text-stone-900">Noona Rei Hotel & Resort Sabang</h3>
            <p class="text-xs text-stone-600 leading-relaxed">
                Terletak di kawasan pesisir pantai tropis Pulau Weh, Sabang. Menyediakan fasilitas resor bintang lima dengan pemandangan matahari terbenam langsung dari kamar Anda.
            </p>
            <a href="{{ route('member.akomodasi') }}" class="inline-block text-xs font-bold text-gold hover:underline pt-2">
                Lihat Detail Kamar & Villa →
            </a>
        </div>

        <!-- Bantuan Resepsionis -->
        <div class="bg-forest-dark text-white p-8 rounded-3xl border border-stone-800 shadow-xl space-y-4 flex flex-col justify-between">
            <div class="space-y-3">
                <span class="text-gold text-xs uppercase tracking-widest font-semibold">Layanan 24 Jam</span>
                <h3 class="font-serif font-bold text-xl">Butuh Bantuan Resepsionis?</h3>
                <p class="text-xs text-stone-300 leading-relaxed">
                    Staf concierge dan layanan kamar kami siap melayani kebutuhan Anda kapan pun selama masa menginap.
                </p>
            </div>
            <a href="{{ route('member.chat') }}" class="inline-block text-center w-full py-3 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-xs transition shadow-md">
                Buka Live Chat Resepsionis
            </a>
        </div>

    </div>

</div>
@endsection
