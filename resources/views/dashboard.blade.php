<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>Aksara - Perpustakaan Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom Smooth Transitions */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #C99B66; /* Caramel Hex */
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        @keyframes wiggle {
            0%, 100% { transform: scale(1.1) translate(0, 0); }
            50% { transform: scale(1.15) translate(-10px, -10px); }
        }

        .animate-slow-zoom {
            animation: wiggle 20s ease infinite;
        }
    </style>
</head>

<body class="bg-beige text-DarkChocolate font-sans">

    <nav class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-Caramel/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex items-center">
                    <a href="/" class="flex items-center group">
                        <img src="{{ asset('image/logo.png') }}" alt="Aksara Logo"
                            class="h-20 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-2">
                    <a href="#"
                        class="nav-link text-Chocolate hover:text-MediumBrown px-4 py-2 rounded-lg transition-colors">
                        Beranda
                    </a>
                    <a href="#about"
                        class="nav-link text-Chocolate hover:text-MediumBrown px-4 py-2 rounded-lg transition-colors">
                        Tentang
                    </a>
                    <a href="#keunggulan"
                        class="nav-link text-Chocolate hover:text-MediumBrown px-4 py-2 rounded-lg transition-colors">
                        Keunggulan
                    </a>
                    <a href="#koleksi"
                        class="nav-link text-Chocolate hover:text-MediumBrown px-4 py-2 rounded-lg transition-colors">
                        Koleksi
                    </a>
                </div>

                <div class="flex items-center">
                    <a href="{{ route('login') }}"
                        class="flex items-center bg-Chocolate hover:bg-MediumBrown text-beige px-6 py-2.5 rounded-full font-semibold transition-all duration-300 shadow-md hover:shadow-lg active:scale-95">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <main class="flex flex-col">
        <section class="relative min-h-[90vh] flex items-center overflow-hidden">
            <div class="absolute inset-0">
                <img src="{{ asset('image/background.jpg') }}" class="w-full h-full object-cover animate-slow-zoom"
                    alt="Background">
                <div class="absolute inset-0 bg-DarkChocolate/40 backdrop-blur-[1px]"></div>
            </div>

            <div class="relative z-10 px-8 md:px-16 w-full max-w-7xl mx-auto">
                <div class="max-w-3xl">
                    <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight mb-6">
                        Temukan Dunia di Balik <br>
                        <span class="text-Caramel">Setiap Aksara</span>
                    </h1>
                    <p class="text-lg md:text-xl text-beige/90 mb-10 leading-relaxed max-w-xl">
                        Menjelajahi cakrawala tanpa batas melalui koleksi buku pilihan. Mulailah petualangan literasi
                        Anda dengan kenyamanan teknologi modern.
                    </p>
                    <div class="flex flex-wrap gap-5">
                        <a href="#koleksi"
                            class="bg-Caramel hover:bg-MediumBrown text-white font-bold py-4 px-10 rounded-full transition-all shadow-lg hover:-translate-y-1">
                            Jelajahi Buku
                        </a>
                        <a href="#about"
                            class="bg-transparent border-2 border-beige text-beige hover:bg-beige hover:text-Chocolate font-bold py-4 px-10 rounded-full transition-all shadow-lg">
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-beige" id="about">
            <div class="px-8 md:px-16 max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-16">
                    <div class="w-full md:w-1/2 relative">
                        <div class="relative z-10">
                            <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=800&q=80"
                                alt="Perpustakaan Aksara" class="rounded-3xl shadow-2xl border-4 border-white">
                        </div>
                        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-Caramel/20 rounded-full blur-2xl"></div>
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-Chocolate/10 rounded-full blur-2xl"></div>
                    </div>

                    <div class="w-full md:w-1/2">
                        <h2 class="text-Caramel font-bold tracking-widest uppercase mb-3">Tentang Aksara</h2>
                        <h3 class="text-4xl font-bold text-Chocolate mb-6 leading-tight">
                            Membawa Perpustakaan Konvensional ke Era Digital
                        </h3>
                        <p class="text-DarkChocolate/80 mb-6 text-lg leading-relaxed">
                            Aksara adalah solusi modern untuk pecinta literasi yang menghargai sensasi membaca buku
                            fisik namun mendambakan kemudahan akses digital.
                        </p>

                        <div class="grid grid-cols-2 gap-8 border-t border-Chocolate/10 pt-8">
                            <div>
                                <span class="block text-4xl font-black text-Chocolate">1000+</span>
                                <span class="text-sm text-MediumBrown font-bold uppercase tracking-widest">Koleksi Buku</span>
                            </div>
                            <div>
                                <span class="block text-4xl font-black text-Chocolate">5000+</span>
                                <span class="text-sm text-MediumBrown font-bold uppercase tracking-widest">Anggota</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-white" id="keunggulan">
            <div class="px-8 md:px-16 max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-Chocolate mb-4">Fitur Unggulan</h2>
                    <div class="w-24 h-1 bg-Caramel mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="p-8 bg-beige/30 rounded-3xl border border-Caramel/10 hover:border-Caramel transition-all duration-300 group">
                        <div class="w-16 h-16 bg-Chocolate text-beige rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-Chocolate mb-3">Pencarian Cerdas</h3>
                        <p class="text-DarkChocolate/70">Temukan lokasi buku tepat di raknya melalui navigasi digital kami.</p>
                    </div>

                    <div class="p-8 bg-beige/30 rounded-3xl border border-Caramel/10 hover:border-Caramel transition-all duration-300 group">
                        <div class="w-16 h-16 bg-Chocolate text-beige rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-couch"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-Chocolate mb-3">Ruang Nyaman</h3>
                        <p class="text-DarkChocolate/70">Area baca eksklusif dengan atmosfer tenang dan pencahayaan hangat.</p>
                    </div>

                    <div class="p-8 bg-beige/30 rounded-3xl border border-Caramel/10 hover:border-Caramel transition-all duration-300 group">
                        <div class="w-16 h-16 bg-Chocolate text-beige rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-Chocolate mb-3">Pinjam Kilat</h3>
                        <p class="text-DarkChocolate/70">Sistem peminjaman mandiri hanya dengan memindai kode QR buku.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="koleksi" class="py-24 bg-beige/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-Chocolate mb-4">Koleksi Terpopuler</h2>
                    <p class="text-MediumBrown font-medium max-w-2xl mx-auto">
                        Temukan buku pilihan dengan tampilan yang lebih rapi, elegan, dan nyaman dijelajahi.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($buku as $b)
                        <div class="group bg-white rounded-3xl border border-Caramel/20 shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                            <a href="#" class="block h-full">
                                <div class="relative h-72 bg-gradient-to-b from-beige/50 to-beige flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('storage/' . $b->cover) }}" alt="Cover Buku" onerror="this.src='https://placehold.co/400x600/5D3A2E/FFF?text=No+Cover'"
                                        class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute top-4 left-0">
                                        <span class="bg-Chocolate text-beige text-[10px] font-bold px-4 py-1.5 rounded-r-full uppercase">
                                            {{ $b->RelasiKategori->first()->nama_kategori ?? 'Tanpa Kategori' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="p-5 flex flex-col min-h-[220px]">
                                    <p class="text-Caramel text-[11px] font-semibold tracking-[0.18em] uppercase mb-2">
                                        {{ Str::limit($b->penulis, 24, '...') }}
                                    </p>
                                    <h3 class="text-lg font-bold text-Chocolate leading-snug line-clamp-2 mb-3 group-hover:text-MediumBrown transition">
                                        {{ Str::limit($b->judul_buku, 45, '...') }}
                                    </h3>
                                    <div class="flex items-center gap-1 mb-3 text-Caramel text-xs">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <span class="text-DarkChocolate/50 text-[11px] ml-2">(2.4k)</span>
                                    </div>
                                    <p class="text-DarkChocolate/75 text-sm leading-relaxed line-clamp-3 mb-5">
                                        {{ Str::limit($b->deskripsi, 110, '...') }}
                                    </p>
                                    
                                         <div class="flex items-center gap-1.5">
                                        <i class="fas fa-layer-group @if ($b->stok != 0) text-green-600 @else text-red-600 @endif text-[10px]"></i>
                                        <span class="text-[11px] font-bold text-MediumBrown/80">Stok: {{ $b->stok }}</span>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-20 bg-Chocolate relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-Caramel/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-MediumBrown/20 rounded-full -ml-32 -mb-32 blur-3xl"></div>

            <div class="container mx-auto px-8 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-4xl md:text-5xl font-bold mb-8 text-beige">Siap Memulai Petualangan?</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex items-center text-left border border-white/10">
                            <div class="w-12 h-12 bg-Caramel rounded-full flex items-center justify-center text-white mr-4">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div>
                                <p class="text-beige/60 text-sm">WhatsApp</p>
                                <p class="text-beige font-bold">+62 812-3456-789</p>
                            </div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl flex items-center text-left border border-white/10">
                            <div class="w-12 h-12 bg-Caramel rounded-full flex items-center justify-center text-white mr-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-beige/60 text-sm">Email</p>
                                <p class="text-beige font-bold">halo@aksara.id</p>
                            </div>
                        </div>
                    </div>
                    <a href="/register"
                        class="bg-beige text-Chocolate hover:bg-Caramel hover:text-white font-black py-5 px-12 rounded-full text-lg transition-all shadow-2xl inline-block">
                        DAFTAR KEANGGOTAAN GRATIS
                    </a>
                </div>
            </div>
        </section>

        <footer class="bg-DarkChocolate text-beige/80 py-16 border-t border-white/5">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                    <div class="col-span-1 md:col-span-1">
                        <h3 class="text-3xl font-bold mb-6 text-white">Aksara<span class="text-Caramel">.</span></h3>
                        <p class="leading-relaxed mb-6 text-beige/60">
                            Membangun peradaban melalui literasi digital yang inklusif dan modern.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-Caramel hover:text-white transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-Caramel hover:text-white transition"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Layanan</h3>
                        <ul class="space-y-4">
                            <li><a href="#" class="hover:text-Caramel transition">Peminjaman Buku</a></li>
                            <li><a href="#" class="hover:text-Caramel transition">Ruang Private</a></li>
                            <li><a href="#" class="hover:text-Caramel transition">Event Literasi</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Jam Buka</h3>
                        <ul class="space-y-3 text-sm">
                            <li class="flex justify-between border-b border-white/5 pb-2"><span>Sen - Jum</span> <span>08:00 - 20:00</span></li>
                            <li class="flex justify-between border-b border-white/5 pb-2"><span>Sabtu</span> <span>09:00 - 17:00</span></li>
                            <li class="flex justify-between text-Caramel"><span>Minggu</span> <span>Tutup</span></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-white font-bold mb-6 uppercase tracking-widest text-sm">Lokasi</h3>
                        <p class="text-sm leading-relaxed text-beige/60">
                            Jl. Barokah No.06, Wanaherang,<br>
                            Kabupaten Bogor, Jawa Barat 16965
                        </p>
                    </div>
                </div>

                <div class="border-t border-white/5 pt-8 text-center text-sm text-beige/40">
                    <p>&copy; 2026 Aksara. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </main>

</body>

</html>