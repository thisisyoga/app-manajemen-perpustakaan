@extends('layouts.admin')

@section('content')
    <div class="min-h-screen px-4 py-12">
        <div class="max-w-5xl mx-auto">

            <div class="grid md:grid-cols-3 gap-8">

                <div class="group bg-white rounded-[32px] border border-beige/40 p-8 shadow-sm hover:shadow-xl hover:shadow-Chocolate/5 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 text-beige/10 group-hover:text-Chocolate/5 transition-colors duration-500 group-hover:scale-110">
                        <i class="fas fa-user-shield text-8xl"></i>
                    </div>
                    
                    <div class="w-14 h-14 bg-beige/10 text-Chocolate rounded-2xl flex items-center justify-center mb-6 ">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                    
                    <h3 class="text-lg font-serif font-bold text-DarkChocolate mb-3">Data Petugas</h3>
                    <p class="text-xs text-DarkChocolate mb-8 leading-relaxed">
                        Rekapitulasi seluruh akun pengelola, mencakup kredensial akses dan informasi kontak administratif.
                    </p>
                    
                    <a href="{{ route('export.pdf', 'petugas') }}"
                        class="flex items-center justify-center w-full px-6 py-3 bg-white border border-beige/60 text-[11px] font-black uppercase tracking-widest rounded-xl text-DarkChocolate hover:bg-Chocolate hover:text-white hover:border-Chocolate transition-all duration-300 shadow-sm active:scale-95">
                        <i class="fas fa-file-pdf mr-2"></i> PDF Petugas
                    </a>
                </div>

                <div class="group bg-white rounded-[32px] border border-beige/40 p-8 shadow-sm hover:shadow-xl hover:shadow-Chocolate/5 transition-all duration-500 relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 text-beige/10 group-hover:text-Chocolate/5 transition-colors duration-500 group-hover:scale-110">
                        <i class="fas fa-users text-8xl"></i>
                    </div>

                    <div class="w-14 h-14 bg-beige/10 text-Chocolate rounded-2xl flex items-center justify-center mb-6 ">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    
                    <h3 class="text-lg font-serif font-bold text-DarkChocolate mb-3">Data Anggota</h3>
                    <p class="text-xs text-DarkChocolate mb-8 leading-relaxed">
                        Daftar lengkap pelanggan aktif. Cocok untuk audit pertumbuhan pengguna bulanan perpustakaan.
                    </p>
                    
                    <a href="{{ route('export.pdf', 'user') }}"
                        class="flex items-center justify-center w-full px-6 py-3 bg-white border border-beige/60 text-[11px] font-black uppercase tracking-widest rounded-xl text-DarkChocolate hover:bg-Chocolate hover:text-white hover:border-Chocolate transition-all duration-300 shadow-sm active:scale-95">
                        <i class="fas fa-file-pdf mr-2"></i> PDF Anggota
                    </a>
                </div>

                <div class="group bg-white rounded-[32px] border border-Chocolate/20 p-8 shadow-sm hover:shadow-xl hover:shadow-Chocolate/10 transition-all duration-500 relative overflow-hidden">

                    <div class="w-14 h-14 bg-beige/10 text-Chocolate rounded-2xl flex items-center justify-center mb-6 ">
                        <i class="fas fa-book text-xl"></i>
                    </div>
                    
                    <h3 class="text-lg font-serif font-bold text-DarkChocolate mb-3">Laporan Peminjaman</h3>
                    <p class="text-xs text-DarkChocolate mb-8 leading-relaxed">
                        Arsip transaksi buku yang telah tuntas. Laporan ini mencakup durasi pinjam dan status pengembalian.
                    </p>
                    
                    <a href="{{ route('export.peminjaman') }}"
                        class="flex items-center justify-center w-full px-6 py-3 bg-white border border-beige/60 text-[11px] font-black uppercase tracking-widest rounded-xl text-DarkChocolate hover:bg-Chocolate hover:text-white hover:border-Chocolate transition-all duration-300 shadow-sm active:scale-95">
                        <i class="fas fa-file-pdf mr-2"></i> PDF Peminjaman
                    </a>
                </div>
                <div class="group bg-white rounded-[32px] border border-Chocolate/20 p-8 shadow-sm hover:shadow-xl hover:shadow-Chocolate/10 transition-all duration-500 relative overflow-hidden">

                    <div class="w-14 h-14 bg-beige/10 text-Chocolate rounded-2xl flex items-center justify-center mb-6 ">
                        <i class="fas fa-book text-xl"></i>
                    </div>
                    
                    <h3 class="text-lg font-serif font-bold text-DarkChocolate mb-3">Laporan Pengembalian</h3>
                    <p class="text-xs text-DarkChocolate mb-8 leading-relaxed">
                        Arsip transaksi buku yang telah tuntas. Laporan ini mencakup durasi pinjam dan status pengembalian.
                    </p>
                    
                    <a href="{{ route('export.peminjaman.selesai') }}"
                        class="flex items-center justify-center w-full px-6 py-3 bg-white border border-beige/60 text-[11px] font-black uppercase tracking-widest rounded-xl text-DarkChocolate hover:bg-Chocolate hover:text-white hover:border-Chocolate transition-all duration-300 shadow-sm active:scale-95">
                        <i class="fas fa-file-pdf mr-2"></i> PDF Pengembalian
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection