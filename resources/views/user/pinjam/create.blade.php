<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan Aksara') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f3f4f6] font-sans antialiased text-slate-800">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-8">
            <div class="relative flex items-center h-[88px]">
                <div class="flex items-center shrink-0">
                    <a href="#" class="flex items-center group">
                        <div class="bg-amber-500 group-hover:bg-amber-600 p-2.5 rounded-xl transition-colors duration-300">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <span class="ml-3 text-[28px] font-extrabold text-amber-600 group-hover:text-amber-700 transition-colors duration-300 leading-none">
                            Aksara.
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 items-center gap-14">
                    <a href="{{ route('MDU') }}" class="text-slate-700 hover:text-amber-600 text-[18px] font-medium transition-colors">
                        <i class="fas fa-book mr-2"></i> Katalog Buku
                    </a>
                    <a href="{{ route('riwayat') }}" class="text-slate-700 hover:text-amber-600 text-[18px] font-medium transition-colors">
                        <i class="fas fa-history mr-2"></i> Riwayat
                    </a>
                </div>

                <div class="ml-auto flex items-center gap-4">
                    <div class="relative group hidden md:block">
                        <button type="button" class="flex items-center gap-3 p-1 rounded-full hover:bg-gray-50 transition-all duration-200 focus:outline-none">
                            <div class="relative">
                                <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-amber-500 shadow-sm">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="User" class="h-full w-full object-cover">
                                </div>
                                <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start leading-tight">
                                <span class="text-sm font-bold text-gray-800 group-hover:text-amber-600 transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-wider font-semibold">
                                    {{ Auth::user()->role == 'user' ? 'Member' : 'Admin' }}
                                </span>
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-400 hidden lg:inline transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto py-10 px-6">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

            <div class="bg-slate-50 p-8 border-b border-gray-100">
                <div class="flex flex-col sm:flex-row items-center sm:items-start gap-8">
                    <img src="{{ asset('storage/' . $pinjam->cover) }}"
                        class="w-32 h-44 object-cover rounded-xl shadow-lg border-4 border-white" 
                        alt="Cover">
                    
                    <div class="text-center sm:text-left">
                        <h2 class="text-2xl font-extrabold text-slate-800 leading-tight mt-3">{{ $pinjam->judul_buku }}</h2>
                        <p class="text-base text-slate-500 mt-1">{{ $pinjam->penulis }}</p>
                        
                        <div class="mt-4 flex flex-wrap justify-center sm:justify-start gap-3">
                            <div class="flex items-center gap-1.5 text-[11px] font-bold text-slate-600 bg-white border border-gray-200 px-3 py-1.5 rounded-lg">
                                <i class="fas fa-calendar text-amber-500"></i> {{ $pinjam->tahun_terbit }}
                            </div>
                            <div class="flex items-center gap-1.5 text-[11px] font-bold text-slate-600 bg-white border border-gray-200 px-3 py-1.5 rounded-lg">
                                <i class="fas fa-layer-group text-blue-500"></i> Stok: {{ $pinjam->stok }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <form action="{{ route('store-peminjaman') }}" method="POST" >
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="buku_id" value="{{ $pinjam->id }}">
                    <input type="hidden" name="status" value="menunggu">

                    <div class="space-y-2">
                        <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-xl mb-6">
                            <p class="text-xs text-amber-900 leading-relaxed">
                                <i class="fas fa-user-check mr-1 text-amber-600"></i> Peminjam: <strong>{{ Auth::user()->name }}</strong>. 
                                Silakan tentukan kapan Anda akan mengembalikan buku ini.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal Pinjam</label>
                                <div class="relative">
                                    <i class="fas fa-calendar-day absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                    <input type="date" value="{{ date('Y-m-d') }}" readonly
                                        class="w-full pl-11 pr-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-gray-500 cursor-not-allowed outline-none">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs font-bold text-amber-600 uppercase tracking-wider">Tanggal Kembali</label>
                                <div class="relative">
                                    <i class="fas fa-calendar-check absolute left-4 top-1/2 -translate-y-1/2 text-amber-500"></i>
                                    <input type="date" name="tanggal_pengembalian"
                                        min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                                        class="w-full pl-11 pr-4 py-3 border-2 border-amber-100 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 rounded-xl outline-none transition-all font-semibold shadow-sm">
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-gray-100 mt-6 space-y-4">
                            <button type="submit"
                                class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-amber-200 transition-all flex items-center justify-center gap-3 active:scale-[0.98]">
                                <i class="fas fa-check-circle text-lg"></i>
                                Konfirmasi Pinjam Buku
                            </button>

                            <a href="{{ route('detail-buku', $pinjam->id) }}" 
                                class="w-full flex items-center justify-center gap-2 text-slate-500 hover:text-slate-800 font-semibold py-2 transition-colors duration-200">
                                <i class="fas fa-arrow-left text-xs"></i>
                                <span>Kembali</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center text-gray-400 text-[10px] mt-8 uppercase tracking-widest">
            Perpustakaan Digital Aksara
        </p>
    </main>

</body>

</html>