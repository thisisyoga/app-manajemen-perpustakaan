<x-guest-layout>
    <!-- Header Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-stone-900">Selamat Datang Kembali</h2>
        <p class="mt-2 text-sm text-stone-500">
            Silakan masukkan detail akun Anda untuk mulai membaca.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-stone-700">Email</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-stone-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    autocomplete="email" 
                    required 
                    value="{{ old('email') }}"
                    class="block w-full pl-10 pr-3 py-2.5 border border-stone-300 rounded-lg leading-5 bg-white placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 sm:text-sm transition duration-150 ease-in-out" 
                    placeholder="nama@instansi.com"
                >
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-stone-700">Password</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-stone-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    autocomplete="current-password" 
                    required 
                    class="block w-full pl-10 pr-3 py-2.5 border border-stone-300 rounded-lg leading-5 bg-white placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 sm:text-sm transition duration-150 ease-in-out" 
                    placeholder="••••••••"
                >
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input 
                    id="remember_me" 
                    name="remember" 
                    type="checkbox" 
                    class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-stone-300 rounded cursor-pointer transition duration-150 ease-in-out"
                >
                <label for="remember_me" class="ml-2 block text-sm text-stone-600 cursor-pointer select-none">
                    Ingat saya
                </label>
            </div>

            @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-amber-600 hover:text-amber-500 transition duration-150 ease-in-out">
                        Lupa password?
                    </a>
                </div>
            @endif
        </div>

        <!-- Submit Button -->
        <div>
            <button 
                type="submit" 
                class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200 ease-in-out transform hover:-translate-y-0.5"
            >
                Masuk ke Akun
            </button>
        </div>
    </form>

    <!-- Register Link -->
    <div class="mt-8">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-stone-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-stone-500">
                    Belum memiliki akun?
                </span>
            </div>
        </div>

        <div class="mt-6">
            <a 
                href="{{ route('register') }}" 
                class="w-full flex justify-center py-2.5 px-4 border border-stone-300 rounded-lg shadow-sm bg-white text-sm font-medium text-stone-700 hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition duration-150 ease-in-out"
            >
                Daftar Sekarang
            </a>
        </div>
    </div>
</x-guest-layout>