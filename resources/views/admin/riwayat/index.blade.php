@extends('layouts.admin')

@section('content')
    <div class="px-2 space-y-6">
        <div class="bg-white rounded-[32px] border border-beige/40 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-beige/10 flex justify-between items-center bg-beige/5">
                <h2 class="text-sm font-serif font-bold text-DarkChocolate">Riwayat Peminjaman</h2>
                <span class="px-3 py-1  text-Chocolate text-[9px] font-black uppercase tracking-widest rounded-full">
                    {{ count($pinjam) }} Peminjaman
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-MediumBrown/50 font-black uppercase tracking-widest text-[10px]">
                            <th class="p-5 pl-8 text-center w-12">No</th>
                            <th class="p-5">Informasi Peminjam</th>
                            <th class="p-5 text-center">Detail Buku</th>
                            <th class="p-5 text-center">Periode</th>
                            <th class="p-5 text-center">Status</th>
                            <th class="p-5 pr-8 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-beige/10">
                        @foreach ($pinjam as $p)
                            <tr class="hover:bg-beige/5 transition-colors group">
                                <td class="p-5 pl-8 text-center text-[10px] font-bold text-MediumBrown/30">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-5">
                                    <p class="text-xs font-bold text-DarkChocolate leading-none mb-1">{{ $p->user->name }}
                                    </p>
                                    <p class="text-[9px] text-MediumBrown/50 font-medium tracking-tight italic">
                                        {{ $p->user->email ?? 'Anggota Aktif' }}</p>
                                </td>
                                <td class="p-5 text-center">
                                    <p
                                        class="text-xs font-bold text-DarkChocolate group-hover:text-Chocolate transition-colors">
                                        {{ $p->buku->judul_buku }}</p>
                                    <p class="text-[9px] text-MediumBrown/40 font-black uppercase tracking-tighter mt-1">
                                        {{ $p->buku->isbn }}</p>
                                </td>
                                <td class="p-5 text-center leading-tight">
                                    <div class="inline-block text-left">
                                        <div class="flex items-center gap-2 mb-1">
                                            <i class="fas fa-calendar-alt text-[9px] text-green-500/50"></i>
                                            <span
                                                class="text-[10px] font-medium text-DarkChocolate">{{ \Carbon\Carbon::parse($p->tanggal_peminjaman)->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-undo-alt text-[9px] text-red-500/50"></i>
                                            <span
                                                class="text-[10px] font-medium text-DarkChocolate">{{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5 text-center">
                                    @php
                                        $statusClasses = [
                                            'menunggu' => 'bg-amber-50 text-amber-600 border-amber-100',
                                            'dipinjam' => 'bg-blue-50 text-blue-600 border-blue-100',
                                            'dikembalikan' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                            'ditolak' => 'bg-rose-50 text-rose-600 border-rose-100',
                                            'diajukan' => 'bg-purple-50 text-purple-600 border-purple-100',
                                        ];
                                        $class =
                                            $statusClasses[$p->status] ?? 'bg-gray-50 text-gray-600 border-gray-100';
                                    @endphp
                                    <span
                                        class="px-3 py-1.5 border {{ $class }} rounded-lg text-[9px] font-black uppercase tracking-widest shadow-sm">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td class="p-5 pr-8">
                                    <div class="flex justify-center gap-2">
                                        <form action="{{ route('admin-riwayat.hapus', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $p->id }}">
                                            <button type="submit"
                                                class="flex items-center gap-1.5 text-red-500 hover:text-red-700 text-[10px] font-bold">
                                                <i class="fas fa-trash-alt text-[10px]"></i>
                                                Hapus
                                            </button>
                                        </form>

                                        <a href="{{ route('admin.bukti.kembali', $p->id) }}" target="_blank"
                                            class="flex items-center gap-1.5 ml-3 text-Chocolate hover:bg-beige/20 text-[10px] font-bold">
                                            <i class="fas fa-file-download"></i> BUKTI KEMBALI
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <div class="bg-beige/5 border border-beige/40 rounded-2xl p-4 flex items-center gap-4">
        <div class="h-8 w-8 bg-Chocolate text-white rounded-lg flex items-center justify-center text-xs">
            <i class="fas fa-info-circle"></i>
        </div>
        <p class="text-[11px] text-MediumBrown/70 leading-relaxed font-medium">
            <strong>Tips Moderator:</strong> Gunakan tombol <span class="text-emerald-600 font-bold">Setuju</span> untuk memvalidasi bahwa buku telah dikembalikan secara fisik dalam kondisi baik.
        </p>
    </div> --}}
    </div>
@endsection
