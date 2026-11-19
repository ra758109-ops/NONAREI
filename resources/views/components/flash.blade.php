@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
         class="mb-6 bg-emerald-950/80 border border-emerald-800 text-emerald-200 px-6 py-4 rounded-2xl flex items-center justify-between shadow-lg transition-all duration-300">
        <div class="flex items-center space-x-3">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
            <span class="text-xs md:text-sm font-medium">{{ session('success') }}</span>
        </div>
        <button @click="show = false" class="text-emerald-400 hover:text-emerald-200 text-xs font-bold">Tutup</button>
    </div>
@endif

@if ($errors->any())
    <div class="mb-6 bg-rose-950/80 border border-rose-800 text-rose-200 px-6 py-4 rounded-2xl shadow-lg">
        <p class="text-xs font-semibold uppercase tracking-wider mb-1">Perhatian:</p>
        <ul class="list-disc list-inside text-xs space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
