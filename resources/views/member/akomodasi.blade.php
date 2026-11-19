@extends('layouts.member')
@section('title', 'Daftar Akomodasi - Noona Rei Hotel & Resort')

@section('content')
<div class="space-y-8"
     x-data="{
        search: '',
        filter: 'all',
        showModal: false,
        selectedRoom: { name: '', priceNum: 0, priceText: '', type: '' },
        checkIn: '{{ date('Y-m-d') }}',
        checkOut: '{{ date('Y-m-d', strtotime('+1 day')) }}',
        guests: 2,
        rooms: [
            {
                name: 'Presidential Ocean Suite',
                type: 'suite',
                priceNum: 1500000,
                priceText: 'IDR 1.500.000',
                rating: '4.9',
                desc: 'Pemandangan langsung menghadap Samudra Hindia dengan kolam renang privat mewah.',
                image: 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1000&q=80',
                detailUrl: '{{ route('member.detail') }}'
            },
            {
                name: 'Deluxe Garden Villa',
                type: 'villa',
                priceNum: 950000,
                priceText: 'IDR 950.000',
                rating: '4.8',
                desc: 'Suasana asri dikelilingi pepohonan tropis Sabang yang tenang, sejuk, dan sangat rileks.',
                image: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1000&q=80',
                detailUrl: '{{ route('member.detail') }}'
            }
        ],
        openBooking(room) {
            this.selectedRoom = room;
            this.showModal = true;
        },
        get nights() {
            if (!this.checkIn || !this.checkOut) return 1;
            const start = new Date(this.checkIn);
            const end = new Date(this.checkOut);
            const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
            return diff > 0 ? diff : 1;
        },
        get totalPrice() {
            return this.nights * this.selectedRoom.priceNum;
        },
        formatRupiah(num) {
            return 'IDR ' + Number(num || 0).toLocaleString('id-ID');
        }
     }">

    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Eksklusif Sabang</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Daftar Akomodasi & Resort</h1>
        <p class="text-stone-500 text-sm mt-1">Pilih kamar atau villa impian Anda untuk pengalaman menginap tak terlupakan.</p>
    </div>

    <!-- Filter & Search Bar Dinamis -->
    <div class="bg-white p-4 rounded-2xl border border-stone-200 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
        <input type="text" x-model="search" placeholder="Cari nama suite atau villa..."
               class="w-full md:w-96 px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">

        <div class="flex gap-2 w-full md:w-auto">
            <button type="button" @click="filter = 'all'"
                    :class="filter === 'all' ? 'bg-forest-dark text-gold font-bold shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                    class="px-4 py-2 rounded-xl text-xs transition">
                Semua
            </button>
            <button type="button" @click="filter = 'suite'"
                    :class="filter === 'suite' ? 'bg-forest-dark text-gold font-bold shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                    class="px-4 py-2 rounded-xl text-xs transition">
                Suite
            </button>
            <button type="button" @click="filter = 'villa'"
                    :class="filter === 'villa' ? 'bg-forest-dark text-gold font-bold shadow-sm' : 'bg-stone-100 text-stone-600 hover:bg-stone-200'"
                    class="px-4 py-2 rounded-xl text-xs transition">
                Villa
            </button>
        </div>
    </div>

    <!-- List Kartu Akomodasi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <template x-for="room in rooms.filter(r =>
            (filter === 'all' || r.type === filter) &&
            r.name.toLowerCase().includes(search.toLowerCase())
        )" :key="room.name">

            <div class="bg-white rounded-3xl border border-stone-200 shadow-sm overflow-hidden flex flex-col justify-between group hover:shadow-lg transition duration-300">
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
                        <span class="text-lg font-serif font-bold text-gold" x-text="room.priceText"></span>
                    </div>
                    <div class="flex gap-2">
                        <a :href="room.detailUrl" class="px-4 py-2 bg-stone-100 hover:bg-stone-200 text-stone-800 text-xs font-semibold rounded-xl transition">Detail</a>
                        <button type="button" @click="openBooking(room)" class="px-4 py-2 bg-gold hover:bg-gold-dark text-stone-950 text-xs font-bold rounded-xl transition shadow-sm">
                            Pesan
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Pesan Kosong Jika Tidak Ditemukan -->
    <div x-show="rooms.filter(r => (filter === 'all' || r.type === filter) && r.name.toLowerCase().includes(search.toLowerCase())).length === 0"
         class="bg-white p-12 rounded-3xl border border-stone-200 text-center space-y-2">
        <p class="text-stone-400 text-sm">Maaf, akomodasi yang Anda cari tidak ditemukan.</p>
        <button type="button" class="text-xs text-gold font-semibold cursor-pointer underline" @click="search = ''; filter = 'all'">Reset Pencarian</button>
    </div>

    <!-- Modal Form Pemesanan Kamar -->
    <div x-show="showModal"
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-stone-950/70 backdrop-blur-xs p-4">
        <div @click.outside="showModal = false" class="bg-white w-full max-w-lg rounded-3xl border border-stone-200 shadow-2xl overflow-hidden">
            <div class="bg-forest-dark text-white px-6 py-5 flex items-center justify-between border-b border-stone-800">
                <div>
                    <span class="text-[10px] uppercase tracking-widest text-gold font-bold">Form Reservasi Kamar</span>
                    <h3 class="font-serif font-bold text-xl mt-0.5" x-text="selectedRoom.name"></h3>
                </div>
                <button type="button" @click="showModal = false" class="text-stone-400 hover:text-white text-lg font-bold px-2">✕</button>
            </div>

            <form action="{{ route('member.booking.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="room_type" :value="selectedRoom.name">
                <input type="hidden" name="nights" :value="nights">
                <input type="hidden" name="total_price" :value="totalPrice">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Tanggal Check-In</label>
                        <input type="date" name="check_in" x-model="checkIn" required class="w-full px-3.5 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Tanggal Check-Out</label>
                        <input type="date" name="check_out" x-model="checkOut" :min="checkIn" required class="w-full px-3.5 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Jumlah Tamu</label>
                    <input type="number" name="guests" x-model="guests" min="1" max="10" required class="w-full px-3.5 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
                </div>

                <div class="p-4 bg-stone-50 rounded-2xl border border-stone-200 flex items-center justify-between">
                    <div>
                        <span class="text-xs text-stone-500 block">Durasi Menginap</span>
                        <strong class="text-sm text-stone-800" x-text="nights + ' Malam (' + selectedRoom.priceText + ' / malam)'"></strong>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] uppercase text-stone-400 block font-semibold">Estimasi Total</span>
                        <span class="text-lg font-serif font-bold text-gold" x-text="formatRupiah(totalPrice)"></span>
                    </div>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" @click="showModal = false" class="w-1/3 py-3 bg-stone-100 hover:bg-stone-200 text-stone-700 font-semibold rounded-xl text-xs transition">
                        Batal
                    </button>
                    <button type="submit" class="w-2/3 py-3 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-xs transition shadow-md">
                        Konfirmasi & Simpan Pesanan →
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
