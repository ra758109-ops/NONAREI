@extends('layouts.member')
@section('title', 'Pesanan Saya - Noona Rei Hotel & Resort')

@section('content')
<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <span class="text-gold text-xs uppercase tracking-widest font-semibold">Manajemen Pemesanan</span>
            <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Riwayat Reservasi</h1>
            <p class="text-stone-500 text-sm mt-1">Daftar seluruh pesanan kamar dan resort mewah yang pernah Anda buat.</p>
        </div>
        <a href="{{ route('member.akomodasi') }}" class="px-5 py-2.5 bg-forest-dark hover:bg-forest text-gold text-xs font-bold rounded-xl transition shadow-sm text-center">
            + Buat Reservasi Baru
        </a>
    </div>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-xs font-semibold flex items-center justify-between">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Daftar Pesanan Dinamis dari Database -->
    <div class="space-y-4">
        @forelse($bookings as $booking)
            <div class="bg-white p-6 rounded-3xl border border-stone-200 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6 hover:shadow-md transition">
                <div class="flex items-start sm:items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl bg-forest-dark text-gold font-serif font-bold flex items-center justify-center text-lg flex-shrink-0 shadow-inner">
                        NR
                    </div>
                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2.5">
                            <h3 class="font-serif font-bold text-lg text-stone-900">{{ $booking->room_type }}</h3>
                            @if($booking->payment_status === 'paid')
                                <span class="px-3 py-0.5 bg-emerald-100 text-emerald-700 text-[11px] font-bold rounded-full">Paid / Confirmed</span>
                            @else
                                <span class="px-3 py-0.5 bg-amber-100 text-amber-700 text-[11px] font-bold rounded-full">Pending Payment</span>
                            @endif
                        </div>
                        <p class="text-xs text-stone-500">
                            Kode Booking: <strong class="font-mono text-stone-800">{{ $booking->booking_code }}</strong>
                        </p>
                        <p class="text-xs text-stone-400">
                            Check-in: {{ \Carbon\Carbon::parse($booking->check_in)->translatedFormat('d M Y') }} |
                            Check-out: {{ \Carbon\Carbon::parse($booking->check_out)->translatedFormat('d M Y') }}
                            ({{ $booking->nights ?? 1 }} Malam)
                        </p>
                    </div>
                </div>

                <div class="flex items-center justify-between md:justify-end gap-6 pt-4 md:pt-0 border-t md:border-t-0 border-stone-100">
                    <div class="md:text-right">
                        <span class="text-[11px] text-stone-400 block">Total Harga</span>
                        <span class="text-lg font-serif font-bold text-stone-900">
                            IDR {{ number_format($booking->total_price, 0, ',', '.') }}
                        </span>
                    </div>

                    @if($booking->payment_status === 'paid')
                        <a href="{{ route('member.eticket') }}" class="px-5 py-2.5 bg-forest-dark hover:bg-forest text-gold text-xs font-bold rounded-xl transition shadow-sm">
                            Lihat E-Tiket
                        </a>
                    @else
                        <a href="{{ route('member.payment') }}" class="px-5 py-2.5 bg-gold hover:bg-gold-dark text-stone-950 text-xs font-bold rounded-xl transition shadow-sm">
                            Pembayaran
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white p-12 rounded-3xl border border-stone-200 text-center space-y-3">
                <p class="text-stone-400 text-sm">Belum ada riwayat reservasi pada akun Anda.</p>
                <a href="{{ route('member.akomodasi') }}" class="inline-block px-5 py-2.5 bg-gold hover:bg-gold-dark text-stone-950 text-xs font-bold rounded-xl transition">
                    Pilih Kamar Sekarang
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
