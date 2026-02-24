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

        <section class="py-20 bg-gray-50" id="about">
            <div class="px-8 md:px-16 container mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/2">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=800&q=80"
                                alt="Perpustakaan Aksara" class="rounded-2xl shadow-2xl">
                            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-amber-500/10 rounded-full -z-10"></div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2">
                        <h2 class="text-amber-600 font-semibold tracking-wide uppercase mb-2">Tentang Aksara</h2>
                        <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 leading-tight">
                            Membawa Perpustakaan Konvensional ke Era Digital
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Aksara adalah solusi modern untuk pecinta literasi yang menghargai sensasi membaca buku fisik.
                            Kami memahami bahwa waktu Anda berharga, itulah sebabnya kami hadir untuk menjembatani kemudahan
                            pencarian digital dengan kenyamanan perpustakaan offline.
                        </p>
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            Melalui aplikasi ini, Anda dapat memantau koleksi kami secara real-time, memesan tempat baca,
                            hingga melakukan peminjaman mandiri tanpa harus mengantre di meja petugas.
                        </p>

                        <div class="grid grid-cols-2 gap-6 border-t border-gray-200 pt-8">
                            <div>
                                <span class="block text-3xl font-bold text-amber-600">1000+</span>
                                <span class="text-sm text-gray-500 uppercase tracking-wider">Koleksi Buku</span>
                            </div>
                            <div>
                                <span class="block text-3xl font-bold text-amber-600">5000+</span>
                                <span class="text-sm text-gray-500 uppercase tracking-wider">Anggota Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white" id="keunggulan">
            <div class="px-8 md:px-16">
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-800">Fitur Unggulan Kami</h2>
                    <p class="text-gray-600 mt-2">Platform Aksara memiliki fitur unggulan yang membuat pengalaman membaca
                        anda berbeda</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-6 bg-gray-50 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div
                            class="w-12 h-12 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-xl mb-4">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Pencarian Cerdas</h3>
                        <p class="text-gray-600 text-sm">Cari posisi buku di rak secara akurat melalui aplikasi sebelum Anda
                            datang ke lokasi.
                        </p>
                    </div>

                    <div class="p-6 bg-gray-50 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div
                            class="w-12 h-12 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-xl mb-4">
                            <i class="fas fa-couch"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Ruang Baca Nyaman</h3>
                        <p class="text-gray-600 text-sm">Fasilitas area baca yang tenang dengan pencahayaan optimal untuk
                            kenyamanan maksimal.
                            fun.</p>
                    </div>

                    <div class="p-6 bg-gray-50 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div
                            class="w-12 h-12 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center text-xl mb-4">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Sistem Pinjam Kilat</h3>
                        <p class="text-gray-600 text-sm">Pinjam buku tanpa antre panjang cukup dengan memindai kode buku
                            melalui sistem kami.</p>
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

                        <div
                            class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col h-full overflow-hidden">
                            <div class="relative h-64 bg-amber-50 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=600"
                                    alt="Filosofi Teras"
                                    class="w-full h-full object-contain p-6 transform group-hover:scale-110 transition duration-500">

                                <div class="absolute top-4 left-0">
                                    <span
                                        class="bg-amber-600 text-white text-[10px] font-bold px-3 py-1 rounded-r-full uppercase shadow-md">Best
                                        Seller</span>
                                </div>

                                <a href="{{ route('login') }}"
                                    class="absolute top-4 right-4 h-9 w-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 transition shadow-sm focus:outline-none">
                                    <i class="fa-regular fa-bookmark text-lg"></i>
                                </a>
                            </div>
                            <div class="p-5 flex flex-col flex-grow">
                                <span class="text-amber-700 text-[10px] font-bold tracking-widest uppercase mb-1">Henry
                                    Manampiring</span>
                                <h3
                                    class="text-lg font-bold text-gray-900 line-clamp-2 mb-2 group-hover:text-amber-600 transition">
                                    Filosofi Teras</h3>
                                <div class="flex items-center mb-3 text-amber-400 text-xs">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="text-gray-400 text-[11px] ml-2">(2.4k)</span>
                                </div>
                                <p class="text-gray-500 text-sm line-clamp-2 mb-6">Panduan praktis filosofi Stoikisme untuk
                                    hidup yang lebih tenang.</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-12">
                        <a href="{{ route('login') }}"
                            class="inline-block bg-amber-500 hover:bg-amber-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1">
                            Lihat Semua Koleksi
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <div class="py-20 bg-amber-500" id="kontak">
            <div class="container mx-auto px-6">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">Siap Memulai Petualangan Literasi Anda?</h2>
                    <p class="text-xl text-white mb-10">Hubungi kami untuk informasi keanggotaan, ketersediaan buku, atau
                        reservasi ruang baca eksklusif.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto">
                        <a href="https://wa.me/628123456789" target="_blank"
                            class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all transform hover:-translate-y-1 flex items-center">
                            <div
                                class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center text-amber-500 text-xl mr-4">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="font-bold text-lg">WhatsApp</h3>
                                <p class="text-gray-600">+62 812-3456-789</p>
                            </div>
                        </a>

                        <a href="mailto:halo@aksara.id" target="_blank"
                            class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-all transform hover:-translate-y-1 flex items-center">
                            <div
                                class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center text-amber-500 text-xl mr-4">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="font-bold text-lg">Email Kami</h3>
                                <p class="text-gray-600">aksara@gmail.com</p>
                            </div>
                        </a>
                    </div>

                    <div class="mt-12">
                        <a href="/register"
                            class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-3 px-8 rounded-lg transition transform hover:-translate-y-1 inline-flex items-center justify-center">
                            <span>Daftar Keanggotaan Gratis</span>
                            <i class="fas fa-user-plus ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
