<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>{{ $pinjam->judul_buku }} - Aksara</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-beige/30 font-sans antialiased text-DarkChocolate">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-Caramel/20">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-10">
            <div class="relative flex items-center h-[88px] justify-between">

                <div class="flex items-center">
                    <a href="/" class="flex items-center group">
                        <img src="{{ asset('image/logo.png') }}" alt="Aksara Logo"
                            class="h-20 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>

                <div class="hidden md:flex items-center gap-10">
                    <a href="{{ route('MDU') }}"
                        class="relative py-1 text-sm font-bold uppercase tracking-widest {{ request()->routeIs('MDU') ? 'text-Chocolate' : 'text-MediumBrown/60 hover:text-Chocolate' }} transition-colors">
                        <i class="fas fa-book "></i> Katalog
                        @if (request()->routeIs('MDU'))
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-Chocolate rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('riwayat') }}"
                        class="relative py-1 text-sm font-bold uppercase tracking-widest {{ request()->routeIs('riwayat') ? 'text-Chocolate' : 'text-MediumBrown/60 hover:text-Chocolate' }} transition-colors">
                        <i class="fas fa-history"></i> Riwayat
                        @if (request()->routeIs('riwayat'))
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-Chocolate rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('favorit') }}"
                        class="relative py-1 text-sm font-bold uppercase tracking-widest {{ request()->routeIs('favorit') ? 'text-Chocolate' : 'text-MediumBrown/60 hover:text-Chocolate' }} transition-colors">
                        <i class="fas fa-bookmark"></i> Favorit
                        @if (request()->routeIs('favorit'))
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-Chocolate rounded-full"></span>
                        @endif
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button"
                            class="flex items-center gap-3 pl-3 pr-1 py-1 rounded-full border border-Caramel/20 hover:bg-beige/40 transition-all">
                            <div class="text-right hidden lg:block">
                                <p class="text-[11px] font-bold text-DarkChocolate leading-none">
                                    {{ Auth::user()->name }}</p>
                                <p class="text-[9px] text-MediumBrown uppercase tracking-tighter font-black mt-1">Member
                                </p>
                            </div>
                            <div
                                class="h-9 w-9 rounded-full overflow-hidden border-2 border-white shadow-sm ring-1 ring-Caramel/20">
                                <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=5D3A2E&color=fff' }}"
                                    alt="User" class="h-full w-full object-cover">
                            </div>
                        </button>

                        <div
                            class="absolute right-0 mt-3 w-52 bg-white rounded-2xl shadow-xl border border-beige py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 z-[60]">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left flex items-center px-5 py-3 text-sm text-red-600 hover:bg-red-50 font-bold transition-colors">
                                    <i class="fas fa-power-off mr-3 text-xs"></i> Keluar Akun
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto py-10 px-6">
        <div class="bg-white rounded-3xl shadow-xl border border-beige/50 overflow-hidden">

            <div class="bg-beige/10 p-8 border-b border-beige/30">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8">
                    <img src="{{ asset('storage/' . $pinjam->cover) }}"
                        class="w-32 h-44 object-cover rounded-xl shadow-lg border-4 border-white" alt="Cover">

                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-extrabold text-DarkChocolate leading-tight mt-3">
                            {{ $pinjam->judul_buku }}</h2>
                        <p class="text-base text-MediumBrown mt-1">{{ $pinjam->penulis }}</p>

                        <div class="mt-4 flex flex-wrap justify-center sm:justify-start gap-3">
                            <div
                                class="flex items-center gap-1.5 text-[11px] font-bold text-Chocolate bg-white border border-Caramel/20 px-3 py-1.5 rounded-lg">
                                <i class="fas fa-calendar text-Caramel"></i> {{ $pinjam->tahun_terbit }}
                            </div>
                            <div
                                class="flex items-center gap-1.5 text-[11px] font-bold text-Chocolate bg-white border border-Caramel/20 px-3 py-1.5 rounded-lg">
                                <i class="fas fa-layer-group text-MediumBrown"></i> Stok: {{ $pinjam->stok }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="mb-6">
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-xl mb-4 shadow-sm">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                                <ul class="text-sm text-red-700 font-medium">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    
                    @if (session('error'))
                        <div class="bg-orange-50 border-l-4 border-orange-500 p-4 rounded-xl mb-4 shadow-sm">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-triangle text-orange-500 mr-3"></i>
                                <p class="text-sm text-orange-700 font-bold">
                                    {{ session('error') }}
                                </p>
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-xl mb-4 shadow-sm">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <p class="text-sm text-green-700 font-bold">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
                <form action="{{ route('store-peminjaman') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="buku_id" value="{{ $pinjam->id }}">
                    <input type="hidden" name="status" value="menunggu">

                    <div class="space-y-2">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-MediumBrown uppercase tracking-wider">Tanggal
                                    Pinjam</label>
                                <div class="relative">
                                    <i
                                        class="fas fa-calendar-day absolute left-4 top-1/2 -translate-y-1/2 text-Caramel"></i>
                                    <input type="date" value="{{ date('Y-m-d') }}" readonly
                                        class="w-full pl-11 pr-4 py-3 bg-beige/10 border border-beige rounded-xl text-Chocolate/70 cursor-not-allowed outline-none">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-Chocolate uppercase tracking-wider">Tanggal
                                    Kembali</label>
                                <div class="relative">
                                    <i
                                        class="fas fa-calendar-check absolute left-4 top-1/2 -translate-y-1/2 text-Caramel"></i>
                                    <input type="date" name="tanggal_pengembalian"
                                        min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                                        class="w-full pl-11 pr-4 py-3 border-2 border-beige focus:border-Caramel focus:ring-4 focus:ring-Caramel/10 rounded-xl outline-none transition-all font-semibold shadow-sm text-DarkChocolate">
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-beige/30 mt-6 space-y-4">
                            <button type="submit"
                                class="w-full bg-Chocolate hover:bg-MediumBrown text-white font-bold py-4 rounded-2xl shadow-lg shadow-Chocolate/20 transition-all flex items-center justify-center gap-3 active:scale-[0.98]">
                                <i class="fas fa-check-circle text-lg text-Caramel"></i>
                                Konfirmasi Pinjam Buku
                            </button>

                            <a href="{{ route('detail-buku', $pinjam->id) }}"
                                class="w-full flex items-center justify-center gap-2 text-MediumBrown hover:text-Chocolate font-semibold py-2 transition-colors duration-200">
                                <i class="fas fa-arrow-left text-xs"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center text-MediumBrown/50 text-[10px] mt-8 uppercase tracking-widest">
            Perpustakaan Digital Aksara
        </p>
    </main>

</body>

</html>
