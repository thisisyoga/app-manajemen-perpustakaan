<x-guest-layout>

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-serif font-bold text-amber-900 tracking-tight">Selamat Datang Kembali</h2>
        <p class="mt-1 text-sm text-amber-800/60 italic">
            Silakan masukkan detail akun anda.
        </p>
        <div class="mt-2 h-0.5 w-10 bg-amber-200 mx-auto rounded-full"></div>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-amber-800">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" />
                    </svg>
                </div>
                <input id="email" name="email" type="email" required
                    class="block w-full pl-11 pr-4 py-2.5 border border-amber-200 rounded-xl bg-white text-amber-950 placeholder-amber-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all duration-300 outline-none text-sm"
                    placeholder="Alamat email anda">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
        </div>

        <div>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-amber-800">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <input id="password" name="password" type="password" required
                    class="block w-full pl-11 pr-4 py-2.5 border border-amber-200 rounded-xl bg-white text-amber-950 placeholder-amber-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-400 transition-all duration-300 outline-none text-sm"
                    placeholder="Password anda">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
        </div>

        <div class="flex items-center justify-between px-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" name="remember" type="checkbox"
                    class="h-3.5 w-3.5 text-amber-600 border-amber-300 rounded focus:ring-amber-500">
                <span class="ml-2 text-xs font-semibold text-amber-800/60">Ingat saya</span>
            </label>
            <a href="{{ route('password.request') }}"
                class="text-xs font-bold text-amber-700 hover:text-amber-900 transition underline underline-offset-2">Lupa
                password?</a>
        </div>

        <button type="submit"
            class="w-full py-3 px-4 rounded-xl shadow-lg shadow-amber-200 text-sm font-bold text-white bg-amber-600 hover:bg-amber-700 transition-all active:scale-[0.98]">
            Masuk Sekarang
        </button>
        <div class="mt-4 flex justify-center">
            <a href="{{ route('welcome') }}"
                class="text-xs font-medium text-amber-800/50 hover:text-amber-800 transition-all flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke halaman sebelumnya
            </a>
        </div>
    </form>

    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-amber-100"></div>
            </div>
            <div class="relative flex justify-center text-[10px] uppercase tracking-widest font-bold">
                <span class="px-3 bg-white text-amber-800 italic">Belum punya akun?</span>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('register') }}"
                class="w-full flex justify-center py-2.5 px-4 border-2 border-amber-100 rounded-xl bg-amber-50/30 text-sm font-bold text-amber-800 hover:bg-amber-100/50 transition-all">
                Daftar Akun Baru
            </a>
        </div>
    </div>
</x-guest-layout>
