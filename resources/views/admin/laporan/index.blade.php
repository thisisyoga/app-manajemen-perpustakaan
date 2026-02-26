@extends('layouts.admin')

@section('content')
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-4xl w-full">

            <div class="text-center mb-12">
                <h1 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">
                    Pusat Unduhan Laporan
                </h1>
                <p class="mt-4 text-lg text-slate-600">
                    Silakan pilih kategori data di bawah ini untuk mengunduh dokumen dalam format PDF.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">

                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-user-shield text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Data Petugas</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed">
                        Ekspor seluruh daftar akun petugas, termasuk nama lengkap, email, dan alamat yang terdaftar di
                        sistem.
                    </p>
                    <a href="{{ route('export.pdf', 'petugas') }}"
                        class="inline-flex items-center justify-center w-full px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors duration-200">
                        <i class="fas fa-file-pdf mr-2"></i> Download PDF Petugas
                    </a>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Data User / Pelanggan</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed">
                        Ekspor seluruh daftar pengguna umum atau pelanggan yang aktif menggunakan layanan aplikasi saat ini.
                    </p>
                    <a href="{{ route('export.pdf', 'user') }}"
                        class="inline-flex items-center justify-center w-full px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors duration-200">
                        <i class="fas fa-file-pdf mr-2"></i> Download PDF User
                    </a>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-book text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Laporan Peminjaman</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed">
                        Unduh data buku yang sudah selesai dipinjam dan telah dikembalikan ke perpustakaan.
                    </p>
                    <a href="{{ route('export.peminjaman') }}"
                        class="inline-flex items-center justify-center w-full px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors duration-200">
                        <i class="fas fa-file-pdf mr-2"></i> Download Laporan Selesai
                    </a>
                </div>

            </div>

        </div>
    </div>
@endsection
