<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak - 403</title>
    <!-- Pastikan file CSS hasil compile Tailwind Anda sudah terhubung -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-beige font-sans flex items-center justify-center min-h-screen p-6">

    <div class="max-w-md w-full text-center">
        <!-- Ikon atau Ilustrasi Sederhana -->
        <div class="mb-8">
            <svg class="mx-auto h-24 w-24 text-Chocolate" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>

        <!-- Pesan Error -->
        <h1 class="text-6xl font-bold text-DarkChocolate mb-4">403</h1>
        <h2 class="text-2xl font-semibold text-Chocolate mb-4">Akses Ditolak!</h2>
        <p class="text-MediumBrown mb-8 leading-relaxed">
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. 
            Silakan hubungi administrator jika Anda merasa ini adalah kesalahan.
        </p>

        <!-- Tombol Navigasi -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/') }}" 
               class="px-6 py-3 bg-Chocolate text-beige rounded-lg font-medium hover:bg-MediumBrown transition duration-300 shadow-md">
                Kembali ke Beranda
            </a>
            <a href="javascript:history.back()" 
               class="px-6 py-3 border-2 border-Caramel text-Chocolate rounded-lg font-medium hover:bg-Caramel hover:text-white transition duration-300">
                Kembali Sebelumnya
            </a>
        </div>

        <!-- Footer Kecil -->
        <div class="mt-12">
            <p class="text-sm text-Caramel">
                &copy; {{ date('Y') }} - Aksara Perpustakaan. Semua hak dilindungi.
            </p>
        </div>
    </div>

</body>
</html>