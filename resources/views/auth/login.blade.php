<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#FAFAFA]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Aksara') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Lora:ital@0;1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Lora', serif; }
        input:focus { transform: translateY(-1px); }
        input:focus { outline: none; }
    </style>
</head>
<body class="h-full antialiased text-DarkChocolate">
    
    <div class="min-h-screen flex items-center justify-center p-6 lg:p-0 bg-beige/30">
        
        <div class="max-w-5xl w-full grid lg:grid-cols-2 bg-white rounded-[32px] overflow-hidden shadow-sm border border-beige/50 relative">
            
            <a href="javascript:history.back()" class="absolute top-6 left-6 z-20 flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-MediumBrown/40 hover:text-Chocolate transition-colors group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>

            <div class="p-8 md:p-16 flex flex-col justify-center">
                <div class="mb-10 text-center lg:text-left mt-4">
                    <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12 w-auto mb-8 mx-auto lg:mx-0 opacity-90">
                    <h2 class="text-3xl font-serif text-Chocolate mb-2">Selamat Datang</h2>
                    <p class="text-MediumBrown/60 text-sm tracking-tight">Masuk untuk melanjutkan ke perpustakaan digital.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div class="space-y-1">
                        <label class="text-[11px] font-semibold uppercase tracking-wider text-MediumBrown/70 ml-1">Email</label>
                        <input id="email" name="email" type="email" required
                            class="w-full px-5 py-3.5 bg-beige/10 border border-beige rounded-2xl focus:ring-4 focus:ring-Chocolate/5 focus:border-Chocolate transition-all duration-300 text-sm placeholder-MediumBrown/30"
                            placeholder="nama@email.com">
                    </div>

                    <div class="space-y-1">
                        <label class="text-[11px] font-semibold uppercase tracking-wider text-MediumBrown/70 ml-1">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="w-full px-5 py-3.5 bg-beige/10 border border-beige rounded-2xl focus:ring-4 focus:ring-Chocolate/5 focus:border-Chocolate transition-all duration-300 text-sm placeholder-MediumBrown/30"
                                placeholder="••••••••">
                            
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-MediumBrown/40 hover:text-Chocolate transition-colors">
                                <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-xs px-1">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox" class="rounded-md border-beige text-Chocolate focus:ring-Chocolate/20">
                            <span class="ml-2 text-MediumBrown/60 group-hover:text-MediumBrown transition-colors">Ingat saya</span>
                        </label>
                        <a href="#" class="text-Chocolate font-medium hover:underline">Lupa Password?</a>
                    </div>

                    <button type="submit"
                        class="w-full py-4 rounded-2xl bg-Chocolate text-white text-sm font-semibold tracking-wide hover:bg-DarkChocolate hover:shadow-xl hover:shadow-Chocolate/10 transition-all active:scale-[0.99] mt-2">
                        Masuk Ke Akun
                    </button>
                </form>

                <div class="mt-17 pt-8 border-t border-beige/40">
                    <p class="text-center text-sm text-MediumBrown/60">
                        Belum bergabung? 
                        <a href="{{ route('register') }}" class="text-Chocolate font-bold hover:underline ml-1">Daftar sekarang</a>
                    </p>
                </div>
            </div>

            <div class="hidden lg:block relative bg-beige/20 p-12">
                <div class="h-full w-full rounded-[24px] overflow-hidden relative">
                    <img class="absolute inset-0 h-full w-full object-cover grayscale-[20%]" 
                         src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=2282&auto=format&fit=crop" 
                         alt="Library">
                    <div class="absolute inset-0 bg-gradient-to-t from-Chocolate/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-10 left-10 right-10 text-white">
                        <p class="text-2xl font-serif italic mb-4 leading-relaxed">
                            "Simpan pengetahuan, temukan inspirasi di setiap helai halaman."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 014.138-4.138m6.162 14.062a10.05 10.05 0 01-1.611-1.611m12.42-12.42L3 3m3.058 3.058a9.96 9.96 0 013.626-1.947m6.242 0c3.355.73 6.131 2.758 7.732 5.542a10.005 10.005 0 01-2.023 3.626m-4.008 4.008a4 4 0 11-5.656-5.656" />';
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>

</body>
</html>