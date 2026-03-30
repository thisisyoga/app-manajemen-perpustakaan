@extends('layouts.admin')

@section('content')

    @php
        $totalUsers = $user->count() ;
        $totalBuku = $buku->count() ;
        $totalPinjam = $bukudipinjam;
        $totalUlasan = $ulasan->count() ;
    @endphp
    <div class="space-y-10 px-2">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-3xl border border-beige/40 shadow-sm hover:shadow-md transition-shadow">
                <p class="text-[10px] font-black uppercase tracking-widest text-MediumBrown/50">Total Anggota</p>
                <h2 class="text-2xl font-black text-DarkChocolate mt-1">{{ $totalUsers ?? '-' }}</h2>
            </div>

            <div class="bg-white p-5 rounded-3xl border border-beige/40 shadow-sm hover:shadow-md transition-shadow">
                <p class="text-[10px] font-black uppercase tracking-widest text-MediumBrown/50">Total Buku</p>
                <h2 class="text-2xl font-black text-DarkChocolate mt-1">{{ $totalBuku ?? '-' }}</h2>
            </div>

            <div class="bg-white p-5 rounded-3xl border border-beige/40 shadow-sm hover:shadow-md transition-shadow">
                <p class="text-[10px] font-black uppercase tracking-widest text-MediumBrown/50">Buku Dipinjam</p>
                <h2 class="text-2xl font-black text-DarkChocolate mt-1">{{ $totalPinjam ?? '-' }}</h2>
            </div>

            <div class="bg-white p-5 rounded-3xl border border-beige/40 shadow-sm hover:shadow-md transition-shadow">
                <p class="text-[10px] font-black uppercase tracking-widest text-MediumBrown/50">Total Ulasan</p>
                <h2 class="text-2xl font-black text-DarkChocolate mt-1">{{ $totalUlasan ?? '-' }}</h2>
            </div>
        </div>

        <div class="bg-white rounded-[32px] border border-beige/40 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-beige/20 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h3 class="font-serif font-bold text-lg text-DarkChocolate">Data Peminjaman Buku</h3>
                    <p class="text-[10px] text-MediumBrown/60 font-medium">Daftar permintaan peminjaman terbaru yang butuh tindakan.</p>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-beige/5">
                            <th class="p-4 pl-6 text-[10px] font-black uppercase tracking-widest text-MediumBrown/50 border-b border-beige/10">Anggota</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest text-MediumBrown/50 border-b border-beige/10">Buku & ISBN</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest text-MediumBrown/50 border-b border-beige/10">Tgl Pinjam</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest text-MediumBrown/50 border-b border-beige/10">Status</th>
                            <th class="p-4 pr-6 text-[10px] font-black uppercase tracking-widest text-MediumBrown/50 border-b border-beige/10 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-beige/10">
                        @foreach ($pinjam as $p)
                            <tr class="hover:bg-beige/5 transition-colors group">
                                <td class="p-4 pl-6">
                                    <div class="flex items-center gap-3">
                                        <div class="h-8 w-8 rounded-lg bg-Chocolate/10 flex items-center justify-center text-Chocolate font-bold text-[10px]">
                                            {{ strtoupper(substr($p->user->name, 0, 2)) }}
                                        </div>
                                        <p class="text-xs font-bold text-DarkChocolate">{{ $p->user->name }}</p>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <p class="text-xs font-bold text-DarkChocolate leading-tight">{{ $p->buku->judul_buku }}</p>
                                    <p class="text-[10px] text-MediumBrown/60 font-medium mt-0.5">{{ $p->buku->isbn }}</p>
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-medium text-DarkChocolate">{{ \Carbon\Carbon::parse($p->tanggal_peminjaman)->format('d M Y') }}</span>
                                        <span class="text-[9px] text-MediumBrown/40">s/d {{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d M Y') }}</span>
                                    </div>
                                </td>
                                <td class="p-4">
                                    @php
                                        $statusClasses = [
                                            'menunggu' => 'bg-amber-50 text-amber-600 border-amber-100',
                                            'dipinjam' => 'bg-blue-50 text-blue-600 border-blue-100',
                                            'dikembalikan' => 'bg-green-50 text-green-600 border-green-100',
                                            'ditolak' => 'bg-red-50 text-red-600 border-red-100',
                                        ];
                                        $currentStatus = $p->status ?? 'menunggu';
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-wider border {{ $statusClasses[$currentStatus] }}">
                                        {{ $currentStatus }}
                                    </span>
                                </td>
                                <td class="p-4 pr-6">
                                    <div class="flex justify-end gap-2">
                                        @if ($p->status == 'menunggu')
                                            <a href="{{ route('admin.peminjaman.setuju', $p->id) }}"
                                                class="h-8 w-8 flex items-center justify-center bg-green-500 text-white rounded-lg hover:bg-green-600 transition shadow-sm"
                                                title="Setujui">
                                                <i class="fas fa-check text-[10px]"></i>
                                            </a>
                                            <a href="{{ route('admin.peminjaman.tolak', $p->id) }}"
                                                onclick="return confirm('Tolak permintaan ini?')"
                                                class="h-8 w-8 flex items-center justify-center bg-white border border-red-200 text-red-500 rounded-lg hover:bg-red-50 transition shadow-sm"
                                                title="Tolak">
                                                <i class="fas fa-times text-[10px]"></i>
                                            </a>
                                        @else
                                            <span class="text-[10px] font-bold text-MediumBrown/30 italic">Processed</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection