@extends('layouts.member')
@section('title', 'Presidential Ocean Suite - Detail Akomodasi - Noona Rei')

@section('content')
<div class="space-y-10" x-data="{
    activeImage: 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1200&q=80',
    activeTab: 'overview'
}">

    <!-- Header & Tombol Kembali -->
    <div class="flex items-center justify-between gap-6 flex-wrap">
        <div>
            <span class="text-gold text-xs uppercase tracking-widest font-semibold">Eksklusif Sabang, Aceh</span>
            <h1 class="text-4xl font-serif font-bold text-stone-900 mt-1">Presidential Ocean Suite</h1>
            <p class="text-stone-500 text-sm mt-1 max-w-2xl">Rasakan kemewahan tiada tara dengan pemandangan langsung menghadap Samudra Hindia.</p>
        </div>
        <a href="{{ route('member.akomodasi') }}" class="px-5 py-2.5 bg-stone-200 hover:bg-stone-300 text-stone-800 font-semibold rounded-xl text-sm transition duration-200 flex-shrink-0">
            ← Kembali ke Daftar
        </a>
    </div>

    <!-- Main Content Grid: Gallery Foto & Info Harga -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">

        <!-- Kolom Kiri: Gallery Foto (Pasti Nampil & Bervariasi) -->
        <div class="xl:col-span-2 space-y-4">
            <!-- Big Image Preview -->
            <div class="w-full h-[400px] rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-stone-200">
                <img :src="activeImage" alt="Presidential Ocean Suite" class="w-full h-full object-cover transition-all duration-500 ease-in-out">
            </div>

            <!-- Thumbnails (Beda-beda sudut ruangan) -->
            <div class="grid grid-cols-4 gap-4 pt-2">
                <template x-for="img in [
                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=1200&q=80',
                    'https://images.unsplash.com/photo-1618773928121-c32242e63f39?auto=format&fit=crop&w=1200&q=80'
                ]" :key="img">
                    <div class="h-24 rounded-xl overflow-hidden cursor-pointer border-4 transition duration-200 bg-stone-200 shadow-sm"
                         @click="activeImage = img"
                         :class="activeImage === img ? 'border-gold shadow-md scale-95' : 'border-stone-200 hover:border-gold/50'">
                        <img :src="img" alt="Thumbnail Suite" class="w-full h-full object-cover">
                    </div>
                </template>
            </div>
        </div>

        <!-- Kolom Kanan: Info Harga & Tombol Pesan -->
        <div class="space-y-6">
            <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-xl sticky top-28">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <p class="text-xs text-stone-500 uppercase tracking-wider">Tarif Per Malam</p>
                        <p class="text-3xl font-serif font-bold text-gold">IDR 1.500.000</p>
                    </div>
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full border border-emerald-200">Tersedia</span>
                </div>

                <div class="space-y-4 text-sm text-stone-600 mb-8">
                    <p class="flex items-center gap-3">🏠 Luas: 85m²</p>
                    <p class="flex items-center gap-3">🛏️ Kapasitas: 3 Dewasa / 2 Anak</p>
                    <p class="flex items-center gap-3">🌊 View: Samudra Hindia</p>
                </div>

                <a href="{{ route('member.booking') }}" class="block text-center w-full py-4 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-2xl text-base transition duration-300 shadow-lg shadow-gold/30">
                    Pesan Kamar Sekarang
                </a>
                <p class="text-center text-xs text-stone-400 mt-3">Konfirmasi instan, aman & terpercaya.</p>
            </div>
        </div>
    </div>

    <!-- Bagian Bawah: Tab Interaktif -->
    <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm mt-10">
        <div class="border-b border-stone-200 flex space-x-10 font-medium text-stone-500">
            <button @click="activeTab = 'overview'"
                    class="pb-4 border-b-2 transition-colors duration-300"
                    :class="activeTab === 'overview' ? 'border-gold text-stone-900' : 'border-transparent hover:text-stone-700'">
                Overview & Fasilitas
            </button>
            <button @click="activeTab = 'reviews'"
                    class="pb-4 border-b-2 transition-colors duration-300"
                    :class="activeTab === 'reviews' ? 'border-gold text-stone-900' : 'border-transparent hover:text-stone-700'">
                Ulasan Pengunjung
            </button>
        </div>

        <div class="pt-8 text-sm text-stone-600 leading-relaxed space-y-6">
            <!-- Overview -->
            <div x-show="activeTab === 'overview'" class="space-y-6">
                <h3 class="font-serif font-bold text-2xl text-stone-900">Kemewahan di Ujung Barat Indonesia</h3>
                <p>
                    Nikmati pengalaman menginap tak terlupakan di Presidential Ocean Suite Noona Rei Resort. Dirancang untuk kenyamanan maksimal, suite ini menawarkan perpaduan elegan antara desain modern tropis dan pemandangan laut yang menakjubkan di Sabang, Aceh.
                </p>
                <h4 class="font-bold text-stone-900 text-lg pt-2">Fasilitas Unggulan:</h4>
                <ul class="grid grid-cols-2 md:grid-cols-3 gap-x-6 gap-y-3 list-inside list-disc">
                    <li>Kolam Renang Privat</li>
                    <li>Balkon Luas View Laut</li>
                    <li>Tempat Tidur King-Size</li>
                    <li>Kamar Mandi Marmer</li>
                    <li>Bathtub Spa & Shower</li>
                    <li>Minibar Gratis (Daily)</li>
                </ul>
            </div>

            <!-- Ulasan -->
            <div x-show="activeTab === 'reviews'" class="space-y-6">
                <p class="text-xs text-stone-500">Silakan berikan ulasan Anda setelah menyelesaikan masa menginap (checkout).</p>
                <div class="p-6 bg-stone-50 rounded-2xl border border-stone-200 space-y-3">
                    <h4 class="font-bold text-stone-900">Tulis Ulasan Baru</h4>
                    <textarea rows="3" placeholder="Tulis komentar ulasan Anda..." class="w-full p-3 border border-stone-200 rounded-xl text-xs bg-white focus:outline-none focus:border-gold"></textarea>
                    <button class="px-5 py-2 bg-gold text-stone-950 font-bold rounded-xl text-xs">Kirim Ulasan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
