<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pinjam->judul_buku }} - Aksara</title>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link
        href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&family=lora:wght@600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

<body class="antialiased bg-[#FDFCFB] text-DarkChocolate">
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
                                @auth
                                    <p class="text-[11px] font-bold text-DarkChocolate leading-none">
                                        {{ Auth::user()->name }}</p>
                                    <p class="text-[9px] text-Chocolate uppercase tracking-tighter font-black mt-1">Member
                                    </p>
                                @endauth
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
                                    <i class="fas fa-sign-out mr-3 text-xs"></i> Keluar Akun
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <div class="lg:col-span-4 lg:sticky lg:top-28 self-start">
                <div class="bg-white p-4 rounded-3xl shadow-xl shadow-beige/20 border border-beige mb-6">
                    <img src="{{ asset('storage/' . $pinjam->cover) }}"
                        class="w-full rounded-2xl aspect-[3/4] object-cover shadow-inner"
                        onerror="this.src='https://placehold.co/400x533/5D3A2E/FFF?text=No+Cover'">
                </div>

                <div class="grid grid-cols-5 gap-3">
                    <a href="{{ route('pinjam.create', $pinjam->id) }}"
                        class="col-span-4 bg-Chocolate hover:bg-MediumBrown text-white text-center py-4 rounded-2xl font-bold transition-all shadow-lg shadow-Chocolate/20 active:scale-95 tracking-widest text-sm">
                        PINJAM SEKARANG
                    </a>
                    <form action="{{ route('bookmark.store', $pinjam->id) }}" method="POST" class="col-span-1">
                        @csrf
                        <button
                            class="w-full h-full flex items-center justify-center border border-beige rounded-2xl text-Caramel hover:text-rose-500 hover:bg-beige/30 transition-all">
                            <i
                                class="{{ in_array($pinjam->id, $koleksi) ? 'fa-solid text-Chocolate' : 'fa-regular' }} fa-bookmark text-xl"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($pinjam->RelasiKategori as $kat)
                        <span
                            class="text-[10px] font-bold px-3 py-1 bg-beige text-MediumBrown rounded-full uppercase tracking-widest border border-Caramel/20">
                            {{ $kat->nama_kategori }}
                        </span>
                    @endforeach
                </div>

                <h1 class="text-4xl font-serif font-bold text-DarkChocolate mb-2 leading-tight">
                    {{ $pinjam->judul_buku }}
                </h1>
                <p class="text-lg text-MediumBrown mb-8 italic font-medium">
                    <span class="text-Chocolate font-bold not-italic">{{ $pinjam->penulis }}</span>
                </p>

                <div class="grid grid-cols-3 gap-4 mb-10">
                    @php
                        $avg = $pinjam->ulasans()->avg('rating') ?? 0;
                        $stats = [
                            ['icon' => 'fa-calendar', 'label' => 'Tahun', 'val' => $pinjam->tahun_terbit],
                            ['icon' => 'fa-box', 'label' => 'Stok', 'val' => $pinjam->stok . ' Buku'],
                            ['icon' => 'fa-star', 'label' => 'Rating', 'val' => number_format($avg, 1)],
                        ];
                    @endphp
                    @foreach ($stats as $s)
                        <div
                            class="bg-white border border-beige p-4 rounded-2xl shadow-sm hover:border-Caramel transition-colors">
                            <i class="fas {{ $s['icon'] }} text-Caramel mb-2"></i>
                            <p class="text-[10px] uppercase text-MediumBrown font-bold tracking-tighter">
                                {{ $s['label'] }}</p>
                            <p class="text-sm font-black text-Chocolate">{{ $s['val'] }}</p>
                        </div>
                    @endforeach
                </div>

                <input type="radio" name="tabs" id="tab-sinopsis" class="hidden peer/sinopsis" checked>
                <input type="radio" name="tabs" id="tab-data" class="hidden peer/data">

                <div class="mb-8 border-b border-beige/40 flex gap-8">
                    <label for="tab-sinopsis"
                        class="pb-3 border-b-2 cursor-pointer font-bold uppercase tracking-widest text-[10px] transition-all peer-checked/sinopsis:border-Chocolate peer-checked/sinopsis:text-Chocolate text-MediumBrown/40 hover:text-Chocolate">
                        Sinopsis
                    </label>
                    <label for="tab-data"
                        class="pb-3 border-b-2 cursor-pointer font-bold uppercase tracking-widest text-[10px] transition-all peer-checked/data:border-Chocolate peer-checked/data:text-Chocolate text-MediumBrown/40 hover:text-Chocolate">
                        Informasi Detail
                    </label>
                </div>

                <div
                    class="hidden peer-checked/sinopsis:block text-DarkChocolate/80 leading-relaxed text-lg font-medium">
                    {{ $pinjam->deskripsi }}
                </div>

                <div class="hidden peer-checked/data:grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach (['Penerbit' => $pinjam->penerbit, 'ISBN' => $pinjam->isbn, 'Tahun Terbit' => $pinjam->tahun_terbit] as $label => $val)
                        <div class="flex justify-between p-4 bg-white border border-beige rounded-xl">
                            <span
                                class="text-[10px] font-bold text-Caramel uppercase tracking-widest">{{ $label }}</span>
                            <span class="text-xs font-black text-Chocolate">{{ $val }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    @if (session('success') || session('error') || $errors->any())
                        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                            x-transition:leave="transition ease-in duration-500"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="rounded-xl px-4 py-3 border {{ session('success') ? 'bg-green-100 border-green-400 text-green-700' : 'bg-rose-100 border-rose-400 text-rose-700' }}">
                            <div class="flex items-center justify-between">
                                <div class="text-sm">
                                    @if (session('success'))
                                        {{ session('success') }}
                                    @elseif (session('error'))
                                        {{ session('error') }}
                                    @else
                                        <ul class="list-disc list-inside">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <button @click="show = false" class="text-lg font-bold ml-4">&times;</button>
                            </div>
                        </div>
                    @endif
                </div>


                @php
                    $ulasanUser = $pinjam->ulasans->where('user_id', Auth::id())->first();
                    $peminjamanTerakhir = Auth::user()->peminjamans()->where('buku_id', $pinjam->id)->latest()->first();

                    $bolehMengulas = false;

                    if ($peminjamanTerakhir) {
                        if (!$ulasanUser) {
                            $bolehMengulas = true;
                        } else {
                            if ($peminjamanTerakhir->created_at > $ulasanUser->updated_at) {
                                $bolehMengulas = true;
                            }
                        }
                    }
                @endphp

                @if ($bolehMengulas)
                    <section class="mt-12 bg-Chocolate rounded-[2.5rem] p-8 text-white shadow-2xl shadow-Chocolate/30" id="ulasan">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                            <div>
                                <h3 class="text-2xl font-serif font-bold">
                                    {{ $ulasanUser ? 'Update Ulasan Anda' : 'Tulis Ulasan' }}
                                </h3>
                                <p class="text-beige/70 text-sm mt-1 font-medium italic">
                                    {{ $ulasanUser ? 'Terdeteksi peminjaman baru, silakan perbarui ulasan Anda.' : 'Apa pendapat jujur Anda tentang buku ini?' }}
                                </p>
                            </div>
                        </div>

                        <form action="{{ route('ulasan.store') }}" method="POST"
                            class="pt-8 border-t border-white/10">
                            @csrf
                            <input type="hidden" name="buku_id" value="{{ $pinjam->id }}">

                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                                <div class="md:col-span-3">
                                    <label
                                        class="text-[10px] font-bold uppercase tracking-widest text-beige/50 mb-2 block">Skor
                                        Buku</label>
                                    <select name="rating" required
                                        class="bg-white/10 border border-white/20 rounded-xl p-4 text-sm text-white outline-none focus:border-beige w-full">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <option value="{{ $i }}" class="text-DarkChocolate"
                                                {{ $ulasanUser && $ulasanUser->rating == $i ? 'selected' : '' }}>
                                                ⭐ {{ $i }} Bintang
                                            </option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="md:col-span-7">
                                    <label
                                        class="text-[10px] font-bold uppercase tracking-widest text-beige/50 mb-2 block">Catatan
                                        Pembaca</label>
                                    <textarea name="ulasan" rows="1" required
                                        class="w-full bg-white/10 border border-white/20 rounded-xl p-4 text-sm text-white outline-none focus:border-beige placeholder:text-beige/30"
                                        placeholder="Ceritakan singkat poin yang Anda suka...">{{ $ulasanUser ? $ulasanUser->ulasan : old('ulasan') }}</textarea>
                                </div>

                                <div class="md:col-span-2 flex flex-col justify-end">
                                    <button type="submit"
                                        class="w-full bg-beige hover:bg-white text-Chocolate rounded-xl font-black py-4 transition-all active:scale-95">
                                        {{ $ulasanUser ? 'Update' : 'Kirim' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                @endif
                </section>

                <section class="mt-16 space-y-8">
                    <div class="flex items-end justify-between border-b border-beige/60 pb-5">
                        <div>
                            <h3 class="text-2xl font-serif font-bold text-DarkChocolate">Ulasan Buku</h3>
                            <p class="text-xs text-MediumBrown font-medium mt-1">Apa kata mereka yang sudah membaca.
                            </p>
                        </div>
                        <div class="flex items-center gap-2 bg-beige/30 px-4 py-2 rounded-full border border-beige">
                            <span class="text-[11px] font-black text-Chocolate uppercase tracking-wider">
                                {{ $pinjam->ulasans->count() }} Ulasan
                            </span>
                        </div>
                    </div>

                    @if ($pinjam->ulasans->count() > 0)
                        <div class="grid gap-8">
                            @foreach ($pinjam->ulasans as $ulasan)
                                <div
                                    class="group relative bg-transparent border-l-2 border-beige hover:border-Chocolate pl-6 transition-all duration-300">
                                    <div class="flex items-start gap-5">
                                        <div class="relative flex-shrink-0">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($ulasan->user->name) }}&background=5D3A2E&color=fff&bold=true"
                                                class="w-10 h-10 rounded-xl object-cover"
                                                alt="{{ $ulasan->user->name }}">
                                        </div>

                                        <div class="flex-1 min-w-0">
                                            <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
                                                <div class="min-w-0 flex-1">
                                                    <h4
                                                        class="font-bold text-DarkChocolate text-sm tracking-tight block truncate">
                                                        {{ $ulasan->user->name }}
                                                    </h4>
                                                    <span
                                                        class="text-[10px] text-MediumBrown/50 font-medium block mt-0.5">
                                                        {{ $ulasan->created_at->translatedFormat('d M Y') }}
                                                    </span>
                                                </div>

                                                <div
                                                    class="flex gap-0.5 text-[8px] text-Chocolate px-2 py-1 bg-beige/40 rounded-md flex-shrink-0 self-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i
                                                            class="fas fa-star {{ $i <= $ulasan->rating ? '' : 'opacity-20' }}"></i>
                                                    @endfor
                                                </div>
                                            </div>

                                            <div
                                                class="text-DarkChocolate/80 text-[15px] leading-relaxed font-normal italic break-all md:break-words overflow-hidden">
                                                <span
                                                    class="text-2xl font-serif text-beige leading-none inline-block align-top mr-1">“</span>
                                                {{ $ulasan->ulasan }}
                                                <span
                                                    class="text-2xl font-serif text-beige leading-none inline-block align-bottom ml-1">”</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div
                            class="flex flex-col items-center justify-center py-20 bg-white border border-beige rounded-[3rem] shadow-sm">
                            <div class="w-16 h-16 bg-beige/30 rounded-full flex items-center justify-center mb-4">
                                <i class="fa-regular fa-comment-dots text-Caramel text-xl"></i>
                            </div>
                            <p class="text-DarkChocolate font-bold text-sm">Belum ada diskusi.</p>
                            <p class="text-MediumBrown text-[11px] mt-1">Jadilah yang pertama memberikan ulasan untuk
                                buku ini.</p>
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </main>
</body>

</html>
