@extends('layouts.member')
@section('title', 'Profil Akun - Noona Rei Hotel & Resort')
@section('content')
<div class="space-y-8 max-w-3xl">
    <div>
        <span class="text-gold text-xs uppercase tracking-widest font-semibold">Pengaturan Akun</span>
        <h1 class="text-3xl font-serif font-bold text-stone-900 mt-1">Profil VIP Member</h1>
        <p class="text-stone-500 text-sm mt-1">Kelola informasi pribadi, ubah data diri, dan perbarui keamanan akun Anda.</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-950/80 border border-emerald-800 text-emerald-200 rounded-2xl text-xs shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="p-4 bg-rose-950/80 border border-rose-800 text-rose-200 rounded-2xl text-xs space-y-1 shadow-sm">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- Form CRUD: Update Informasi Profil (Nama & Email) -->
    <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
        <div class="flex items-center space-x-4 border-b border-stone-100 pb-6">
            <div class="w-16 h-16 rounded-full bg-forest-dark text-gold font-bold flex items-center justify-center text-xl shadow-inner">
                {{ strtoupper(substr(Auth::user()->name ?? 'R', 0, 1)) }}
            </div>
            <div>
                <h3 class="font-serif font-bold text-stone-900 text-lg">{{ Auth::user()->name }}</h3>
                <p class="text-xs text-gold font-semibold">VIP Gold Member — Sabang</p>
            </div>
        </div>

        <form action="{{ route('member.profile.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Email Aktif</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
            </div>

            <button type="submit" class="px-6 py-3 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-xs transition shadow-sm">
                Simpan Perubahan Profil
            </button>
        </form>
    </div>

    <!-- Form CRUD: Update Password Akun -->
    <div class="bg-white p-8 rounded-3xl border border-stone-200 shadow-sm space-y-6">
        <h3 class="font-serif font-bold text-lg text-stone-900">Keamanan & Ubah Password</h3>

        <form action="{{ route('member.profile.password') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Password Saat Ini</label>
                <input type="password" name="current_password" required placeholder="••••••••"
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Password Baru</label>
                <input type="password" name="password" required placeholder="••••••••"
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-600 mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" required placeholder="••••••••"
                       class="w-full px-4 py-3 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:border-gold">
            </div>

            <button type="submit" class="px-6 py-3 bg-stone-900 hover:bg-stone-800 text-white font-bold rounded-xl text-xs transition shadow-sm">
                Perbarui Password
            </button>
        </form>
    </div>
</div>
@endsection
