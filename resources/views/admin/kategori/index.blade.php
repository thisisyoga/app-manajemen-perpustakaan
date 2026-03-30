@extends('layouts.admin')

@section('content')
    <div class="px-2 space-y-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">

            <form action="{{ url()->current() }}" method="GET">
                <div class="relative w-full md:w-80 group">
                    <i
                        class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-MediumBrown/30 text-xs transition-colors group-focus-within:text-Chocolate"></i>
                    <input type="text" placeholder="Cari kategori buku..." name="search" value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2.5 bg-white border border-beige/40 rounded-2xl text-xs focus:outline-none focus:ring-4 focus:ring-Chocolate/5 transition-all text-DarkChocolate shadow-sm">
                </div>
            </form>

            <a href="{{ route('create-MDK') }}" class="w-full md:w-auto">
                <button
                    class="w-full md:w-auto flex items-center justify-center gap-2 bg-Chocolate text-white px-6 py-2.5 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-DarkChocolate transition-all shadow-lg shadow-Chocolate/20 active:scale-95">
                    <i class="fas fa-plus text-[10px]"></i> Tambah Kategori
                </button>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($kategori as $item)
                <div class="p-6 bg-white rounded-2xl border border-beige/20 shadow-sm">
                    <h3 class="font-bold text-DarkChocolate">{{ $item->nama_kategori }}</h3>
                </div>
            @empty
                <div
                    class="col-span-full py-16 text-center bg-beige/5 rounded-[32px] border-2 border-dashed border-beige/30">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-beige/20 mb-4">
                        <i class="fas fa-search text-Caramel text-xl"></i>
                    </div>
                    <h3 class="text-lg font-serif font-bold text-DarkChocolate">Kategori Tidak Ditemukan</h3>
                    <p class="text-xs text-MediumBrown/50 mt-2 max-w-xs mx-auto">
                        Maaf, kami tidak bisa menemukan kategori <span
                            class="font-bold text-Chocolate">"{{ request('search') }}"</span>.
                        Coba gunakan kata kunci lain atau periksa ejaan Anda.
                    </p>
                </div>
            @endforelse
        </div>
        
    </div>
@endsection
