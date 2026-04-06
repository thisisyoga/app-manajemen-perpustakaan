<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>Profil Saya - Aksara</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-beige/30 text-DarkChocolate font-sans antialiased">

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav class="flex mb-8 text-sm font-medium text-Caramel" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('admin-dashboard') }}" class="hover:text-Chocolate transition">Dashboard</a>
                    </li>
                    <li><i class="fas fa-chevron-right text-[10px] mx-2 text-beige"></i></li>
                    <li class="text-Chocolate">Pengaturan Profil</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-3xl shadow-sm border border-Chocolate/5 overflow-hidden">
                        <div class="h-32 bg-gradient-to-r from-Chocolate to-MediumBrown"></div>
                        <div class="px-6 pb-6 text-center">
                            <div class="relative -mt-16 mb-4">
                                <img class="h-32 w-32 rounded-2xl mx-auto border-4 border-white shadow-md object-cover"
                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=5D3A2E&color=fff&size=128"
                                    alt="{{ $user->name }}">
                                <span
                                    class="absolute bottom-2 right-1/2 translate-x-12 bg-green-500 border-2 border-white w-5 h-5 rounded-full"></span>
                            </div>
                            <h2 class="text-xl font-bold text-DarkChocolate">{{ $user->NamaLengkap ?? $user->name }}
                            </h2>
                            <p class="text-sm text-Caramel font-medium mb-4 italic">@ {{ $user->name }}</p>

                            <div
                                class="inline-flex items-center px-3 py-1 rounded-full bg-beige text-Chocolate text-xs font-black uppercase tracking-widest">
                                <i class="fas fa-shield-alt mr-2"></i> {{ $user->role }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 space-y-6">

                    <div id="info-umum"
                        class="bg-white rounded-3xl shadow-sm border border-Chocolate/5 overflow-hidden transition-all hover:shadow-md">
                        <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between">
                            <h3 class="text-lg font-bold text-DarkChocolate flex items-center gap-2">
                                <i class="fas fa-id-card text-Caramel"></i> Informasi Profil
                            </h3>
                        </div>

                        <form method="post" action="{{ route('profile.update.admin') }}" class="p-8 space-y-6">
                            @csrf
                            @method('patch')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-Chocolate uppercase tracking-wider">Nama
                                        Lengkap</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                            <i class="fas fa-user text-sm"></i>
                                        </span>
                                        <input type="text" name="NamaLengkap"
                                            value="{{ old('NamaLengkap', $user->NamaLengkap) }}"
                                            class="block w-full pl-10 pr-3 py-3 border-gray-200 rounded-xl focus:ring-Caramel focus:border-Caramel text-sm transition shadow-sm"
                                            placeholder="Masukkan nama lengkap">
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-bold text-Chocolate uppercase tracking-wider">Username</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                            <i class="fas fa-at text-sm"></i>
                                        </span>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            required
                                            class="block w-full pl-10 pr-3 py-3 border-gray-200 rounded-xl focus:ring-Caramel focus:border-Caramel text-sm transition shadow-sm">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label
                                            class="text-xs font-bold text-Chocolate uppercase tracking-wider">Password
                                            Baru</label>
                                        <div class="relative group">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 group-focus-within:text-Caramel transition-colors">
                                                <i class="fas fa-lock text-sm"></i>
                                            </span>
                                            <input type="password" name="password" id="password" placeholder="....."
                                                class="block w-full pl-10 pr-10 py-3 border-gray-200 rounded-xl focus:ring-Caramel focus:border-Caramel text-sm transition shadow-sm">

                                            <button type="button" onclick="togglePass('password', 'eye1')"
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-Chocolate transition-colors">
                                                <i id="eye1" class="fas fa-eye text-sm"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label
                                            class="text-xs font-bold text-Chocolate uppercase tracking-wider">Konfirmasi
                                            Password</label>
                                        <div class="relative group">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 group-focus-within:text-Caramel transition-colors">
                                                <i class="fas fa-lock text-sm"></i>
                                            </span>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" placeholder="....."
                                                class="block w-full pl-10 pr-10 py-3 border-gray-200 rounded-xl focus:ring-Caramel focus:border-Caramel text-sm transition shadow-sm">

                                            <button type="button" onclick="togglePass('password_confirmation', 'eye2')"
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-Chocolate transition-colors">
                                                <i id="eye2" class="fas fa-eye text-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-Chocolate uppercase tracking-wider">Alamat
                                    Email</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <i class="fas fa-envelope text-sm"></i>
                                    </span>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                        required
                                        class="block w-full pl-10 pr-3 py-3 border-gray-200 rounded-xl focus:ring-Caramel focus:border-Caramel text-sm transition shadow-sm">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-Chocolate uppercase tracking-wider">Alamat
                                    Tinggal</label>
                                <textarea name="alamat" rows="3"
                                    class="block w-full px-4 py-3 border-gray-200 rounded-xl focus:ring-Caramel focus:border-Caramel text-sm transition shadow-sm"
                                    placeholder="Jl. Contoh No. 123...">{{ old('alamat', $user->alamat) }}</textarea>
                            </div>

                            <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-50">
                                @if (session('status') === 'profile-updated')
                                    <span x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                                        x-transition.duration.500ms
                                        class="text-sm text-green-600 animate-pulse font-medium">
                                        <i class="fas fa-check-circle mr-1"></i> Perubahan disimpan
                                    </span>
                                @endif
                                <button type="submit"
                                    class="px-8 py-3 bg-Chocolate text-white rounded-xl font-bold hover:bg-DarkChocolate transition shadow-lg shadow-Chocolate/20 flex items-center gap-2">
                                    <i class="fas fa-save"></i> Perbarui Profil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    function togglePass(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</html>
