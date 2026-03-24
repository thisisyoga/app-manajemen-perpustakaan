<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>{{ config('app.name', 'Perpustakaan Aksara') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#FDFBF9] text-[#3C2A21]">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-[#E5E5E5]">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="relative flex items-center h-[88px]">
                <div class="flex items-center shrink-0">
                    <a href="#" class="flex items-center group">
                        <div class="bg-[#8B5E3C] group-hover:bg-[#6F4E37] p-2.5 rounded-xl transition-colors duration-300">
                            <i class="fas fa-book-open text-[#F5EBE0] text-xl"></i>
                        </div>
                        <span class="ml-3 text-[28px] font-extrabold text-[#8B5E3C] group-hover:text-[#6F4E37] transition-colors duration-300 leading-none">
                            Aksara<span class="text-[#D4A373]">.</span>
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-14">
                    <a href="#" class="text-[#8B5E3C] hover:text-[#D4A373] text-[18px] font-medium transition-colors border-b-2 border-[#D4A373] pb-1">
                        <i class="fas fa-book mr-2"></i> Katalog Buku
                    </a>
                    <a href="{{ route('riwayat') }}" class="text-[#5C4033] hover:text-[#8B5E3C] text-[18px] font-medium transition-colors">
                        <i class="fas fa-history mr-2"></i> Riwayat
                    </a>
                </div>

                <div class="ml-auto flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button" class="flex items-center gap-3 p-1 rounded-full hover:bg-[#F5EBE0]/50 transition-all duration-200 focus:outline-none">
                            <div class="relative">
                                <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-[#D4A373] shadow-sm">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="User" class="h-full w-full object-cover">
                                </div>
                                <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start leading-tight">
                                <span class="text-sm font-bold text-[#3C2A21] group-hover:text-[#8B5E3C] transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-[10px] text-[#8B5E3C]/70 uppercase tracking-wider font-semibold">
                                    {{ Auth::user()->role == 'user' ? 'Member' : 'Admin' }}
                                </span>
                            </div>

                            <i class="fas fa-chevron-down text-xs text-[#D4A373] hidden lg:inline transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-[#F5EBE0] py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-[60]">
                            <div class="px-4 py-3 border-b border-[#F5EBE0] mb-1">
                                <p class="text-xs text-[#D4A373] font-bold uppercase tracking-widest mb-1">Akun Saya</p>
                                <p class="text-sm font-medium text-[#3C2A21] truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="/profile" class="flex items-center px-4 py-2.5 text-sm text-[#5C4033] hover:bg-[#F5EBE0] hover:text-[#8B5E3C] transition-colors">
                                <i class="fas fa-user-circle mr-3 w-5 text-[#D4A373]"></i> My Profile
                            </a>

                            <div class="border-t border-[#F5EBE0] my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center px-4 py-2.5 text-sm text-red-700 hover:bg-red-50 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3 w-5"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>

                    <button id="mobile-menu-button" class="md:hidden p-2 text-[#8B5E3C] hover:text-[#D4A373] rounded-lg hover:bg-[#F5EBE0] transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-[#F5EBE0] shadow-sm">
        <div class="px-4 py-4 space-y-3">
            <a href="#" class="block px-4 py-3 rounded-xl text-base font-medium text-[#5C4033] hover:text-[#8B5E3C] hover:bg-[#F5EBE0]">Home</a>
            <a href="#" class="block px-4 py-3 rounded-xl text-base font-medium text-[#5C4033] hover:text-[#8B5E3C] hover:bg-[#F5EBE0]">Katalog Buku</a>

            <div class="pt-2 space-y-3">
                <div class="flex items-center bg-[#FDFBF9] border border-[#F5EBE0] rounded-xl px-4 h-[48px]">
                    <i class="fas fa-search text-[#D4A373] mr-3 text-sm"></i>
                    <input type="text" placeholder="Cari buku, penulis..." class="bg-transparent outline-none w-full text-[16px] text-[#3C2A21] placeholder:text-[#D4A373]/60">
                </div>
                <button class="w-full bg-[#8B5E3C] hover:bg-[#6F4E37] text-white h-[48px] rounded-xl font-semibold transition">Cari</button>
            </div>
        </div>
    </div>

    <section class="border-b border-[#F5EBE0] bg-[#FDFBF9]">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="pt-16 pb-14 md:pt-20 md:pb-16 lg:pt-24 lg:pb-20">
                <h1 class="text-[46px] md:text-[58px] font-extrabold tracking-tight text-[#3C2A21] leading-[1.08]">
                    Katalog Buku
                </h1>
                <p class="mt-5 text-[20px] md:text-[22px] text-[#5C4033]/80 leading-relaxed max-w-[760px]">
                    Jelajahi katalog buku dan sumber daya kami yang luas.
                </p>
            </div>
        </div>
    </section>

    <section class="pt-10 pb-14 md:pt-12 md:pb-16">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 xl:gap-10">

                <aside class="lg:col-span-3">
                    <div class="bg-white rounded-[28px] border border-[#F5EBE0] shadow-sm p-7 h-full">
                        <div class="flex items-center gap-3 mb-7">
                            <i class="fas fa-filter text-[#D4A373] text-[22px]"></i>
                            <h2 class="text-[22px] font-bold text-[#3C2A21]">Kategori</h2>
                        </div>

                        <div class="relative mb-5">
                            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-[#D4A373]"></i>
                            <input type="text" placeholder="Cari Kategori..." class="w-full h-[52px] bg-[#FDFBF9] rounded-2xl pl-11 pr-4 outline-none border border-[#F5EBE0] focus:border-[#D4A373] text-[16px]">
                        </div>

                        <div class="space-y-2">
                            <a href="{{ url()->current() }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ !request('kategori') ? 'bg-[#8B5E3C] text-[#F5EBE0] shadow-sm font-semibold' : 'text-[#5C4033] hover:bg-[#F5EBE0] hover:text-[#8B5E3C]' }}">
                                <i class="far fa-bookmark text-[18px] w-5"></i>
                                <span class="text-[16px]">Semua Buku</span>
                            </a>

                            @foreach ($kategori as $item)
                                <a href="{{ request()->fullUrlWithQuery(['kategori' => $item->id]) }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl transition {{ request('kategori') == $item->id ? 'bg-[#8B5E3C] text-[#F5EBE0] shadow-sm font-semibold' : 'text-[#5C4033] hover:bg-[#F5EBE0] hover:text-[#8B5E3C]' }}">
                                    <i class="far fa-bookmark text-[18px] w-5"></i>
                                    <span class="text-[16px]">{{ $item->nama_kategori }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>

                <div class="lg:col-span-9">
                    <div class="bg-white rounded-[28px] border border-[#F5EBE0] shadow-sm p-5 md:p-6">
                        <div class="flex flex-col md:flex-row gap-4 md:items-center md:justify-end">
                            <div class="relative w-full md:max-w-[700px]">
                                <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-[#D4A373] text-xl"></i>
                                <input type="text" placeholder="Cari buku, penulis, ISBN..." class="w-full h-[58px] bg-[#FDFBF9] rounded-2xl pl-14 pr-5 text-[17px] outline-none border border-[#F5EBE0] focus:border-[#D4A373]">
                            </div>
                            <div class="w-full md:w-[140px]">
                                <button class="w-full h-[58px] bg-[#8B5E3C] hover:bg-[#6F4E37] text-white rounded-2xl text-[18px] font-semibold transition">Cari</button>
                            </div>
                        </div>
                    </div>

                    @php
                        $namaKategoriAktif = $kategori->firstWhere('id', request('kategori'))->nama_kategori ?? 'Semua Buku';
                    @endphp

                    <div class="mt-9 mb-7 flex items-center justify-between gap-4">
                        <h3 class="text-[18px] md:text-[20px] text-[#5C4033]/70">
                            Hasil dari <span class="font-bold text-[#3C2A21]">"{{ $namaKategoriAktif }}"</span>
                        </h3>
                        <span class="text-sm text-[#D4A373] hidden sm:inline">{{ count($buku) }} buku ditemukan</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-8">
                        @foreach ($buku as $b)
                            <div class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-[#F5EBE0] overflow-hidden">
                                <a href="{{ route('detail-buku', $b->id) }}">
                                    <div class="relative h-64 bg-[#F5EBE0]/30 overflow-hidden">
                                        <img src="{{ asset('storage/' . $b->cover) }}" alt="Cover Buku" class="w-full h-full object-contain p-6 transform group-hover:scale-105 transition duration-500">
                                        <div class="absolute top-4 left-0 z-20">
                                            <span class="bg-[#D4A373] text-white text-[10px] font-bold px-3 py-1 rounded-r-full uppercase shadow-md">
                                                {{ $b->RelasiKategori->first()->nama_kategori ?? 'Tanpa Kategori' }}
                                            </span>
                                        </div>

                                        @php $isBookmarked = in_array($b->id, $koleksi); @endphp
                                        <form action="{{ route('bookmark.store', $b->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="absolute top-4 right-4 z-20 h-9 w-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center transition shadow-sm focus:outline-none {{ $isBookmarked ? 'text-[#D4A373]' : 'text-[#D4A373]/40 hover:text-[#D4A373]' }}">
                                                <i class="{{ $isBookmarked ? 'fa-solid' : 'fa-regular' }} fa-bookmark text-lg"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="p-5 flex flex-col min-h-[190px] relative z-20">
                                        <span class="text-[#D4A373] text-[10px] font-bold tracking-widest uppercase mb-1">
                                            {{ Str::limit($b->penulis, 20, '...') }}
                                        </span>
                                        <h3 class="text-lg font-bold text-[#3C2A21] line-clamp-2 mb-2 group-hover:text-[#8B5E3C] transition">
                                            {{ Str::limit($b->judul_buku, 30, '...') }}
                                        </h3>
                                        <div class="flex items-center mb-3 text-[#D4A373] text-xs">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span class="text-[#5C4033]/50 text-[11px] ml-2">(2.4k)</span>
                                        </div>
                                        <p class="text-[#5C4033]/80 text-sm line-clamp-3 mb-4">
                                            {{ Str::limit($b->deskripsi, 100, '...') }}
                                        </p>
                                        <div class="mt-auto flex items-center justify-between pt-2">
                                            <span class="text-xs text-[#D4A373] font-semibold">Stok : {{ $b->stok }}</span>
                                        </div>
                                    </div>
                                </a>
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