<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#F3F0E9]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Anggota - Aksara</title>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Lora:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; overflow: hidden; }
        .font-serif { font-family: 'Lora', serif; }
        
        .custom-input:focus {
            border-color: #5D3A2E !important;
            box-shadow: 0 0 0 4px rgba(93, 58, 46, 0.1);
            background-color: white !important;
        }

        /* Border merah jika ada error */
        .input-error {
            border-color: #ef4444 !important;
            background-color: #fef2f2 !important;
        }

        .main-card::-webkit-scrollbar { width: 4px; }
        .main-card::-webkit-scrollbar-thumb { background: #C99B66; border-radius: 10px; }
    </style>
</head>
<body class="h-full antialiased text-DarkChocolate flex items-center justify-center p-4">
    
    <div class="max-w-4xl w-full bg-white rounded-[32px] shadow-2xl shadow-Chocolate/10 border border-Chocolate/5 p-6 md:p-10 relative main-card">
        
        <div class="flex justify-between items-center mb-6">
            <div>
                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="h-12 w-auto lg:mx-0 opacity-90 mb-2">
                <h2 class="text-2xl font-serif text-Chocolate leading-tight">Registrasi Akun</h2>
                <p class="text-MediumBrown/50 text-[11px] uppercase tracking-widest font-bold">Perpustakaan Digital</p>
            </div>
            <a href="javascript:history.back()" class="flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-widest text-Chocolate/40 hover:text-Chocolate transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3 mb-6">
                
                <div class="space-y-3">
                    <div class="group">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-Chocolate/50 mb-1 ml-1">Nama Lengkap</label>
                        <input name="NamaLengkap" type="text" value="{{ old('NamaLengkap') }}" required
                            class="custom-input w-full px-4 py-2.5 bg-[#F9F8F6] border-2 border-transparent rounded-xl transition-all text-sm font-medium @error('NamaLengkap') input-error @enderror"
                            placeholder="Nama Lengkap">
                        @error('NamaLengkap') <span class="text-[10px] text-red-500 font-semibold ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-Chocolate/50 mb-1 ml-1">Email Aktif</label>
                        <input name="email" type="email" value="{{ old('email') }}" required
                            class="custom-input w-full px-4 py-2.5 bg-[#F9F8F6] border-2 border-transparent rounded-xl transition-all text-sm font-medium @error('email') input-error @enderror"
                            placeholder="email@example.com">
                        @error('email') <span class="text-[10px] text-red-500 font-semibold ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-Chocolate/50 mb-1 ml-1">Alamat Domisili</label>
                        <textarea name="alamat" rows="3" required
                            class="custom-input w-full px-4 py-2.5 bg-[#F9F8F6] border-2 border-transparent rounded-xl transition-all text-sm font-medium resize-none @error('alamat') input-error @enderror"
                            placeholder="Alamat Lengkap...">{{ old('alamat') }}</textarea>
                        @error('alamat') <span class="text-[10px] text-red-500 font-semibold ml-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="group">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-Chocolate/50 mb-1 ml-1">Username</label>
                        <input name="name" type="text" value="{{ old('name') }}" required
                            class="custom-input w-full px-4 py-2.5 bg-[#F9F8F6] border-2 border-transparent rounded-xl transition-all text-sm font-medium @error('name') input-error @enderror"
                            placeholder="username">
                        @error('name') <span class="text-[10px] text-red-500 font-semibold ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-Chocolate/50 mb-1 ml-1">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="custom-input w-full px-4 py-2.5 pr-10 bg-[#F9F8F6] border-2 border-transparent rounded-xl transition-all text-sm font-medium @error('password') input-error @enderror"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePass('password', 'eye1')" class="absolute inset-y-0 right-3 flex items-center text-Chocolate/30 hover:text-Chocolate transition-colors">
                                <svg id="eye1" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('password') <span class="text-[10px] text-red-500 font-semibold ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="group">
                        <label class="block text-[10px] font-bold uppercase tracking-widest text-Chocolate/50 mb-1 ml-1">Konfirmasi Password</label>
                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="custom-input w-full px-4 py-2.5 pr-10 bg-[#F9F8F6] border-2 border-transparent rounded-xl transition-all text-sm font-medium"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePass('password_confirmation', 'eye2')" class="absolute inset-y-0 right-3 flex items-center text-Chocolate/30 hover:text-Chocolate transition-colors">
                                <svg id="eye2" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="role" value="user">
                </div>
            </div>

            <button type="submit"
                class="w-full py-3.5 rounded-xl bg-Chocolate text-white text-xs font-bold tracking-widest uppercase hover:bg-DarkChocolate shadow-lg shadow-Chocolate/10 transition-all active:scale-[0.98]">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-6 pt-5 border-t border-beige/40 text-center">
            <p class="text-[11px] text-MediumBrown/60">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-Chocolate font-bold border-b border-Caramel/30 hover:border-Caramel transition-all ml-1">Masuk Sekarang</a>
            </p>
        </div>
    </div>

    <script>
        function togglePass(id, eyeId) {
            const input = document.getElementById(id);
            const icon = document.getElementById(eyeId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 014.138-4.138m6.162 14.062a10.05 10.05 0 01-1.611-1.611m12.42-12.42L3 3m3.058 3.058a9.96 9.96 0 013.626-1.947m6.242 0c3.355.73 6.131 2.758 7.732 5.542a10.005 10.005 0 01-2.023 3.626m-4.008 4.008a4 4 0 11-5.656-5.656" />';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>
</body>
</html>