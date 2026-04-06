<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>Riwayat Peminjaman - Aksara</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&family=lora:ital,wght@0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-serif {
            font-family: 'Lora', serif;
        }
    </style>
</head>

<body class="bg-[#FDFCFB] min-h-screen text-DarkChocolate">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-Caramel/10">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-10">
            <div class="relative flex items-center h-[88px] justify-between">

                <div class="flex items-center">
                    <a href="/" class="flex items-center group">
                        <img src="{{ asset('image/logo.png') }}" alt="Aksara Logo"
                            class="h-20 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    </a>
                </div>

                <div class="hidden md:flex items-center gap-10">
                    <a href="{{ route('MDU') }}"
                        class="relative py-1 text-sm font-bold uppercase tracking-widest {{ request()->routeIs('MDU') ? 'text-Chocolate' : 'text-MediumBrown/60 hover:text-Chocolate' }} transition-colors">
                        <i class="fas fa-book "></i> Katalog
                        @if (request()->routeIs('MDU'))
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-Chocolate rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('riwayat') }}"
                        class="relative py-1 text-sm font-bold uppercase tracking-widest {{ request()->routeIs('riwayat') ? 'text-Chocolate' : 'text-MediumBrown/60 hover:text-Chocolate' }} transition-colors">
                        <i class="fas fa-history"></i> Riwayat
                        @if (request()->routeIs('riwayat'))
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-Chocolate rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('favorit') }}"
                        class="relative py-1 text-sm font-bold uppercase tracking-widest {{ request()->routeIs('favorit') ? 'text-Chocolate' : 'text-MediumBrown/60 hover:text-Chocolate' }} transition-colors">
                        <i class="fas fa-bookmark"></i> Favorit
                        @if (request()->routeIs('favorit'))
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-Chocolate rounded-full"></span>
                        @endif
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button"
                            class="flex items-center gap-3 pl-3 pr-1 py-1 rounded-full border border-Caramel/10 hover:bg-beige/20 transition-all">
                            <div class="text-right hidden lg:block">
                                <p class="text-[11px] font-bold text-DarkChocolate leading-none">
                                    {{ Auth::user()->name }}</p>
                                <p class="text-[9px] text-Chocolate uppercase tracking-tighter font-black mt-1">Member
                                </p>
                            </div>
                            <div
                                class="h-9 w-9 rounded-full overflow-hidden border-2 border-white shadow-sm ring-1 ring-Caramel/20">
                                <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=5D3A2E&color=fff' }}"
                                    alt="User" class="h-full w-full object-cover">
                            </div>
                        </button>

                        <div
                            class="absolute right-0 mt-3 w-52 bg-white rounded-2xl shadow-xl border border-beige/50 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 z-[60]">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left flex items-center px-5 py-3 text-sm text-red-500 hover:bg-red-50 font-bold transition-colors">
                                    <i class="fas fa-power-off mr-3 text-xs"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-[1200px] mx-auto px-6 py-16">
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="text-left">
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-Chocolate mb-2">Aktivitas Peminjaman
                </p>
                <h1 class="text-4xl md:text-5xl font-serif text-DarkChocolate leading-tight">
                    Riwayat <span class="italic text-Chocolate">Peminjaman</span>
                </h1>
            </div>
            <div class="bg-white border border-beige rounded-2xl px-6 py-4 shadow-sm flex items-center gap-4">
                <div class="h-10 w-10 bg-beige/30 rounded-full flex items-center justify-center text-Chocolate">
                    <i class="fas fa-archive text-sm"></i>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-MediumBrown/50 uppercase tracking-wider leading-none">Total
                        Buku</p>
                    <p class="text-xl font-black text-DarkChocolate leading-tight">{{ $totalBuku }}</p>
                </div>
            </div>
        </div>

        <div
            class="bg-DarkChocolate rounded-[24px] p-6 mb-10 shadow-xl shadow-DarkChocolate/10 flex items-center justify-between overflow-hidden relative group">
            <div class="relative z-10 flex items-center gap-4">
                <div class="h-12 w-12 bg-white/10 rounded-xl flex items-center justify-center backdrop-blur-md">
                    <i class="fas fa-stream text-white text-lg"></i>
                </div>
                <div>
                    <h2 class="text-white font-bold text-lg leading-tight uppercase tracking-wide">Daftar Riwayat
                        Peminjaman</h2>
                    <p class="text-white/50 text-xs">Aktivitas peminjaman dan pengembalian Anda.</p>
                </div>
            </div>
            <i
                class="fas fa-book-reader absolute -right-4 -bottom-4 text-8xl text-white/5 transform -rotate-12 transition-transform group-hover:rotate-0"></i>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @forelse ($riwayat as $item)
                <div
                    class="bg-white rounded-[32px] border border-beige/60 p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-500 group relative overflow-hidden">
                    <div class="flex justify-between items-center mb-6">
                        @php
                            $sudahDiulas = \App\Models\Ulasan::where('user_id', Auth::id())
                                ->where('buku_id', $item->buku_id)
                                ->where('updated_at', '>', $item->created_at) 
                                ->exists();

                            $statusConfig = [
                                'menunggu' => [
                                    'class' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    'icon' => 'fa-clock',
                                ],
                                'dipinjam' => [
                                    'class' =>
                                        'bg-Chocolate text-white border-transparent shadow-md shadow-Chocolate/20',
                                    'icon' => 'fa-book-reader',
                                ],
                                'dikembalikan' => [
                                    'class' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'icon' => 'fa-check-circle',
                                ],
                                'ditolak' => [
                                    'class' => 'bg-rose-50 text-rose-600 border-rose-100',
                                    'icon' => 'fa-times-circle',
                                ],
                                'diajukan' => [
                                    'class' => 'bg-blue-50 text-blue-600 border-blue-100',
                                    'icon' => 'fa-paper-plane',
                                ],
                            ];
                            $config = $statusConfig[$item->status] ?? [
                                'class' => 'bg-gray-50 text-gray-500 border-gray-100',
                                'icon' => 'fa-info-circle',
                            ];
                        @endphp
                        <span
                            class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border {{ $config['class'] }}">
                            <i class="fas {{ $config['icon'] }} mr-2"></i>
                            {{ $item->status }}
                        </span>
                        <span class="text-[11px] font-bold text-MediumBrown/40 flex items-center">
                            <i class="far fa-calendar-alt mr-2"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}
                        </span>
                    </div>

                    <div class="flex gap-6 items-start">
                        <div
                            class="w-24 h-32 bg-beige/20 rounded-2xl overflow-hidden border border-beige/50 flex-shrink-0 shadow-inner group-hover:scale-105 transition-transform duration-500">
                            @if ($item->buku->cover)
                                <img src="{{ asset('storage/' . $item->buku->cover) }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-beige/30">
                                    <i class="fas fa-book text-Caramel text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3
                                class="font-serif font-bold text-xl text-DarkChocolate group-hover:text-Chocolate transition-colors leading-tight mb-2">
                                {{ $item->buku->judul_buku }}
                            </h3>
                            <p class="text-[10px] font-bold text-MediumBrown/50 uppercase tracking-[0.2em] mb-4">
                                Transaction ID: <span
                                    class="text-DarkChocolate/70">TRX-{{ $item->id }}{{ $item->buku_id }}</span>
                            </p>

                            <div
                                class="py-2 px-3 bg-beige/10 rounded-xl border border-dashed border-beige text-[10px] font-bold text-MediumBrown/60 uppercase tracking-tighter italic">
                                {{ $item->status == 'menunggu' ? 'Menunggu verifikasi admin' : ($item->status == 'dipinjam' ? 'Buku ini sedang anda pinjam' : 'Buku ini sudah dikembalikan') }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-col gap-3">
                        <div class="grid grid-cols-2 gap-3">
                            @if ($item->status == 'menunggu')
                                <div
                                    class="h-11 rounded-xl border border-beige/50 bg-gray-50/50 flex items-center justify-center text-gray-300 text-[10px] font-bold">
                                    <i class="fas fa-lock mr-2"></i> BUKTI KEMBALI
                                </div>
                                <a href="{{ route('cetak.bukti', $item->id) }}" target="_blank"
                                    class="bg-white hover:bg-beige/20 text-Chocolate border border-Caramel/20 h-11 rounded-xl text-[10px] font-black tracking-widest transition-all flex items-center justify-center gap-2">
                                    <i class="fas fa-file-download"></i> BUKTI PINJAM
                                </a>
                            @elseif ($item->status == 'dipinjam')
                                <form action="{{ route('peminjaman.kembalikan', ['id' => $item->id]) }}" method="POST"
                                    class="w-full">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Ajukan pengembalian buku ini?')"
                                        class="w-full bg-rose-500 hover:bg-rose-600 text-white h-11 rounded-xl text-[10px] font-black tracking-widest transition-all flex items-center justify-center gap-2 shadow-lg shadow-rose-500/10">
                                        <i class="fas fa-undo"></i> AJUKAN PENGEMBALIAN
                                    </button>
                                </form>
                            @elseif($item->status == 'dikembalikan')
                                <a href="{{ route('cetak.bukti.kembali', $item->id) }}" target="_blank"
                                    class="bg-white hover:bg-beige/20 text-Chocolate border border-Caramel/20 h-11 rounded-xl text-[10px] font-black tracking-widest transition-all flex items-center justify-center gap-2">
                                    <i class="fas fa-file-download"></i> BUKTI KEMBALI
                                </a>
                                <div
                                    class="h-11 rounded-xl border border-beige/50 bg-gray-50/50 flex items-center justify-center text-gray-300 text-[10px] font-bold">
                                    <i class="fas fa-lock mr-2"></i> BUKTI PINJAM
                                </div>
                            @else
                                <div
                                    class="h-11 rounded-xl border border-beige/50 bg-gray-50/50 flex items-center justify-center text-gray-300 text-[10px] font-bold">
                                    <i class="fas fa-lock mr-2"></i>BUKTI KEMBALI
                                </div>
                            @endif
                        </div>

                        @if ($item->status == 'dikembalikan' && !$sudahDiulas)
                            <a href="{{ route('detail-buku', $item->buku_id) }}#ulasan"
                                class="w-full bg-DarkChocolate text-white hover:bg-Chocolate h-12 rounded-2xl text-xs font-black tracking-widest transition-all duration-300 flex items-center justify-center gap-3">
                                <i class="fas fa-star-half-alt text-amber-400"></i>
                                BERIKAN ULASAN BUKU
                            </a>
                        @endif

                    </div>
                </div>
            @empty
                <div
                    class="col-span-full flex flex-col items-center justify-center py-24 bg-white rounded-[40px] border-2 border-dashed border-beige shadow-sm">
                    <div class="h-24 w-24 bg-beige/30 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-folder-open text-Caramel text-5xl"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-DarkChocolate">Belum Ada Riwayat</h3>
                    <p class="text-MediumBrown/60 mt-2 mb-8">Mulailah perjalanan literasi Anda hari ini.</p>
                    <a href="{{ route('MDU') }}"
                        class="bg-Chocolate text-white px-10 py-4 rounded-2xl font-bold hover:bg-DarkChocolate transition-all shadow-xl shadow-Chocolate/20">
                        Cari Buku Sekarang
                    </a>
                </div>
            @endforelse
        </div>
    </main>

    {{-- <div id="modalUlasan" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-6">
        <div class="absolute inset-0 bg-DarkChocolate/60 backdrop-blur-md transition-opacity duration-500"
            onclick="closeModal()"></div>
        <div
            class="relative bg-white rounded-[32px] max-w-md w-full p-10 shadow-2xl border border-beige overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-Chocolate"></div>

            <h3 class="text-2xl font-serif font-bold text-DarkChocolate mb-2" id="modalTitle">Ulas Buku</h3>
            <p class="text-xs text-MediumBrown/60 mb-8 font-medium italic">Bagikan pengalaman membaca Anda kepada yang
                lain.</p>

            <form action="{{ route('ulasan.store') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="buku_id" id="modal_buku_id">

                <div class="space-y-3">
                    <label class="block text-xs font-black uppercase tracking-widest text-Chocolate">Rating</label>
                    <select name="rating"
                        class="w-full h-14 bg-beige/10 border border-beige rounded-2xl px-5 text-sm font-bold focus:ring-2 focus:ring-Chocolate outline-none transition-all">
                        <option value="5">⭐⭐⭐⭐⭐ Sempurna</option>
                        <option value="4">⭐⭐⭐⭐ Bagus</option>
                        <option value="3">⭐⭐⭐ Cukup</option>
                        <option value="2">⭐⭐ Kurang</option>
                        <option value="1">⭐ Buruk</option>
                    </select>
                </div>

                <div class="space-y-3">
                    <label class="block text-xs font-black uppercase tracking-widest text-Chocolate">Ulasan
                        Anda</label>
                    <textarea name="ulasan" rows="4"
                        class="w-full bg-beige/10 border border-beige rounded-2xl p-5 text-sm font-medium focus:ring-2 focus:ring-Chocolate outline-none transition-all placeholder:text-MediumBrown/30"
                        placeholder="Apa pendapat Anda tentang alur cerita atau isi buku ini?"></textarea>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="closeModal()"
                        class="flex-1 h-14 bg-beige/30 text-DarkChocolate rounded-2xl font-bold hover:bg-beige/50 transition-all">Batal</button>
                    <button type="submit"
                        class="flex-1 h-14 bg-Chocolate text-white rounded-2xl font-black tracking-widest hover:bg-DarkChocolate shadow-lg shadow-Chocolate/20 transition-all">KIRIM</button>
                </div>
            </form>
        </div>
    </div> --}}

    {{-- <script>
        function openModal(id, judul) {
            const modal = document.getElementById('modalUlasan');
            modal.classList.remove('hidden');
            document.getElementById('modal_buku_id').value = id;
            document.getElementById('modalTitle').innerText = 'Ulas: ' + judul;
            // Add subtle animation
            modal.querySelector('.relative').classList.add('animate-scale-in');
        }

        function closeModal() {
            document.getElementById('modalUlasan').classList.add('hidden');
        }
    </script> --}}
</body>

</html>
