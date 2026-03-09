<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - Aksara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen font-sans">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="relative flex items-center h-[88px]">
                <div class="flex items-center shrink-0">
                    <a href="{{ route('MDU') }}" class="flex items-center group">
                        <div
                            class="bg-amber-500 group-hover:bg-amber-600 p-2.5 rounded-xl transition-colors duration-300">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <span
                            class="ml-3 text-[28px] font-extrabold text-amber-600 group-hover:text-amber-700 transition-colors duration-300 leading-none">
                            Aksara.
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-14">
                    <a href="{{ route('MDU') }}"
                        class="text-slate-700 hover:text-amber-600 text-[18px] font-medium transition-colors">
                        <i class="fas fa-book mr-2"></i> Koleksi Buku
                    </a>
                    <a href="{{ route('riwayat') }}"
                        class="text-amber-700 hover:text-amber-600 text-[18px] font-medium transition-colors border-b-2 border-amber-500 pb-1">
                        <i class="fas fa-history mr-2"></i> Riwayat
                    </a>
                </div>

                <div class="ml-auto flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button"
                            class="flex items-center gap-3 p-1 rounded-full hover:bg-gray-50 transition-all duration-200 focus:outline-none">
                            <div class="relative">
                                <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-amber-500 shadow-sm">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                        alt="User" class="h-full w-full object-cover">
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start leading-tight">
                                <span
                                    class="text-sm font-bold text-gray-800 group-hover:text-amber-600 transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-wider font-semibold">
                                    {{ Auth::user()->role == 'user' ? 'Member' : 'Admin' }}
                                </span>
                            </div>
                            <i
                                class="fas fa-chevron-down text-xs text-gray-400 hidden lg:inline transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <div
                            class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-[60]">
                            <div class="px-4 py-3 border-b border-gray-50 mb-1">
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">Akun Saya</p>
                                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3 w-5"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-10">
        <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="text-center md:text-left">
                <h2 class="text-3xl font-extrabold text-slate-800 italic">Riwayat Peminjaman</h2>
                <p class="text-slate-500 mt-1 text-lg">Kelola dan pantau aktivitas literasi Anda.</p>
            </div>
            <div class="flex justify-center">
                <span
                    class="bg-amber-100 text-amber-700 px-4 py-2 rounded-lg text-sm font-bold border border-amber-200">
                    Total: {{ $totalBuku }} Buku
                </span>
            </div>
        </div>

        <div
            class="bg-gradient-to-r from-amber-500 to-amber-600 rounded-2xl p-4 mb-8 shadow-lg shadow-amber-100 flex items-center justify-center gap-3">
            <i class="fas fa-list-ul text-white"></i>
            <h2 class="text-white font-bold text-lg tracking-wide uppercase">Daftar Aktivitas Terbaru</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse ($riwayat as $item)
                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-all group">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            @php
                                $statusClasses = [
                                    'menunggu' => 'bg-yellow-100 text-yellow-700',
                                    'dipinjam' => 'bg-blue-100 text-blue-700',
                                    'dikembalikan' => 'bg-green-100 text-green-700',
                                    'ditolak' => 'bg-red-100 text-red-700',
                                    'diajukan' => 'bg-red-100 text-red-700'
                                ];
                                $statusIcons = [
                                    'menunggu' => 'fa-clock',
                                    'dipinjam' => 'fa-book-reader',
                                    'dikembalikan' => 'fa-check-circle',
                                    'ditolak' => 'fa-times-circle',
                                    'diajukan' => 'fa-paper-plane',
                                ];
                            @endphp
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $statusClasses[$item->status] }}">
                                <i class="fas {{ $statusIcons[$item->status] }} mr-1.5"></i>
                                {{ strtoupper($item->status) }}
                            </span>
                            <span class="text-xs font-semibold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-lg">
                                <i class="far fa-calendar-alt mr-2 text-amber-500"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}
                            </span>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-16 h-20 bg-slate-100 rounded-lg flex-shrink-0 flex items-center justify-center overflow-hidden">
                                @if ($item->buku->cover)
                                    <img src="{{ asset('storage/' . $item->buku->cover) }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-book text-slate-400 text-2xl"></i>
                                @endif
                            </div>
                            <div>
                                <h3
                                    class="font-bold text-slate-800 text-lg group-hover:text-amber-600 transition-colors leading-snug">
                                    {{ $item->buku->judul_buku }}
                                </h3>
                                <p class="text-slate-400 text-sm mt-1 uppercase tracking-tighter">ID:
                                    TRX-{{ $item->id }}{{ $item->buku_id }}</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-5 border-t border-slate-100">
                            <div class="grid grid-cols-2 gap-3 mb-3">
                                @if ($item->status == 'dipinjam')
                                    <form action="{{ route('peminjaman.kembalikan', ['id' => $item->id]) }}" method="POST"
                                        class="w-full">
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin mengajukan pengembalian buku ini?')"
                                            class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-sm shadow-blue-200">
                                            <i class="fas fa-undo"></i> AJUKAN KEMBALI
                                        </button>
                                    </form>
                                @elseif($item->status == 'dikembalikan')
                                    <a href="{{ route('cetak.bukti.kembali', $item->id) }}"
                                        class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2">
                                        <i class="fas fa-file-download text-slate-500"></i> BUKTI KEMBALI
                                    </a>
                                @else
                                    <button disabled
                                        class="bg-gray-50 text-gray-300 px-4 py-2.5 rounded-xl text-xs font-bold flex items-center justify-center gap-2 cursor-not-allowed border border-gray-100">
                                        <i class="fas fa-lock"></i> BUKTI KEMBALI
                                    </button>
                                @endif

                                <a href="{{ route('cetak.bukti', $item->id) }}"
                                    class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-sm shadow-amber-200">
                                    <i class="fas fa-file-invoice"></i> BUKTI PINJAM
                                </a>
                            </div>

                            @if ($item->status == 'dikembalikan')
                                <button
                                    class="w-full border-2 border-amber-500 text-amber-600 hover:bg-amber-500 hover:text-white px-4 py-2.5 rounded-xl text-sm font-black transition-all duration-300 flex items-center justify-center gap-2 group/btn">
                                    <i
                                        class="fas fa-star text-amber-400 group-hover/btn:text-white transition-colors"></i>
                                    BERIKAN ULASAN BUKU
                                </button>
                            @else
                                <div
                                    class="mt-3 py-2.5 text-center bg-gray-50 rounded-xl border border-dashed border-gray-200">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest italic">
                                        {{ $item->status == 'menunggu' ? 'Menunggu verifikasi admin' : 'Ulasan tersedia setelah buku kembali' }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200">
                    <div class="bg-slate-50 p-6 rounded-full mb-4">
                        <i class="fas fa-folder-open text-slate-300 text-5xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800">Belum ada riwayat</h3>
                    <p class="text-slate-500">Anda belum pernah melakukan peminjaman buku.</p>
                    <a href="{{ route('MDU') }}"
                        class="mt-6 bg-amber-500 text-white px-6 py-2 rounded-xl font-bold hover:bg-amber-600 transition-all">Mulai
                        Pinjam Buku</a>
                </div>
            @endforelse
        </div>
    </main>

</body>

</html>
