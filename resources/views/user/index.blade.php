<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan Aksara') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f5f6f8] text-slate-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="relative flex items-center h-[88px]">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="#" class="flex items-center group">
                        <div
                            class="bg-amber-500 group-hover:bg-amber-600 p-2.5 rounded-xl transition-colors duration-300">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <span
                            class="ml-3 text-[28px] font-extrabold text-amber-600 group-hover:text-amber-700 transition-colors duration-300 leading-none">
                            Aksara.
                        </span>
                    </a>
                </div>

                <!-- Menu Tengah -->
                <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-14">
                    <a href="#"
                    class="text-amber-700 hover:text-amber-600 text-[18px] font-medium transition-colors border-b-2 border-amber-500 pb-1">
                    <i class="fas fa-book mr-2"></i> Koleksi Buku
                </a>
                <a href="{{ route('riwayat') }}"
                    class="text-slate-700 hover:text-amber-600 text-[18px] font-medium transition-colors">
                    <i class="fas fa-history mr-2"></i> Riwayat
                </a>
                </div>

                <!-- Right Section -->
                <div class="ml-auto flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button"
                            class="flex items-center gap-3 p-1 rounded-full hover:bg-gray-50 transition-all duration-200 focus:outline-none">
                            <div class="relative">
                                <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-amber-500 shadow-sm">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                        alt="User" class="h-full w-full object-cover">
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start leading-tight">
                                <span
                                    class="text-sm font-bold text-gray-800 group-hover:text-amber-600 transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-wider font-semibold">
                                    {{ Auth::user()->role == 'user' ? 'Member' : 'Admin' }}
                                </span>
                            </div>

                            <i
                                class="fas fa-chevron-down text-xs text-gray-400 hidden lg:inline transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <div
                            class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-[60]">
                            <div class="px-4 py-3 border-b border-gray-50 mb-1">
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">Akun Saya</p>
                                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="/profile"
                                class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors">
                                <i class="fas fa-user-circle mr-3 w-5 text-amber-500"></i> My Profile
                            </a>

                            <div class="border-t border-gray-50 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3 w-5"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>

                    <button id="mobile-menu-button"
                        class="md:hidden p-2 text-amber-600 hover:text-amber-700 rounded-lg hover:bg-amber-50 transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-gray-200 shadow-sm">
        <div class="px-4 py-4 space-y-3">
            <a href="#"
                class="block px-4 py-3 rounded-xl text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-amber-50">
                Home
            </a>
            <a href="#"
                class="block px-4 py-3 rounded-xl text-base font-medium text-slate-700 hover:text-amber-600 hover:bg-amber-50">
                Koleksi Buku
            </a>

            <div class="pt-2 space-y-3">
                <div class="flex items-center bg-[#f3f4f6] rounded-xl px-4 h-[48px]">
                    <i class="fas fa-search text-gray-400 mr-3 text-sm"></i>
                    <input type="text" placeholder="Cari buku, penulis..."
                        class="bg-transparent outline-none w-full text-[16px] text-slate-700 placeholder:text-gray-400">
                </div>

                <button
                    class="w-full bg-amber-600 hover:bg-amber-700 text-white h-[48px] rounded-xl font-semibold transition">
                    Cari
                </button>
            </div>
        </div>
    </div>

    <!-- Hero -->
    <section class="border-b border-gray-200 bg-[#f5f6f8]">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="pt-16 pb-14 md:pt-20 md:pb-16 lg:pt-24 lg:pb-20">
                <h1 class="text-[46px] md:text-[58px] font-extrabold tracking-tight text-slate-800 leading-[1.08]">
                    Koleksi Buku
                </h1>
                <p class="mt-5 text-[20px] md:text-[22px] text-slate-500 leading-relaxed max-w-[760px]">
                    Jelajahi koleksi buku dan sumber daya kami yang luas.
                </p>
            </div>
        </div>
    </section>

    <!-- Main -->
    <section class="pt-10 pb-14 md:pt-12 md:pb-16">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 xl:gap-10">

                <!-- Sidebar Kategori -->
                <aside class="lg:col-span-3">
                    <div class="bg-white rounded-[28px] border border-gray-200 shadow-sm p-7 h-full">
                        <div class="flex items-center gap-3 mb-7">
                            <i class="fas fa-filter text-slate-500 text-[22px]"></i>
                            <h2 class="text-[22px] font-bold text-slate-800">Kategori</h2>
                        </div>

                        <div class="relative mb-5">
                            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Cari Kategori..."
                                class="w-full h-[52px] bg-[#f6f7f9] rounded-2xl pl-11 pr-4 outline-none border border-gray-200 focus:border-amber-400 text-[16px]">
                        </div>

                        <div class="space-y-2">
                            <a href="{{ url()->current() }}"
                                class="flex items-center gap-3 px-4 py-3 rounded-2xl transition
                {{ !request('kategori') ? 'bg-amber-600 text-white shadow-sm font-semibold' : 'text-slate-600 hover:bg-amber-50 hover:text-amber-700' }}">
                                <i
                                    class="far fa-bookmark text-[18px] w-5 {{ !request('kategori') ? 'text-white' : '' }}"></i>
                                <span class="text-[16px]">Semua Buku</span>
                            </a>

                            @foreach ($kategori as $item)
                                <a href="{{ request()->fullUrlWithQuery(['kategori' => $item->id]) }}"
                                    class="flex items-center gap-3 px-4 py-3 rounded-2xl transition
                    {{ request('kategori') == $item->id ? 'bg-amber-600 text-white shadow-sm font-semibold' : 'text-slate-600 hover:bg-amber-50 hover:text-amber-700' }}">
                                    <i
                                        class="far fa-bookmark text-[18px] w-5 {{ request('kategori') == $item->id ? 'text-white' : '' }}"></i>
                                    <span class="text-[16px]">{{ $item->nama_kategori }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>

                <!-- Content Buku -->
                <div class="lg:col-span-9">
                    <!-- Search Box -->
                    <div class="bg-white rounded-[28px] border border-gray-200 shadow-sm p-5 md:p-6">
                        <div class="flex flex-col md:flex-row gap-4 md:items-center md:justify-end">
                            <div class="relative w-full md:max-w-[700px]">
                                <i
                                    class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
                                <input type="text" placeholder="Cari buku, penulis, ISBN..."
                                    class="w-full h-[58px] bg-[#f6f7f9] rounded-2xl pl-14 pr-5 text-[17px] outline-none border border-gray-200 focus:border-amber-400">
                            </div>

                            <div class="w-full md:w-[140px]">
                                <button
                                    class="w-full h-[58px] bg-amber-600 hover:bg-amber-700 text-white rounded-2xl text-[18px] font-semibold transition">
                                    Cari
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Result Heading -->
                    @php
                        $namaKategoriAktif =
                            $kategori->firstWhere('id', request('kategori'))->nama_kategori ?? 'Semua Buku';
                    @endphp

                    <div class="mt-9 mb-7 flex items-center justify-between gap-4">
                        <h3 class="text-[18px] md:text-[20px] text-slate-500">
                            Hasil dari <span class="font-bold text-slate-800">"{{ $namaKategoriAktif }}"</span>
                        </h3>
                        <span class="text-sm text-slate-400 hidden sm:inline">
                            {{ count($buku) }} buku ditemukan
                        </span>
                    </div>

                    <!-- Grid Buku -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">
                        @foreach ($buku as $b)
                            <div
                                class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 overflow-hidden">

                                <a href="{{ route('detail-buku', $b->id) }}" class="absolute inset-0 z-10"></a>

                                <div class="relative h-64 bg-black overflow-hidden">
                                    <img src="{{ asset('storage/' . $b->cover) }}" alt="Cover Buku"
                                        class="w-full h-full object-contain p-6 transform group-hover:scale-110 transition duration-500">

                                    <div class="absolute top-4 left-0 z-20">
                                        <span
                                            class="bg-amber-600 text-white text-[10px] font-bold px-3 py-1 rounded-r-full uppercase shadow-md">
                                            {{ $b->RelasiKategori->first()->nama_kategori ?? 'Tanpa Kategori' }}
                                        </span>
                                    </div>

                                    <button type="button"
                                        class="absolute top-4 right-4 z-20 h-9 w-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition shadow-sm focus:outline-none">
                                        <i class="fa-regular fa-bookmark text-lg"></i>
                                    </button>
                                </div>

                                <div class="p-5 flex flex-col min-h-[190px] relative z-20">
                                    <span class="text-amber-700 text-[10px] font-bold tracking-widest uppercase mb-1">
                                        {{ Str::limit($b->penulis, 20, '...') }}
                                    </span>

                                    <h3
                                        class="text-lg font-bold text-gray-900 line-clamp-2 mb-2 group-hover:text-amber-600 transition">
                                        {{ Str::limit($b->judul_buku, 30, '...') }}
                                    </h3>

                                    <div class="flex items-center mb-3 text-amber-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="text-gray-400 text-[11px] ml-2">(2.4k)</span>
                                    </div>

                                    <p class="text-gray-500 text-sm line-clamp-3 mb-4">
                                        {{ Str::limit($b->deskripsi, 100, '...') }}
                                    </p>

                                    <div class="mt-auto flex items-center justify-between pt-2">
                                        <span class="text-xs text-slate-400">Stok : {{ $b->stok }}</span>
                                        <span class="text-sm font-semibold text-amber-600">Lihat Detail</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>

</html>
