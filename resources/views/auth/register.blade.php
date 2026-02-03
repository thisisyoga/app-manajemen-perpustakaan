<x-guest-layout>
    <div class="mb-4 text-center">
        <h2 class="text-xl font-serif font-bold text-amber-900 tracking-tight">Daftar Anggota</h2>
        <p class="mt-0.5 text-xs text-amber-800/60 italic">Gabung untuk mulai meminjam buku.</p>
        <div class="mt-2 h-0.5 w-8 bg-amber-200 mx-auto rounded-full"></div>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-3">
        @csrf

        <div class="relative group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-amber-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
            </span>
            <input id="NamaLengkap" name="NamaLengkap" type="text" required
                class="block w-full pl-11 pr-4 py-2 border border-amber-200 rounded-xl bg-white text-amber-950 placeholder-amber-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all text-sm outline-none shadow-sm" 
                placeholder="Nama Lengkap">
        </div>

        <div class="relative group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-amber-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </span>
            <input id="name" name="name" type="text" required
                class="block w-full pl-11 pr-4 py-2 border border-amber-200 rounded-xl bg-white text-amber-950 placeholder-amber-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all text-sm outline-none shadow-sm" 
                placeholder="Username">
        </div>

        <div class="relative group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-amber-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            </span>
            <input id="email" name="email" type="email" required
                class="block w-full pl-11 pr-4 py-2 border border-amber-200 rounded-xl bg-white text-amber-950 placeholder-amber-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all text-sm outline-none shadow-sm" 
                placeholder="Email">
        </div>

        <div class="relative group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-amber-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
            </span>
            <input id="password" name="password" type="password" required
                class="block w-full pl-11 pr-4 py-2 border border-amber-200 rounded-xl bg-white text-amber-950 placeholder-amber-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all text-sm outline-none shadow-sm"
                placeholder="Password">
        </div>

        <div class="relative group">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-amber-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            </span>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                class="block w-full pl-11 pr-4 py-2 border border-amber-200 rounded-xl bg-white text-amber-950 placeholder-amber-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all text-sm outline-none shadow-sm"
                placeholder="Konfirmasi Password">
        </div>

        <input type="text" name="role" id="role" value="user" hidden>

        <div class="pt-2">
            <button type="submit" 
                class="w-full py-2.5 px-4 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl shadow-md transition-all active:scale-[0.98] text-sm">
                Daftar Sekarang
            </button>
        </div>

        <p class="text-center text-xs text-amber-800/50">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-bold text-amber-700 hover:text-amber-900 transition underline underline-offset-2">Masuk</a>
        </p>
    </form>
</x-guest-layout>