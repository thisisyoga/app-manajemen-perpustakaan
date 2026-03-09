<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Peminjaman - Aksara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @media print {
            @page {
                size: A4;
                margin: 8mm;
            }

            body {
                background-color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .no-print {
                display: none !important;
            }

            .print-card {
                box-shadow: none !important;
                border: 2px solid #0f172a !important;
                margin: 0 !important;
                width: 100% !important;
                border-radius: 0 !important;
            }

            main {
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>

<body class="bg-slate-100 min-h-screen font-sans antialiased text-slate-900">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 no-print">
        <div class="max-w-3xl mx-auto px-4 h-20 flex items-center justify-between">

            <div class="flex items-center gap-5">
                <a href="{{ route('riwayat') }}"
                    class="flex items-center justify-center w-10 h-10 rounded-full bg-slate-100 text-slate-600 hover:bg-slate-900 hover:text-white transition-all duration-300 group shadow-sm">
                    <i class="fas fa-arrow-left text-sm group-hover:-translate-x-1 transition-transform"></i>
                </a>

                <div class="flex items-center gap-3">
                    <div
                        class="bg-amber-500 w-10 h-10 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/20">
                        <i class="fas fa-book-open text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold tracking-tighter uppercase block leading-none">AKSARA<span
                                class="text-amber-500">.</span></span>
                    </div>
                </div>
            </div>

            <button onclick="window.print()"
                class="group bg-slate-900 text-white pl-4 pr-5 py-2.5 rounded-xl font-bold text-[11px] uppercase tracking-widest hover:bg-amber-500 hover:text-slate-900 transition-all duration-300  flex items-center gap-3">
                <span
                    class="w-7 h-7 bg-white/10 group-hover:bg-slate-900/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-print"></i>
                </span>
                Cetak Dokumen
            </button>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4">
        <div class="bg-white shadow-2xl overflow-hidden print-card border border-slate-200 rounded-2xl">

            <div class="bg-slate-900 p-6 text-white flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="bg-amber-500 w-12 h-12 rounded-xl flex items-center justify-center">
                        <i class="fas fa-book-open text-xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-black italic uppercase leading-none tracking-tight">Aksara<span
                                class="text-amber-500">.</span></span></h1>
                        <p class="text-[9px] text-slate-400 font-bold tracking-[0.2em] mt-1">SISTEM INFORMASI
                            PERPUSTAKAAN DIGITAL</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-amber-500 font-bold tracking-[0.2em] text-[8px] uppercase">ID Transaksi</p>
                    <p class="text-sm font-mono font-bold">
                        #TRX-{{ $peminjaman->created_at->format('Ymd') }}-{{ $peminjaman->id }}</p>
                </div>
            </div>

            <div class="grid grid-cols-3 border-b border-slate-100">
                <div class="p-5 border-r border-slate-100">
                    <span
                        class="text-slate-400 text-[8px] font-extrabold uppercase tracking-widest block mb-1">Identitas
                        Peminjam</span>
                    <p class="font-bold text-sm text-slate-800 uppercase">{{ $peminjaman->user->name }}</p>
                    <p class="text-[10px] text-slate-500 italic lowercase">{{ $peminjaman->user->email }}</p>
                </div>
                <div class="p-5 border-r border-slate-100 bg-slate-50/30">
                    <span class="text-slate-400 text-[8px] font-extrabold uppercase tracking-widest block mb-1">Tgl
                        Pinjam</span>
                    <p class="font-bold text-sm text-slate-800 italic uppercase">
                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->format('d M Y') }}
                    </p>
                </div>
                <div class="p-5 bg-red-50/50">
                    <span class="text-red-500 text-[8px] font-extrabold uppercase tracking-widest block mb-1">Tgl
                        Pengembalian</span>
                    <p class="text-red-600 font-black text-sm underline decoration-2 underline-offset-4">
                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d M Y') }}
                    </p>
                </div>
            </div>

            <div class="p-8">
                <div class="flex items-start gap-8">
                    <div
                        class="w-24 h-32 bg-slate-100 rounded-lg flex-shrink-0 flex items-center justify-center border border-slate-200 overflow-hidden">
                        @if ($peminjaman->buku->cover)
                            <img src="{{ asset('storage/' . $peminjaman->buku->cover) }}"
                                class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-book text-slate-300 text-4xl"></i>
                        @endif
                    </div>
                    <div class="flex-1">
                        <span
                            class="bg-slate-900 text-white px-2 py-0.5 rounded text-[8px] font-black tracking-widest uppercase">Detail
                            Buku</span>
                        <h4
                            class="text-slate-900 font-black text-xl italic mt-2 mb-4 leading-none uppercase tracking-tighter">
                            {{ $peminjaman->buku->judul_buku }}
                        </h4>

                        <div class="grid grid-cols-2 gap-x-8 gap-y-3 border-t border-slate-50 pt-4">
                            <div>
                                <p class="text-slate-400 text-[8px] font-bold uppercase tracking-widest">Penulis</p>
                                <p class="text-slate-700 font-bold text-xs uppercase">{{ $peminjaman->buku->penulis }}
                                </p>
                            </div>
                            <div>
                                <p class="text-slate-400 text-[8px] font-bold uppercase tracking-widest">Penerbit</p>
                                <p class="text-slate-700 font-bold text-xs uppercase">{{ $peminjaman->buku->penerbit }}
                                </p>
                            </div>
                            <div>
                                <p class="text-slate-400 text-[8px] font-bold uppercase tracking-widest">Tahun Terbit
                                </p>
                                <p class="text-slate-700 font-bold text-[11px]">{{ $peminjaman->buku->tahun_terbit }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-slate-50 border-t border-slate-100 flex justify-between items-end">
                <div class="space-y-3">
                    <p class="text-slate-800 font-black uppercase text-[9px] tracking-widest flex items-center gap-2">
                        <i class="fas fa-info-circle text-amber-500 text-xs"></i> Informasi Penting:
                    </p>
                    <ul class="text-slate-500 text-[10px] leading-relaxed list-none space-y-1 font-medium italic">
                        <li>- Wajib mengembalikan buku tepat waktu sesuai tanggal di atas.</li>
                        <li>- Keterlambatan dikenakan sanksi sesuai kebijakan perpustakaan.</li>
                        <li>- Menjaga kebersihan buku adalah tanggung jawab penuh peminjam.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-slate-900 py-3 text-center">
                <p class="text-slate-400 text-[8px] font-black uppercase tracking-[0.5em]">Literasi Membangun Negeri
                    &bull; Aksara Library</p>
            </div>
        </div>

        <p class="text-center text-slate-400 text-[9px] mt-6 font-bold uppercase tracking-widest no-print">
            Dokumen ini dicetak pada: {{ now()->format('d/m/Y H:i') }}
        </p>
    </main>

</body>

</html>
