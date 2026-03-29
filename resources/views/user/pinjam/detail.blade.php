<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>{{ $pinjam->judul_buku }} - Aksara</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&family=lora:wght@500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
        }

        .font-serif {
            font-family: 'Lora', serif;
        }
    </style>
</head>

<body class="antialiased bg-[#FAF9F6] text-DarkChocolate/90">

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
                        @if (request()->routeIs('riwayat') )
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-Chocolate rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('favorit') }}"
                        class="relative py-1 text-sm font-bold uppercase tracking-widest {{ request()->routeIs('favorit') ? 'text-Chocolate' : 'text-MediumBrown/60 hover:text-Chocolate' }} transition-colors">
                        <i class="fas fa-bookmark"></i> Favorit
                        @if (request()->routeIs('favorit') )
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
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left flex items-center px-5 py-3 text-sm text-red-500 hover:bg-red-50 font-bold transition-colors">
                                    <i class="fas fa-power-off mr-3 text-xs"></i> Keluar Akun
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-10 lg:py-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-4 lg:sticky lg:top-24 space-y-6">
                <div class="bg-white p-3 rounded-2xl shadow-md border border-beige/40">
                    <div class="overflow-hidden rounded-xl aspect-[3/4.2]">
                        <img src="{{ asset('storage/' . $pinjam->cover) }}" class="w-full h-full object-cover"
                            alt="{{ $pinjam->judul_buku }}">
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <a href="{{ route('pinjam.create', $pinjam->id) }}" class="w-full">
                        <button
                            class="w-full bg-Chocolate text-white h-12 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-DarkChocolate transition-all shadow-lg shadow-Chocolate/10 active:scale-[0.98]">
                            Pinjam Sekarang
                        </button>
                    </a>
                    <div class="flex gap-2">
                        <a href="{{ route('MDU') }}"
                            class="flex-1 flex justify-center items-center h-11 border border-beige rounded-xl text-[11px] font-bold text-MediumBrown hover:bg-white transition-all">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        @php $isBookmarked = in_array($pinjam->id, $koleksi); @endphp
                        <form action="{{ route('bookmark.store', $pinjam->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-11 h-11 flex justify-center items-center border border-beige rounded-xl text-MediumBrown hover:text-rose-500 transition-all {{ $isBookmarked ? 'text-Chocolate' : 'text-Caramel/30 hover:text-Chocolate' }}">
                                <i class="{{ $isBookmarked ? 'fa-solid' : 'fa-regular' }} fa-bookmark"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8">
                <header class="mb-8">
                    <div class="flex gap-1.5 mb-4">
                        @foreach ($pinjam->RelasiKategori as $kat)
                            <span
                                class="text-[9px] font-bold px-3 py-1 bg-beige/30 text-Chocolate rounded-md uppercase tracking-wider border border-Caramel/5">
                                {{ $kat->nama_kategori }}
                            </span>
                        @endforeach
                    </div>

                    <h1 class="text-3xl font-serif font-bold text-DarkChocolate leading-tight mb-2">
                        {{ $pinjam->judul_buku }}
                    </h1>

                    <p class="text-MediumBrown text-base font-medium">
                        Penulis: <span class="text-DarkChocolate font-semibold">{{ $pinjam->penulis }}</span>
                    </p>
                </header>

                <div class="flex flex-wrap gap-4 mb-10">
                    <div class="flex items-center gap-3 px-4 py-2 bg-white border border-beige/40 rounded-xl shadow-sm">
                        <i class="fas fa-calendar-alt text-Chocolate text-sm"></i>
                        <div>
                            <p class="text-[9px] text-MediumBrown/60 uppercase font-black tracking-tighter">Tahun</p>
                            <p class="text-xs font-bold">{{ $pinjam->tahun_terbit }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2 bg-white border border-beige/40 rounded-xl shadow-sm">
                        <i class="fas fa-layer-group text-Chocolate text-sm"></i>
                        <div>
                            <p class="text-[9px] text-MediumBrown/60 uppercase font-black tracking-tighter">Stok</p>
                            <p class="text-xs font-bold">{{ $pinjam->stok }} Buku</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 px-4 py-2 bg-white border border-beige/40 rounded-xl shadow-sm">
                        <i class="fas fa-star text-amber-400 text-sm"></i>
                        <div>
                            <p class="text-[9px] text-MediumBrown/60 uppercase font-black tracking-tighter">Rating</p>
                            <p class="text-xs font-bold">4.8 / 5.0</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex border-b border-beige/40 gap-8">
                        <button id="btn-sinopsis"
                            class="pb-3 border-b-2 border-Chocolate text-Chocolate font-bold uppercase tracking-widest text-[10px] transition-all">
                            Sinopsis
                        </button>
                        <button id="btn-data"
                            class="pb-3 border-b-2 border-transparent text-MediumBrown/40 font-bold uppercase tracking-widest text-[10px] hover:text-Chocolate transition-all">
                            Informasi Detail
                        </button>
                    </div>

                    <div id="box-sinopsis" class="animate-fade-in block">
                        <p class="text-DarkChocolate/70 leading-relaxed text-sm lg:text-base font-medium">
                            {{ $pinjam->deskripsi }}
                        </p>
                    </div>

                    <div id="box-data" class="hidden animate-fade-in">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div
                                class="flex justify-between items-center p-3 bg-white rounded-xl border border-beige/30 shadow-sm">
                                <span
                                    class="text-[10px] font-bold text-MediumBrown uppercase tracking-wider">Penerbit</span>
                                <span class="text-[11px] font-black text-DarkChocolate">{{ $pinjam->penerbit }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white rounded-xl border border-beige/30 shadow-sm">
                                <span
                                    class="text-[10px] font-bold text-MediumBrown uppercase tracking-wider">ISBN</span>
                                <span class="text-[11px] font-black text-DarkChocolate">{{ $pinjam->isbn }}</span>
                            </div>
                            <div
                                class="flex justify-between items-center p-3 bg-white rounded-xl border border-beige/30 shadow-sm">
                                <span class="text-[10px] font-bold text-MediumBrown uppercase tracking-wider">Tahun
                                    Terbit</span>
                                <span
                                    class="text-[11px] font-black text-DarkChocolate">{{ $pinjam->tahun_terbit }}</span>
                            </div>
                        </div>
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
            activeBtn.classList.remove('border-transparent', 'text-MediumBrown/40');
            inactiveBtn.classList.remove('border-Chocolate', 'text-Chocolate');
            inactiveBtn.classList.add('border-transparent', 'text-MediumBrown/40');

            activeBox.classList.remove('hidden');
            inactiveBox.classList.add('hidden');
        }

        sBtn.onclick = () => setActive(sBtn, dBtn, sBox, dBox);
        dBtn.onclick = () => setActive(dBtn, sBtn, dBox, sBox);
    </script>
</body>

</html>
