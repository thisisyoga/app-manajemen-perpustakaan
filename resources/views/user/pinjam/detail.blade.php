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

<body class="font-sans antialiased bg-[#F5E8C9]/20 text-DarkChocolate">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-beige/30">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="relative flex items-center h-[88px]">
                <div class="flex items-center shrink-0">
                    <a href="#" class="flex items-center group">
                        <div class="bg-Chocolate group-hover:bg-MediumBrown p-2.5 rounded-xl transition-colors duration-300">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <span class="ml-3 text-[28px] font-extrabold text-Chocolate group-hover:text-MediumBrown transition-colors duration-300 leading-none">
                            Aksara.
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-14">
                    <a href="{{ route('MDU') }}" class="text-DarkChocolate hover:text-Chocolate text-[18px] font-medium transition-colors">
                        <i class="fas fa-book mr-2 text-Caramel"></i> Katalog Buku
                    </a>
                    <a href="{{ route('riwayat') }}" class="text-DarkChocolate hover:text-Chocolate text-[18px] font-medium transition-colors">
                        <i class="fas fa-history mr-2 text-Caramel"></i> Riwayat
                    </a>
                </div>

                <div class="ml-auto flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button" class="flex items-center gap-3 p-1 rounded-full hover:bg-beige/10 transition-all duration-200 focus:outline-none">
                            <div class="relative">
                                <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-Caramel shadow-sm">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="User" class="h-full w-full object-cover">
                                </div>
                                <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start leading-tight">
                                <span class="text-sm font-bold text-DarkChocolate group-hover:text-Chocolate transition-colors uppercase tracking-tight">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-[10px] text-MediumBrown uppercase tracking-wider font-bold">
                                    {{ Auth::user()->role == 'user' ? 'Member' : 'Admin' }}
                                </span>
                            </div>

                            <i class="fas fa-chevron-down text-xs text-Caramel hidden lg:inline transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-beige/20 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-[60]">
                            <div class="px-4 py-3 border-b border-beige/10 mb-1">
                                <p class="text-[10px] text-MediumBrown font-bold uppercase tracking-widest mb-1">Akun Saya</p>
                                <p class="text-sm font-medium text-DarkChocolate truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="/profile" class="flex items-center px-4 py-2.5 text-sm text-DarkChocolate hover:bg-beige/20 hover:text-Chocolate transition-colors">
                                <i class="fas fa-user-circle mr-3 w-5 text-Caramel"></i> My Profile
                            </a>

                            <div class="border-t border-beige/10 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center px-4 py-2.5 text-sm text-red-700 hover:bg-red-50 transition-colors font-medium">
                                    <i class="fas fa-sign-out-alt mr-3 w-5"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>

                    <button id="mobile-menu-button" class="md:hidden p-2 text-Chocolate hover:text-MediumBrown rounded-lg hover:bg-beige/20 transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-b border-beige/20 shadow-sm">
        <div class="px-4 py-4 space-y-3">
            <a href="#" class="block px-4 py-3 rounded-xl text-base font-medium text-DarkChocolate hover:text-Chocolate hover:bg-beige/20">Home</a>
            <a href="#" class="block px-4 py-3 rounded-xl text-base font-medium text-DarkChocolate hover:text-Chocolate hover:bg-beige/20">Katalog Buku</a>
            
            <div class="pt-2 space-y-3">
                <div class="flex items-center bg-beige/10 rounded-xl px-4 h-[48px] border border-beige/30">
                    <i class="fas fa-search text-MediumBrown mr-3 text-sm"></i>
                    <input type="text" placeholder="Cari buku..." class="bg-transparent outline-none w-full text-[16px] text-DarkChocolate placeholder:text-MediumBrown/50">
                </div>
                <button class="w-full bg-Chocolate hover:bg-MediumBrown text-white h-[48px] rounded-xl font-semibold transition shadow-md shadow-Chocolate/20">Cari</button>
            </div>
        </div>
    </div>

    <main class="max-w-6xl mx-auto p-6 lg:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white p-4 rounded-3xl shadow-xl shadow-Chocolate/5 border border-beige/30">
                    <img src="{{ asset('storage/' . $pinjam->cover) }}" class="w-full aspect-[3/4] object-cover rounded-2xl shadow-lg" alt="Cover Buku">
                </div>

                <div class="space-y-3">
                    <a href="{{ route('pinjam.create', $pinjam->id) }}" class="block">
                        <button class="w-full bg-Chocolate text-white font-bold py-4 rounded-2xl hover:bg-MediumBrown transition shadow-lg shadow-Chocolate/20 active:scale-[0.98]">
                            Pinjam Buku
                        </button>
                    </a>
                    <div class="flex gap-3">
                        <a href="{{ route('MDU') }}" class="flex-1 flex justify-center items-center gap-2 border border-beige rounded-xl py-3 text-sm font-bold text-MediumBrown hover:bg-white hover:border-Chocolate transition">
                            <i class="fas fa-arrow-left text-xs"></i> Kembali
                        </a>
                        <button class="flex-1 flex justify-center items-center gap-2 border border-beige rounded-xl py-3 text-sm font-bold text-MediumBrown hover:bg-white hover:text-red-500 transition">
                            <i class="fas fa-heart"></i> Favorit
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="mb-8">
                    <span class="text-Chocolate text-[10px] font-bold px-4 py-1.5 bg-beige rounded-full uppercase tracking-widest border border-Caramel/20">
                        Kategori: 
                        @foreach ($pinjam->RelasiKategori as $kat)
                            {{ $kat->nama_kategori }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </span>
                    <h1 class="text-4xl font-extrabold text-DarkChocolate mt-6 leading-tight">{{ $pinjam->judul_buku }}</h1>
                    <p class="text-MediumBrown mt-2 text-lg italic font-medium">Penulis: {{ $pinjam->penulis }}</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-10">
                    <div class="p-5 bg-white border border-beige/50 rounded-2xl text-center shadow-sm">
                        <p class="text-[10px] text-MediumBrown font-bold uppercase tracking-widest mb-1">Terbit</p>
                        <p class="text-xl font-bold text-Chocolate">{{ $pinjam->tahun_terbit }}</p>
                    </div>
                    <div class="p-5 bg-white border border-beige/50 rounded-2xl text-center shadow-sm">
                        <p class="text-[10px] text-MediumBrown font-bold uppercase tracking-widest mb-1">Stok</p>
                        <p class="text-xl font-bold text-Chocolate">{{ $pinjam->stok }}</p>
                    </div>
                    <div class="p-5 bg-white border border-beige/50 rounded-2xl text-center shadow-sm">
                        <p class="text-[10px] text-MediumBrown font-bold uppercase tracking-widest mb-1">Rating</p>
                        <p class="text-xl font-bold text-yellow-500"><i class="fas fa-star mr-1"></i> 4.5/5</p>
                    </div>
                </div>

                <div class="flex border-b border-beige/40 gap-8 mb-6">
                    <button id="btn-sinopsis" class="pb-4 border-b-2 border-Chocolate text-Chocolate font-bold text-lg transition-all">
                        Sinopsis
                    </button>
                    <button id="btn-data" class="pb-4 border-b-2 border-transparent text-MediumBrown/60 font-bold text-lg hover:text-Chocolate transition-all">
                        Data Buku
                    </button>
                </div>

                <div id="box-sinopsis" class="block">
                    <p class="text-DarkChocolate/80 leading-relaxed text-lg">
                        {{ $pinjam->deskripsi }}
                    </p>
                </div>

                <div id="box-data" class="hidden">
                    <div class="bg-white rounded-2xl border border-beige/30 overflow-hidden">
                        <ul class="divide-y divide-beige/20 font-medium">
                            <li class="flex justify-between p-4 px-6 text-DarkChocolate">
                                <span class="text-MediumBrown">Penerbit</span>
                                <b>{{ $pinjam->penerbit }}</b>
                            </li>
                            <li class="flex justify-between p-4 px-6 text-DarkChocolate">
                                <span class="text-MediumBrown">ISBN</span>
                                <b>{{ $pinjam->isbn }}</b>
                            </li>
                            <li class="flex justify-between p-4 px-6 text-DarkChocolate">
                                <span class="text-MediumBrown">Tahun Terbit</span>
                                <b>{{ $pinjam->tahun_terbit }}</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const sBtn = document.getElementById('btn-sinopsis');
        const dBtn = document.getElementById('btn-data');
        const sBox = document.getElementById('box-sinopsis');
        const dBox = document.getElementById('box-data');

        function setActive(activeBtn, inactiveBtn, activeBox, inactiveBox) {
            activeBtn.classList.add('border-Chocolate', 'text-Chocolate');
            activeBtn.classList.remove('border-transparent', 'text-MediumBrown/60');

            inactiveBtn.classList.remove('border-Chocolate', 'text-Chocolate');
            inactiveBtn.classList.add('border-transparent', 'text-MediumBrown/60');

            activeBox.classList.remove('hidden');
            inactiveBox.classList.add('hidden');
        }

        sBtn.onclick = () => setActive(sBtn, dBtn, sBox, dBox);
        dBtn.onclick = () => setActive(dBtn, sBtn, dBox, sBox);

        // Mobile Menu Toggle
        const menuBtn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        menuBtn.onclick = () => menu.classList.toggle('hidden');
    </script>
</body>
</html>