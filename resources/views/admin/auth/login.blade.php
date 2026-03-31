<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login | Aksara</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#FDFCFB] flex items-center justify-center p-4">

    <div class="w-full max-w-md rounded-[2.5rem] border border-Caramel/20 bg-white/95 backdrop-blur-md shadow-[0_25px_50px_-12px_rgba(93,58,46,0.15)] p-10">

        <header class="text-center mb-8">
            <div class="w-fit mx-auto mb-6">
                <img src="{{ asset('image/logo.png') }}" alt="Logo"
                    class="w-20 h-20 object-contain mx-auto">
            </div>
            <h1 class="text-2xl font-bold text-Chocolate mb-1 tracking-tight">Portal Admin</h1>
            <p class="text-sm text-MediumBrown/60">Silakan masuk untuk mengelola sistem</p>
        </header>

        @if ($errors->any())
            <div class="mb-4 rounded-2xl bg-red-50 px-4 py-3 text-xs font-medium text-red-600 border border-red-100">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-5">
            @csrf

            <div class="space-y-2">
                <label for="email" class="text-[10px] font-bold uppercase tracking-[0.15em] text-MediumBrown/70 ml-1">Email Kredensial</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-5 py-4 bg-beige/10 border border-Caramel/20 rounded-2xl focus:ring-4 focus:ring-Chocolate/5 focus:border-Chocolate transition-all duration-300 text-sm placeholder-MediumBrown/30 text-DarkChocolate"
                    placeholder="admin@aksara.com">
            </div>

            <div class="space-y-2">
                <label for="password" class="text-[10px] font-bold uppercase tracking-[0.15em] text-MediumBrown/70 ml-1">Password</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required
                        class="w-full px-5 py-4 bg-beige/10 border border-Caramel/20 rounded-2xl focus:ring-4 focus:ring-Chocolate/5 focus:border-Chocolate transition-all duration-300 text-sm placeholder-MediumBrown/30 text-DarkChocolate"
                        placeholder="••••••••">
                    
                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 pr-5 flex items-center text-MediumBrown/30 hover:text-Chocolate transition-colors">
                        <i id="eye-icon" class="fa-regular fa-eye text-sm"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between px-1">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-Caramel/30 text-Chocolate focus:ring-Chocolate/20 w-4 h-4">
                    <span class="ml-2 text-xs text-MediumBrown/60 font-medium">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs font-bold text-Chocolate hover:underline">Lupa Sandi?</a>
                @endif
            </div>

            <button type="submit"
                class="w-full py-4 rounded-2xl bg-Chocolate text-white text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-DarkChocolate shadow-lg shadow-Chocolate/20 transition-all active:scale-[0.98] mt-4">
                Masuk Ke Dashboard
            </button>
        </form>

        <footer class="mt-10 text-center">
            <a href="/" class="text-xs font-semibold text-MediumBrown/40 hover:text-Chocolate transition-colors inline-flex items-center">
                <i class="fa-solid fa-arrow-left mr-2 text-[10px]"></i> Kembali ke Beranda
            </a>
        </footer>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>