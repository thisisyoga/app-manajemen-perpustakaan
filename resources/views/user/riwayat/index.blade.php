<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - Aksara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-beige min-h-screen font-sans">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-Caramel/20">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="relative flex items-center h-[88px]">
                <div class="flex items-center shrink-0">
                    <a href="{{ route('MDU') }}" class="flex items-center group">
                        <div
                            class="bg-Chocolate group-hover:bg-DarkChocolate p-2.5 rounded-xl transition-colors duration-300">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <span
                            class="ml-3 text-[28px] font-extrabold text-Chocolate group-hover:text-DarkChocolate transition-colors duration-300 leading-none">
                            Aksara.
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-14">
                    <a href="{{ route('MDU') }}"
                        class="text-MediumBrown hover:text-Chocolate text-[18px] font-medium transition-colors">
                        <i class="fas fa-book mr-2"></i> Koleksi Buku
                    </a>
                    <a href="{{ route('riwayat') }}"
                        class="text-Chocolate hover:text-DarkChocolate text-[18px] font-medium transition-colors border-b-2 border-Chocolate pb-1">
                        <i class="fas fa-history mr-2"></i> Riwayat
                    </a>
                </div>

                <div class="ml-auto flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button"
                            class="flex items-center gap-3 p-1 rounded-full hover:bg-beige/50 transition-all duration-200 focus:outline-none">
                            <div class="relative">
                                <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-Caramel shadow-sm">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                        alt="User" class="h-full w-full object-cover">
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start leading-tight">
                                <span
                                    class="text-sm font-bold text-DarkChocolate group-hover:text-Chocolate transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-[10px] text-MediumBrown uppercase tracking-wider font-semibold">
                                    {{ Auth::user()->role == 'user' ? 'Member' : 'Admin' }}
                                </span>
                            </div>
                            <i
                                class="fas fa-chevron-down text-xs text-Caramel hidden lg:inline transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <div
                            class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-beige py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-[60]">
                            <div class="px-4 py-3 border-b border-beige mb-1">
                                <p class="text-xs text-MediumBrown font-bold uppercase tracking-widest mb-1">Akun Saya</p>
                                <p class="text-sm font-medium text-DarkChocolate truncate">{{ Auth::user()->email }}</p>
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
                <h2 class="text-3xl font-extrabold text-Chocolate italic">Riwayat Peminjaman</h2>
                <p class="text-MediumBrown mt-1 text-lg">Kelola dan pantau aktivitas literasi Anda.</p>
            </div>
            <div class="flex justify-center">
                <span
                    class="bg-white text-Chocolate px-4 py-2 rounded-lg text-sm font-bold border border-Caramel shadow-sm">
                    Total: {{ $totalBuku }} Buku
                </span>
            </div>
        </div>

        <div
            class="bg-gradient-to-r from-Chocolate to-MediumBrown rounded-2xl p-4 mb-8 shadow-lg shadow-Chocolate/20 flex items-center justify-center gap-3">
            <i class="fas fa-list-ul text-white"></i>
            <h2 class="text-white font-bold text-lg tracking-wide uppercase">Daftar Aktivitas Terbaru</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @forelse ($riwayat as $item)
                <div
                    class="bg-white rounded-2xl shadow-sm border border-Caramel/20 overflow-hidden hover:shadow-md transition-all group">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            @php
                                $statusClasses = [
                                    'menunggu' => 'bg-beige text-MediumBrown border border-Caramel/30',
                                    'dipinjam' => 'bg-Chocolate text-white',
                                    'dikembalikan' => 'bg-green-100 text-green-700',
                                    'ditolak' => 'bg-red-100 text-red-700',
                                    'diajukan' => 'bg-red-100 text-red-700',
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
                            <span class="text-xs font-semibold text-MediumBrown bg-beige/30 px-3 py-1.5 rounded-lg border border-beige">
                                <i class="far fa-calendar-alt mr-2 text-Caramel"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}
                            </span>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-16 h-20 bg-beige rounded-lg flex-shrink-0 flex items-center justify-center overflow-hidden">
                                @if ($item->buku->cover)
                                    <img src="{{ asset('storage/' . $item->buku->cover) }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <i class="fas fa-book text-Caramel text-2xl"></i>
                                @endif
                            </div>
                            <div>
                                <h3
                                    class="font-bold text-DarkChocolate text-lg group-hover:text-Chocolate transition-colors leading-snug">
                                    {{ $item->buku->judul_buku }}
                                </h3>
                                <p class="text-MediumBrown text-sm mt-1 uppercase tracking-tighter">ID:
                                    TRX-{{ $item->id }}{{ $item->buku_id }}</p>
                            </div>
                        </div>

                        <div class="mt-6 pt-5 border-t border-beige">
                            <div class="grid grid-cols-2 gap-3 mb-3">
                                @if ($item->status == 'dipinjam')
                                    <form action="{{ route('peminjaman.kembalikan', ['id' => $item->id]) }}"
                                        method="POST" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda yakin ingin mengajukan pengembalian buku ini?')"
                                            class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-sm shadow-red-100">
                                            <i class="fas fa-undo"></i> AJUKAN KEMBALI
                                        </button>
                                    </form>
                                @elseif($item->status == 'dikembalikan')
                                    <a href="{{ route('cetak.bukti.kembali', $item->id) }}"
                                        class="bg-beige hover:bg-Caramel/20 text-Chocolate px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 border border-Caramel/30">
                                        <i class="fas fa-file-download text-MediumBrown"></i> BUKTI KEMBALI
                                    </a>
                                @else
                                    <button disabled
                                        class="bg-white text-gray-300 px-4 py-2.5 rounded-xl text-xs font-bold flex items-center justify-center gap-2 cursor-not-allowed border border-beige">
                                        <i class="fas fa-lock"></i> BUKTI KEMBALI
                                    </button>
                                @endif

                                 <button disabled
                                        class="bg-white text-gray-300 px-4 py-2.5 rounded-xl text-xs font-bold flex items-center justify-center gap-2 cursor-not-allowed border border-beige">
                                        <i class="fas fa-lock"></i> BUKTI Pinjam
                                    </button>

                                {{-- <a href="{{ route('cetak.bukti', $item->id) }}" 
                                    class="bg-Caramel hover:bg-MediumBrown text-white px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-sm shadow-Caramel/20">
                                    <i class="fas fa-file-invoice"></i> BUKTI PINJAM
                                </a> --}}
                            </div>

                            @if ($item->status == 'dikembalikan')
                                <button onclick="openModal('{{ $item->buku->id }}', '{{ $item->buku->judul_buku }}')"
                                    class="w-full border-2 border-Chocolate text-Chocolate hover:bg-Chocolate hover:text-white px-4 py-2.5 rounded-xl text-sm font-black transition-all duration-300 flex items-center justify-center gap-2 group/btn">
                                    <i class="fas fa-star text-Caramel group-hover/btn:text-white"></i>
                                    BERIKAN ULASAN BUKU
                                </button>
                            @else
                                <div
                                    class="mt-3 py-2.5 text-center bg-beige/20 rounded-xl border border-dashed border-Caramel/40">
                                    <p class="text-[10px] font-bold text-MediumBrown uppercase tracking-widest italic">
                                        {{ $item->status == 'menunggu' ? 'Menunggu verifikasi admin' : 'Ulasan tersedia setelah buku kembali' }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full flex flex-col items-center justify-center py-20 bg-white/50 rounded-3xl border-2 border-dashed border-Caramel/50">
                    <div class="bg-beige p-6 rounded-full mb-4">
                        <i class="fas fa-folder-open text-Caramel text-5xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-Chocolate">Belum ada riwayat</h3>
                    <p class="text-MediumBrown">Anda belum pernah melakukan peminjaman buku.</p>
                    <a href="{{ route('MDU') }}"
                        class="mt-6 bg-Chocolate text-white px-6 py-2 rounded-xl font-bold hover:bg-DarkChocolate transition-all">Mulai
                        Pinjam Buku</a>
                </div>
            @endforelse
        </div>
    </main>

    <div id="modalUlasan" class="fixed inset-0 z-[100] hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-DarkChocolate opacity-70"></div>
            <div class="relative bg-white rounded-2xl max-w-md w-full p-8 shadow-2xl border-t-8 border-Chocolate">
                <h3 class="text-xl font-bold mb-4 text-Chocolate" id="modalTitle">Ulas Buku</h3>
                <form action="{{ route('ulasan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="buku_id" id="modal_buku_id">

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2 text-MediumBrown">Rating</label>
                        <select name="rating" class="w-full border border-beige rounded-lg p-2 focus:ring-2 focus:ring-Caramel outline-none">
                            <option value="5">⭐⭐⭐⭐⭐ (Sempurna)</option>
                            <option value="4">⭐⭐⭐⭐ (Bagus)</option>
                            <option value="3">⭐⭐⭐ (Cukup)</option>
                            <option value="2">⭐⭐ (Kurang)</option>
                            <option value="1">⭐ (Buruk)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2 text-MediumBrown">Ulasan Anda</label>
                        <textarea name="ulasan" rows="4" class="w-full border border-beige rounded-lg p-2 focus:ring-2 focus:ring-Caramel outline-none"
                            placeholder="Apa pendapat Anda tentang buku ini?"></textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="closeModal()"
                            class="flex-1 px-4 py-2 bg-beige text-Chocolate rounded-xl font-bold hover:bg-Caramel/20 transition-colors">Batal</button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-Chocolate text-white rounded-xl font-bold hover:bg-DarkChocolate transition-colors shadow-lg shadow-Chocolate/20">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(id, judul) {
            document.getElementById('modalUlasan').classList.remove('hidden');
            document.getElementById('modal_buku_id').value = id;
            document.getElementById('modalTitle').innerText = 'Ulas: ' + judul;
        }

        function closeModal() {
            document.getElementById('modalUlasan').classList.add('hidden');
        }
    </script>

</body>

</html>