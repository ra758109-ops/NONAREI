<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Member Area - Noona Rei Hotel & Resort')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'forest-dark': '#142118',
                        'forest': '#1b2e23',
                        'gold': '#9c7c47',
                        'gold-dark': '#826639',
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-stone-100 text-stone-800 antialiased flex min-h-screen selection:bg-gold selection:text-white">

    <!-- Sidebar Kiri Sesuai Figma & Tanpa Wishlist -->
    <aside class="w-64 bg-forest-dark text-white border-r border-stone-800 hidden md:flex flex-col p-6 sticky top-0 h-screen shadow-2xl flex-shrink-0">
        <div class="flex items-center space-x-3 mb-10 px-2">
            <a href="{{ route('member.dashboard') }}" class="text-xl font-serif tracking-widest font-bold text-gold uppercase">Noona Rei</a>
        </div>

        <nav class="space-y-1.5 text-sm font-medium flex-1 text-stone-300">
            <a href="{{ route('member.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all hover:bg-stone-800/60 hover:text-stone-100 {{ request()->routeIs('member.dashboard') ? 'bg-stone-800/90 text-gold font-semibold shadow-inner' : '' }}">Dashboard</a>
            <a href="{{ route('member.akomodasi') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all hover:bg-stone-800/60 hover:text-stone-100 {{ request()->routeIs('member.akomodasi*') ? 'bg-stone-800/90 text-gold font-semibold shadow-inner' : '' }}">Akomodasi</a>
            <a href="{{ route('member.booking') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all hover:bg-stone-800/60 hover:text-stone-100 {{ request()->routeIs('member.booking*') ? 'bg-stone-800/90 text-gold font-semibold shadow-inner' : '' }}">Pesanan Saya</a>
            <a href="{{ route('member.vouchers') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all hover:bg-stone-800/60 hover:text-stone-100 {{ request()->routeIs('member.vouchers*') ? 'bg-stone-800/90 text-gold font-semibold shadow-inner' : '' }}">Promo & Voucher</a>
            <a href="{{ route('member.chat') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all hover:bg-stone-800/60 hover:text-stone-100 {{ request()->routeIs('member.chat*') ? 'bg-stone-800/90 text-gold font-semibold shadow-inner' : '' }}">Live Chat Resepsionis</a>
            <a href="{{ route('member.profile') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all hover:bg-stone-800/60 hover:text-stone-100 {{ request()->routeIs('member.profile*') ? 'bg-stone-800/90 text-gold font-semibold shadow-inner' : '' }}">Profil Akun</a>
        </nav>

        <div class="pt-6 border-t border-stone-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left flex items-center space-x-3 px-4 py-2.5 rounded-xl text-rose-400 hover:bg-rose-950/40 text-sm font-medium">Keluar Sistem</button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b border-stone-200 h-20 flex items-center justify-between px-8 sticky top-0 z-40 shadow-sm">
            <span class="text-xs md:text-sm font-medium text-stone-600 bg-stone-50 px-3.5 py-1.5 rounded-lg border border-stone-200">Noona Rei Hotel & Resort — Sabang, Aceh</span>
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-forest-dark text-gold font-bold flex items-center justify-center text-sm shadow-inner">
                    {{ strtoupper(substr(Auth::user()->name ?? 'R', 0, 1)) }}
                </div>
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-stone-900 leading-tight">{{ Auth::user()->name ?? 'Raihan' }}</p>
                    <p class="text-xs text-gold font-semibold mt-0.5">VIP Gold Member</p>
                </div>
            </div>
        </header>

        <main class="p-8 max-w-7xl w-full mx-auto flex-1">
            @yield('content')
        </main>
    </div>

</body>
</html>
