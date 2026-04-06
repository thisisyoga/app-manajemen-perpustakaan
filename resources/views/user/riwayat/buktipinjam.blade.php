<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>Bukti Peminjaman Resmi - Aksara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @media print {
            @page {
                size: A4;
                margin: 0;
            }

            body {
                background-color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                margin: 0;
                padding: 0;
            }

            .no-print {
                display: none !important;
            }

            .print-container {
                width: 210mm;
                height: 297mm;
                padding: 15mm;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
            }

            .print-card {
                flex-grow: 1;
                box-shadow: none !important;
                border: 1px solid #5D3A2E !important;
                border-radius: 8px !important;
            }
        }
    </style>
</head>

<body class="bg-beige/30 min-h-screen font-sans antialiased text-DarkChocolate">

    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-beige sticky top-0 z-50 no-print">
        <div class="max-w-3xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('riwayat') }}" class="text-MediumBrown hover:text-Chocolate transition-colors">
                    <i class="fas fa-chevron-left"></i>
                    <span class="ml-2 font-medium">Kembali</span>
                </a>
            </div>
            <button onclick="window.print()"
                class="bg-Chocolate text-white px-6 py-2 rounded-full font-semibold text-sm hover:bg-MediumBrown transition-all shadow-md flex items-center gap-2">
                <i class="fas fa-print"></i>
                Cetak Bukti Pinjam
            </button>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-0 md:p-8 print-container">
        <div
            class="bg-white shadow-2xl overflow-hidden print-card flex flex-col h-full rounded-2xl border border-beige/50">

            <div class="bg-Chocolate p-10 text-white flex justify-between items-center">
                <div class="flex items-center gap-6">
                    <div class=" p-2 rounded-xl shadow-inner flex items-center justify-center w-20 h-20">
                        <img src="{{ asset('favicon.png') }}" alt="Logo Aksara" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h1 class="text-3xl font-black tracking-tighter uppercase leading-none">AKSARA<span
                                class="text-Caramel">.</span></h1>
                        {{-- <p class="text-[11px] text-beige/70 font-bold tracking-[0.4em] mt-2 uppercase">Official Borrowing Receipt</p> --}}
                    </div>
                </div>
                {{-- <div class="text-right border-l-2 border-white/10 pl-8">
                    <p class="text-beige/50 font-bold text-[10px] uppercase tracking-widest mb-1">ID Transaksi</p>
                    <p class="text-xl font-mono font-bold tracking-tight">
                        #TRX-{{ $peminjaman->created_at->format('Ymd') }}-{{ $peminjaman->id }}
                    </p>
                </div> --}}
            </div>

            <div class="bg-beige/30 px-10 py-4 border-b border-beige/40 flex justify-between items-center">
                {{-- <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-Caramel animate-pulse"></div>
                    <span class="text-xs font-bold text-MediumBrown uppercase tracking-widest">Status: Aktif Dipinjam</span>
                </div> --}}
                <span class="text-[10px] text-MediumBrown/60 font-medium">Harap simpan dokumen ini sebagai bukti
                    sah</span>
            </div>

            <div class="flex-grow flex flex-col">
                <div class="grid grid-cols-4 border-b border-beige/20 bg-white">
                    <div class="p-8 border-r border-beige/20">
                        <span
                            class="text-MediumBrown/50 text-[9px] font-black uppercase tracking-widest block mb-2">Identitas
                            Peminjam</span>
                        <p class="font-bold text-DarkChocolate text-base uppercase leading-tight">
                            {{ $peminjaman->user->name }}</p>
                        <p class="text-[11px] text-MediumBrown mt-1 truncate">{{ $peminjaman->user->email }}</p>
                    </div>

                    <div class="p-8 border-r border-beige/20">
                        <span
                            class="text-MediumBrown/50 text-[9px] font-black uppercase tracking-widest block mb-2">ISBN</span>
                        <p class="font-mono font-bold text-DarkChocolate text-base tracking-tighter">
                            {{ $peminjaman->buku->isbn }}</p>
                    </div>

                    <div class="p-8 border-r border-beige/20 bg-beige/5">
                        <span class="text-MediumBrown/50 text-[9px] font-black uppercase tracking-widest block mb-2">Tgl
                            Pinjam</span>
                        <p class="font-bold text-DarkChocolate text-base uppercase italic">
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d M Y') }}
                        </p>
                    </div>

                    <div class="p-8 bg-red-50/30">
                        <span class="text-red-400 text-[9px] font-black uppercase tracking-widest block mb-2">Batas
                            Kembali</span>
                        <p
                            class="font-bold text-red-600 text-base italic underline decoration-red-200 underline-offset-4">
                            {{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d M Y') }}
                        </p>
                    </div>
                </div>

                <div class="p-12 flex-grow bg-white">
                    <div class="flex items-start gap-12">
                        <div
                            class="w-44 h-60 bg-slate-50 rounded-lg shadow-xl flex-shrink-0 flex items-center justify-center border border-beige/50 overflow-hidden relative">
                            @if ($peminjaman->buku->cover)
                                <img src="{{ asset('storage/' . $peminjaman->buku->cover) }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="text-center p-4">
                                    <i class="fas fa-book text-beige text-6xl mb-2"></i>
                                    <p class="text-[8px] text-beige uppercase font-bold tracking-tighter">Cover Tidak
                                        Tersedia</p>
                                </div>
                            @endif
                        </div>

                        <div class="flex-1 pt-2">
                            <div class="mb-8">
                                <span
                                    class="bg-Chocolate text-white px-3 py-1 rounded text-[10px] font-black tracking-widest uppercase italic shadow-sm">Koleksi
                                    Perpustakaan</span>
                                <h4
                                    class="text-Chocolate font-black text-4xl mt-6 leading-[0.95] uppercase tracking-tighter italic">
                                    {{ $peminjaman->buku->judul_buku }}
                                </h4>
                            </div>

                            <div class="grid grid-cols-2 gap-x-12 gap-y-8 pt-8 border-t border-beige/40">
                                <div class="group">
                                    <p
                                        class="text-MediumBrown/50 text-[10px] font-bold uppercase tracking-widest mb-1.5">
                                        Penulis</p>
                                    <p class="text-DarkChocolate font-bold text-sm uppercase tracking-tight">
                                        {{ $peminjaman->buku->penulis }}</p>
                                </div>
                                <div>
                                    <p
                                        class="text-MediumBrown/50 text-[10px] font-bold uppercase tracking-widest mb-1.5">
                                        Penerbit</p>
                                    <p class="text-DarkChocolate font-bold text-sm uppercase italic tracking-tight">
                                        {{ $peminjaman->buku->penerbit }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-auto">
                <div class="p-10 bg-slate-50 border-t border-beige/30 flex justify-between items-end">
                    <div class="space-y-4">
                        <p
                            class="text-Chocolate font-black uppercase text-[11px] tracking-widest flex items-center gap-2">
                            <i class="fas fa-info-circle text-Caramel"></i> Ketentuan Peminjaman:
                        </p>
                        <ul class="text-MediumBrown text-xs leading-relaxed space-y-2 font-medium italic opacity-80">
                            <li>• Wajib menjaga kebersihan dan keutuhan fisik buku selama peminjaman.</li>
                            {{-- <li>• Keterlambatan pengembalian akan dikenakan sanksi sesuai aturan perpustakaan.</li> --}}
                            <li>• Segera melapor jika terjadi kerusakan atau kehilangan pada buku.</li>
                        </ul>
                    </div>

                    {{--
                    <div class="text-center w-48">
                        <p class="text-[9px] text-MediumBrown uppercase font-bold mb-16 tracking-widest">Sistem Digital Aksara</p>
                        <div class="border-b border-Chocolate w-full"></div>
                        <p class="text-[10px] text-Chocolate mt-2 font-black uppercase tracking-tighter italic">Valid Receipt</p>
                    </div> --}}
                </div>

                <div class="bg-Chocolate py-4 text-center">
                    <p class="text-beige/60 text-[9px] font-black uppercase tracking-[1em]">Literasi Membangun Negeri
                        &bull; Aksara Library</p>
                </div>
            </div>
        </div>

        {{-- <!-- Timestamp (screen only) -->
        <div class="flex justify-between items-center mt-6 px-4 no-print">
             <p class="text-MediumBrown/40 text-[10px] font-bold uppercase tracking-widest">
                Dokumen Digital Diterbitkan: {{ now()->format('d/m/Y H:i:s') }}
            </p>
        </div> --}}
    </main>

</body>

</html>
