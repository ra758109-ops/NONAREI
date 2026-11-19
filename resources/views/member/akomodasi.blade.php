@extends('layouts.member')
@section('title', 'Daftar Akomodasi - Noona Rei Hotel & Resort')

@section('content')
<div class="space-y-8"
     x-data="{
        search: '',
        filter: 'all',
        rooms: [
            {
                name: 'Presidential Ocean Suite',
                type: 'suite',
                price: 'IDR 1.500.000',
                rating: '4.9',
                desc: 'Pemandangan langsung menghadap Samudra Hindia dengan kolam renang privat mewah.',
                image: 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1000&q=80',
                detailUrl: '{{ route('member.detail') }}',
                bookingUrl: '{{ route('member.booking') }}'
            },
            {
                name: 'Deluxe Garden Villa',
                type: 'villa',
                price: 'IDR 950.000',
                rating: '4.8',
                desc: 'Suasana asri dikelilingi pepohonan tropis Sabang yang tenang, sejuk, dan sangat rileks.',
                image: 'https://images.unsplash.com/photo-1590490360182-c33d5773b927?auto=format&fit=crop&w=1000&q=80',
                detailUrl: '{{ route('member.detail') }}',
                bookingUrl: '{{ route('member.booking') }}'
            }
        ]
     }">

    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Eksklusif Sabang</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Daftar Akomodasi & Resort</h1>
        <p class="text-stone-500 text-sm mt-1">Pilih kamar atau villa impian Anda untuk pengalaman menginap tak terlupakan.</p>
    </div>

    <!-- Filter & Search Bar Dinamis -->
    <div class="bg-white p-4 rounded-2xl border border-stone-200 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
        <!-- Input Pencarian -->
        <input type="text" x-model="search" placeholder="Cari nama suite atau villa..."
               class="w-full md:w-96 px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">

        <!-- Tombol Filter Kategori -->
        <div class="flex gap-2 w-full md:w-auto">
            <button @click="filter = 'all'"
                    :class="filter === 'all' ? 'bg-forest-dark text-gold font-bold shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                    class="px-4 py-2 rounded-xl text-xs transition">
                Semua
            </button>
            <button @click="filter = 'suite'"
                    :class="filter === 'suite' ? 'bg-forest-dark text-gold font-bold shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                    class="px-4 py-2 rounded-xl text-xs transition">
                Suite
            </button>
            <button @click="filter = 'villa'"
                    :class="filter === 'villa' ? 'bg-forest-dark text-gold font-bold shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                    class="px-4 py-2 rounded-xl text-xs transition">
                Villa
            </button>
        </div>
    </div>

    <!-- List Kartu Akomodasi yang Bekerja Secara Real-time -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <template x-for="room in rooms.filter(r =>
            (filter === 'all' || r.type === filter) &&
            r.name.toLowerCase().includes(search.toLowerCase())
        )" :key="room.name">

            <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden flex flex-col justify-between group hover:shadow-xl transition duration-300">
                <div>
                    <div class="h-56 overflow-hidden relative bg-stone-200">
                        <img :src="room.image" :alt="room.name" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 right-4 px-3 py-1 bg-forest-dark/80 backdrop-blur text-gold text-xs font-bold rounded-full" x-text="'★ ' + room.rating"></span>
                    </div>
                    <div class="p-6 space-y-2">
                        <h3 class="font-serif font-bold text-xl text-stone-900" x-text="room.name"></h3>
                        <p class="text-xs text-stone-500 line-clamp-2" x-text="room.desc"></p>
                    </div>
                </div>
                <div class="p-6 pt-0 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] uppercase text-stone-400 block font-semibold">Tarif / Malam</span>
                        <span class="text-lg font-serif font-bold text-gold" x-text="room.price"></span>
                    </div>
                    <div class="flex gap-2">
                        <a :href="room.detailUrl" class="px-4 py-2 bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-semibold rounded-xl transition">Detail</a>
                        <a :href="room.bookingUrl" class="px-4 py-2 bg-gold hover:bg-gold-dark text-stone-950 text-xs font-bold rounded-xl transition shadow-sm">Pesan</a>
                    </div>
                </div>
            </div>

        </template>

    </div>

    <!-- Pesan Kosong Jika Pencarian Tidak Ditemukan -->
    <div x-show="rooms.filter(r => (filter === 'all' || r.type === filter) && r.name.toLowerCase().includes(search.toLowerCase())).length === 0"
         class="bg-white p-12 rounded-3xl border border-stone-200 text-center space-y-2">
        <p class="text-stone-400 text-sm">Maaf, akomodasi yang Anda cari tidak ditemukan.</p>
        <span class="text-xs text-gold font-semibold cursor-pointer underline" @click="search = ''; filter = 'all'">Reset Pencarian</span>
    </div>

</div>
@endsection
