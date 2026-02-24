@extends('layouts.user')

@section('content')
    <div class="w-full">
        <section class="relative min-h-screen flex items-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent">
                <img src="https://images.unsplash.com/photo-1472173148041-00294f0814a2?auto=format&fit=crop&w=1350&q=80"
                    class="w-full h-full object-cover scale-110 animate-[wiggle_20s_ease_infinite]" alt="Background">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>

            <div class="relative z-10 px-8 md:px-16 w-full">
                <div class="max-w-2xl transition-all duration-1000">
                    <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-4">
                        Temukan Dunia di Balik <br>
                        <span class="text-amber-500">Setiap Aksara</span>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-lg">
                        Menjelajahi cakrawala tanpa batas melalui koleksi buku pilihan. Mulailah petualangan literasi Anda
                        dari sini.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#koleksi"
                            class="bg-amber-600 hover:bg-amber-500 text-white font-bold py-3 px-8 rounded-lg transition">
                            Jelajahi Buku
                        </a>
                        <a href="#about"
                            class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded-lg transition">
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="py-20 bg-gray-50" id="koleksi">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">Koleksi Buku </h2>
                        <p class="text-gray-600 max-w-2xl mx-auto">Jelajahi berbagai koleksi buku digital kami yang dapat
                            diakses kapan saja. </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($buku as $b)
                            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col h-full overflow-hidden">
                                <a href="{{ route('detail-buku', $b->id) }}" class="absolute inset-0 z-10">
                                <div class="relative h-64 bg-black overflow-hidden">
                                    <img src="{{ asset('storage/' . $b->cover) }}" alt="Cover Buku"
                                        class="w-full h-full object-contain p-6 transform group-hover:scale-110 transition duration-500">

                                    <div class="absolute top-4 left-0">
                                        <span
                                            class="bg-amber-600 text-white text-[10px] font-bold px-3 py-1 rounded-r-full uppercase shadow-md">{{ $b->RelasiKategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
                                    </div>

                                    <a href=""
                                        class="absolute top-4 right-4 h-9 w-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition shadow-sm focus:outline-none">
                                        <i class="fa-regular fa-bookmark text-lg"></i>
                                    </a>
                                </div>
                                <div class="p-5 flex flex-col flex-grow">
                                    <span
                                        class="text-amber-700 text-[10px] font-bold tracking-widest uppercase mb-1">{{ Str::limit($b->penulis, 20, '...') }}</span>
                                    <h3
                                        class="text-lg font-bold text-gray-900 line-clamp-2 mb-2 group-hover:text-amber-600 transition">
                                        {{ Str::limit($b->judul_buku, 30, '...') }}</h3>
                                    <div class="flex items-center mb-3 text-amber-400 text-xs">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                        <span class="text-gray-400 text-[11px] ml-2">(2.4k)</span>
                                    </div>
                                    <p class="text-gray-500 text-sm line-clamp-2 mb-6">
                                        {{ Str::limit($b->deskripsi, 100, '...') }}</p>
                                </div>
                                </a>
                            </div>
                            @endforeach
                    </div>

                    <div class="text-center mt-12">
                        <a href="#koleksi"
                            class="inline-block bg-amber-500 hover:bg-amber-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                            Lihat Semua Koleksi
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-12">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                    <div>
                        <h3 class="text-xl font-bold mb-4 text-amber-500">Aksara.</h3>
                        <p class="text-gray-400 mb-4">Ruang baca modern yang menjembatani ilmu pengetahuan fisik dengan
                            kemudahan teknologi digital.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-amber-500 transition"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-400 hover:text-amber-500 transition"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-400 hover:text-amber-500 transition"><i
                                    class="fab fa-twitter"></i></a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold mb-4">Layanan</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><a href="#" class="hover:text-white transition">Peminjaman Buku</a></li>
                            <li><a href="#" class="hover:text-white transition">Ruang Baca Private</a></li>
                            <li><a href="#" class="hover:text-white transition">Donasi Buku</a></li>
                            <li><a href="#" class="hover:text-white transition">Event Literasi</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold mb-4">Jam Operasional</h3>
                        <ul class="space-y-2 text-gray-400 text-sm">
                            <li class="flex justify-between"><span>Senin - Jumat:</span> <span>08:00 - 20:00</span></li>
                            <li class="flex justify-between"><span>Sabtu:</span> <span>09:00 - 17:00</span></li>
                            <li class="flex justify-between text-red-400"><span>Minggu:</span> <span>Tutup</span></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold mb-4">Lokasi Kami</h3>
                        <p class="text-gray-400 text-sm">
                            Jl. Barokah No.06, Wanaherang,<br>
                            Kabupaten Bogor, Jawa Barat 16965
                        </p>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-8">
                    <p class="text-gray-500 text-center">&copy; 2026 Aksara. Membangun Negeri Melalui Membaca.</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
