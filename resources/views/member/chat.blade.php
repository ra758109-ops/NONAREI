@extends('layouts.member')
@section('title', 'Live Chat Resepsionis - Noona Rei Hotel & Resort')
@section('content')
<div class="space-y-6">
    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Layanan Pelanggan 24/7</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Live Chat Resepsionis</h1>
        <p class="text-stone-500 text-sm mt-1">Terhubung langsung dengan staf resepsionis hotel untuk bantuan cepat.</p>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-6 h-[500px] flex flex-col justify-between">
        <div class="flex-1 overflow-y-auto space-y-4 pr-2">
            <div class="flex items-start space-x-3">
                <div class="w-8 h-8 rounded-full bg-forest-dark text-gold font-bold flex items-center justify-center text-xs flex-shrink-0">NR</div>
                <div class="bg-stone-100 p-4 rounded-2xl max-w-lg text-xs md:text-sm text-stone-700 border border-stone-200">
                    Halo, selamat datang di Noona Rei Resort. Ada yang bisa kami bantu terkait reservasi Anda hari ini?
                </div>
            </div>

            @if(isset($chats) && count($chats) > 0)
                @foreach($chats as $chat)
                    <div class="flex items-start space-x-3 {{ $chat->user_id === Auth::id() ? 'flex-row-reverse space-x-reverse' : '' }}">
                        <div class="w-8 h-8 rounded-full {{ $chat->user_id === Auth::id() ? 'bg-gold text-stone-950' : 'bg-forest-dark text-gold' }} font-bold flex items-center justify-center text-xs flex-shrink-0">
                            {{ strtoupper(substr($chat->user->name ?? 'U', 0, 1)) }}
                        </div>
                        <div class="{{ $chat->user_id === Auth::id() ? 'bg-forest-dark text-white' : 'bg-stone-100 text-stone-700 border border-stone-200' }} p-4 rounded-2xl max-w-lg text-xs md:text-sm shadow-sm">
                            <p>{{ $chat->message }}</p>
                            <span class="block text-[10px] text-stone-400 mt-1 text-right">{{ $chat->created_at ? $chat->created_at->format('H:i') : 'Baru saja' }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <form action="{{ route('member.chat.store') }}" method="POST" class="mt-4 pt-4 border-t border-stone-100 flex gap-3 items-center">
            @csrf
            <input type="text" name="message" required placeholder="Ketik pesan Anda kepada resepsionis..." class="flex-1 px-4 py-3 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold bg-stone-50">
            <button type="submit" class="px-6 py-3 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-xs transition shadow-sm">Kirim Pesan</button>
        </form>
    </div>
</div>
@endsection
