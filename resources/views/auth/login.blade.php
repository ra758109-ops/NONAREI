<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Noona Rei Hotel & Resort</title>
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
</head>
<body class="bg-stone-900 text-stone-100 font-sans antialiased flex min-h-screen items-center justify-center p-6">

    <div class="w-full max-w-md bg-forest-dark border border-stone-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
        <div class="absolute -right-12 -top-12 w-40 h-40 bg-gold/10 rounded-full blur-2xl"></div>

        <div class="text-center mb-8 relative z-10">
            <a href="/" class="font-serif text-2xl font-bold tracking-widest text-gold uppercase">Noona Rei</a>
            <p class="text-xs text-stone-400 mt-2">Masuk ke Area Eksklusif Member</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-rose-950/80 border border-rose-800 text-rose-200 px-4 py-3 rounded-xl text-xs space-y-1 relative z-10">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4 relative z-10">
            @csrf

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-300 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@domain.com"
                    class="w-full px-4 py-3 bg-stone-900/80 border border-stone-700 rounded-xl text-sm text-stone-100 focus:outline-none focus:border-gold transition">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-stone-300 mb-1.5">Password</label>
                <input type="password" name="password" required placeholder="••••••••"
                    class="w-full px-4 py-3 bg-stone-900/80 border border-stone-700 rounded-xl text-sm text-stone-100 focus:outline-none focus:border-gold transition">
            </div>

            <button type="submit" class="w-full py-3.5 bg-gold hover:bg-gold-dark text-stone-950 font-bold rounded-xl text-sm transition shadow-lg shadow-gold/20 mt-2">
                Masuk Sistem
            </button>
        </form>
    </div>

</body>
</html>
