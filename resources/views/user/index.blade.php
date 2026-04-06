<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>Katalog - Aksara</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=lora:ital,wght@0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-serif {
            font-family: 'Lora', serif;
        }
    </style>
</head>

<body class="antialiased bg-[#FDFCFB] text-DarkChocolate">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-Caramel/10">
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
                            class="flex items-center gap-3 pl-3 pr-1 py-1 rounded-full border border-Caramel/10 hover:bg-beige/20 transition-all">
                            <div class="text-right hidden lg:block">
                                <p class="text-[11px] font-bold text-DarkChocolate leading-none">
                                    {{ Auth::user()->name }}</p>
                                <p class="text-[9px] text-Chocolate uppercase tracking-tighter font-black mt-1">Member
                                </p>
                            </div>
                            <div
                                class="h-9 w-9 rounded-full overflow-hidden border-2 border-white shadow-sm ring-1 ring-Caramel/20">
                                <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=5D3A2E&color=fff' }}"
                                    alt="User" class="h-full w-full object-cover">
                            </div>
                        </button>

                        <div
                            class="absolute right-0 mt-3 w-52 bg-white rounded-2xl shadow-xl border border-beige/50 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 z-[60]">

                            <a href="{{ route('user.profile') }}"
                                class="w-full text-left flex items-center px-5 py-3 text-sm text-MediumBrown/70 hover:bg-beige/30 font-bold transition-colors">
                                <i class="fas fa-user mr-3 text-xs"></i> Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left flex items-center px-5 py-3 text-sm text-red-500 hover:bg-red-50 font-bold transition-colors">
                                    <i class="fas fa-sign-out mr-3 text-xs"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white border-b border-beige/50">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-10 py-16">
            <h1 class="text-4xl md:text-5xl font-serif text-DarkChocolate leading-tight">
                Katalog <span class="italic text-Chocolate">Buku</span>
            </h1>
            <p class="mt-4 text-MediumBrown/70 text-lg max-w-2xl font-medium">
                Temukan ribuan koleksi literasi digital untuk mendukung perjalanan belajar Anda di Perpustakaan Aksara.
            </p>
        </div>
    </header>

    <main class="max-w-[1440px] mx-auto px-6 lg:px-10 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <aside class="lg:col-span-3 space-y-6">
                <div class="bg-white rounded-3xl border border-beige/60 p-6 shadow-sm sticky top-28">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-bold text-DarkChocolate">Kategori</h2>
                        <i class="fas fa-sliders-h text-Caramel"></i>
                    </div>

                    <form action="{{ url()->current() }}" method="GET" class="relative mb-6">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-Caramel/50 text-xs"></i>
                        <input type="text" name="search_kategori" value="{{ request('search_kategori') }}"
                            placeholder="Cari kategori..."
                            class="w-full h-11 bg-beige/10 rounded-xl pl-10 pr-4 text-sm outline-none border border-beige focus:border-Chocolate transition-all placeholder:text-MediumBrown/30">
                    </form>

                    <div class="space-y-1">
                        <a href="{{ request()->url() }}"
                            class="flex items-center justify-between px-4 py-3 rounded-xl transition-all {{ !request('kategori') ? 'bg-Chocolate text-white shadow-md font-bold' : 'text-MediumBrown/70 hover:bg-beige/30' }}">
                            <span class="text-sm">Semua Buku</span>
                            <i
                                class="fas fa-chevron-right text-[10px] {{ !request('kategori') ? 'opacity-100' : 'opacity-0' }}"></i>
                        </a>

                        @forelse ($dataKategori as $item)
                            <a href="{{ request()->fullUrlWithQuery(['kategori' => $item->id]) }}"
                                class="flex items-center justify-between px-4 py-3 rounded-xl transition-all {{ request('kategori') == $item->id ? 'bg-Chocolate text-white shadow-md font-bold' : 'text-MediumBrown/70 hover:bg-beige/30 hover:text-Chocolate' }}">
                                <span class="text-sm">{{ $item->nama_kategori }}</span>
                                <i
                                    class="fas fa-chevron-right text-[10px] {{ request('kategori') == $item->id ? 'opacity-100' : 'opacity-0' }}"></i>
                            </a>
                        @empty
                            <div class="px-4 py-3 text-xs text-MediumBrown/50 italic">
                                Kategori tidak ditemukan...
                            </div>
                        @endforelse
                    </div>
                </div>
            </aside>

            <div class="lg:col-span-9">
                <div class="bg-white rounded-3xl border border-beige/60 p-4 shadow-sm mb-10">
                    <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-3">
                        @if (request('kategori'))
                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                        @endif

                        <div class="relative flex-grow">
                            <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-Caramel text-lg"></i>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Judul buku, penulis, atau ISBN..."
                                class="w-full h-14 bg-beige/10 rounded-2xl pl-14 pr-5 text-sm outline-none border border-transparent focus:border-Chocolate focus:bg-white transition-all">
                        </div>

                        <button type="submit"
                            class="md:w-32 h-14 bg-DarkChocolate hover:bg-Chocolate text-white rounded-2xl font-bold transition-all shadow-lg shadow-DarkChocolate/10">
                            Cari
                        </button>
                    </form>

                    <div class="flex items-center justify-between mb-8 mt-5">
                        @php $namaKategoriAktif = $kategori->firstWhere('id', request('kategori'))->nama_kategori ?? 'Semua Koleksi'; @endphp
                        <div class="space-y-1">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-Chocolate">Menampilkan</p>
                            <h3 class="text-xl font-bold text-DarkChocolate">{{ $namaKategoriAktif }}</h3>
                        </div>
                        <div class="px-4 py-2 bg-white border border-beige rounded-full shadow-sm">
                            <span class="text-xs font-bold text-MediumBrown/60">{{ count($buku) }} Buku</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                        @forelse ($buku as $b)
                        @empty
                            <div class="col-span-full py-20 text-center">
                                <img src="{{ asset('image/empty-state.png') }}" class="w-40 mx-auto opacity-20 mb-4"
                                    alt="">
                                <p class="text-MediumBrown/50 font-medium">Wah, buku yang kamu cari tidak ditemukan...
                                </p>
                                <a href="{{ request()->url() }}"
                                    class="text-Chocolate font-bold text-sm underline mt-2 inline-block">Lihat Semua
                                    Koleksi</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach ($buku as $b)
                        <div
                            class="group bg-white rounded-[32px] border border-beige/50 p-4 shadow-sm hover:shadow-2xl hover:shadow-Chocolate/5 hover:-translate-y-2 transition-all duration-500 relative">
                            <a href="{{ route('detail-buku', $b->id) }}">
                                <div
                                    class="relative aspect-[3/4] w-full rounded-[24px] bg-beige/20 overflow-hidden mb-6">
                                    <img src="{{ asset('storage/' . $b->cover) }}" alt="Cover Buku"
                                        onerror="this.src='https://placehold.co/400x533/5D3A2E/FFF?text=No+Cover'"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-DarkChocolate/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>

                                    <div class="absolute top-4 left-0 z-10">
                                        <span
                                            class="bg-Chocolate/90 backdrop-blur-sm text-beige text-[10px] font-bold px-4 py-1.5 rounded-r-xl uppercase tracking-wider shadow-lg">
                                            {{ $b->RelasiKategori->first()->nama_kategori ?? 'Tanpa Kategori' }}
                                        </span>
                                    </div>

                                    @php $isBookmarked = in_array($b->id, $koleksi); @endphp
                                    <form action="{{ route('bookmark.store', $b->id) }}" method="POST"
                                        class="absolute top-4 right-4 z-20">
                                        @csrf
                                        <button type="submit"
                                            class="h-10 w-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg transition-all hover:scale-110 active:scale-95 {{ $isBookmarked ? 'text-Chocolate' : 'text-Caramel/30 hover:text-Chocolate' }}">
                                            <i
                                                class="{{ $isBookmarked ? 'fa-solid' : 'fa-regular' }} fa-bookmark"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="px-2 pb-2 flex flex-col min-h-[200px]">
                                    <p
                                        class="text-Caramel text-[10px] font-bold tracking-[0.15em] uppercase mb-1 opacity-80">
                                        {{ Str::limit($b->penulis, 24, '...') }}
                                    </p>
                                    <h3
                                        class="text-lg font-extrabold text-Chocolate leading-tight line-clamp-2 mb-2 group-hover:text-MediumBrown transition">
                                        {{ $b->judul_buku }}
                                    </h3>

                                    {{-- Star Rating --}}
                                    @php
                                        $avgRating = round($b->averageRating());
                                        $totalUlasan = $b->totalUlasans();
                                    @endphp
                                    <div class="flex items-center gap-1 mb-3 text-[10px]">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="fas fa-star {{ $i <= $avgRating ? 'text-Caramel' : 'text-gray-200' }}"></i>
                                        @endfor
                                        <span class="text-DarkChocolate/40 text-[10px] ml-1 font-semibold">
                                            ({{ $totalUlasan > 999 ? number_format($totalUlasan / 1000, 1) . 'k' : $totalUlasan }})
                                        </span>
                                    </div>

                                    <p class="text-DarkChocolate/70 text-xs leading-relaxed line-clamp-3 mb-4">
                                        {{ $b->deskripsi }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between px-2 pt-3 border-t border-beige/50">
                                    <div class="flex items-center">
                                        <div
                                            class="w-1.5 h-1.5 rounded-full {{ $b->stok != 0 ? 'bg-green-500' : 'bg-red-500' }} animate-pulse">
                                        </div>
                                        <span
                                            class="text-[10px] ml-2 font-bold text-MediumBrown/60 uppercase tracking-wider">
                                            Stok: {{ $b->stok }}
                                        </span>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    {{-- <footer class="mt-20 py-10 border-t border-beige/50 text-center">
        <p class="text-xs font-bold text-MediumBrown/40 uppercase tracking-[0.3em]">
            &copy; 2026 Aksara Digital Library - Tefa RPL
        </p>
    </footer> --}}

</body>

</html>
