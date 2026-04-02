@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50/50 pb-12">
    <main class="p-4 md:p-6 max-w-5xl mx-auto">
        
        <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-beige/30 pb-4">
            <div>
                <nav class="flex mb-1 text-[11px] uppercase tracking-wider text-MediumBrown/60">
                    <ol class="inline-flex items-center space-x-2">
                        <li><a href="{{ route('MDB') }}" class="hover:text-Chocolate">Data Buku</a></li>
                        <li class="text-beige">></li>
                        <li class="text-Chocolate font-bold">Detail</li>
                    </ol>
                </nav>
                <h2 class="text-2xl font-black text-DarkChocolate uppercase tracking-tight">Detail Buku</h2>
            </div>
            
            <div class="flex items-center gap-2">
                {{-- <a href="{{ route('edit-MDB', $buku->id) }}" 
                   class="flex items-center gap-2 px-4 py-2 bg-white border border-beige rounded-xl text-xs font-bold text-Chocolate hover:bg-beige/10 transition-all shadow-sm">
                    <i class="fas fa-edit text-[10px]"></i> Edit
                </a> --}}
                <a href="{{ route('MDB') }}" 
                   class="flex items-center gap-2 px-4 py-2 bg-Chocolate text-white rounded-xl text-xs font-bold hover:bg-DarkChocolate transition-all shadow-md shadow-Chocolate/20">
                    <i class="fas fa-arrow-left text-[10px]"></i> Kembali
                </a>
            </div>
        </div>

        <div class="bg-white rounded-[24px] shadow-sm border border-beige/30 overflow-hidden">
            <div class="p-5 md:p-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12">
                    
                    <div class="lg:col-span-4 max-w-[280px] mx-auto lg:mx-0">
                        <div class="sticky top-6">
                            <div class="relative group">
                                <div class="absolute -inset-1 bg-gradient-to-r from-Caramel/20 to-Chocolate/10 rounded-2xl blur opacity-25"></div>
                                <div class="relative overflow-hidden rounded-2xl shadow-lg border-[3px] border-white aspect-[3/4.2] bg-beige/5">
                                    <img src="{{ $buku->cover ? asset('storage/' . $buku->cover) : 'https://via.placeholder.com/600x840?text=No+Cover' }}" 
                                         alt="{{ $buku->judul_buku }}"
                                         class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-105">
                                </div>
                            </div>
                            
                            <div class="mt-4 flex items-center justify-center gap-2 px-3 py-2 rounded-xl border {{ $buku->stok > 0 ? 'bg-green-50 border-green-100 text-green-600' : 'bg-red-50 border-red-100 text-red-600' }}">
                                <div class="w-1.5 h-1.5 rounded-full {{ $buku->stok > 0 ? 'bg-green-500' : 'bg-red-500' }} animate-pulse"></div>
                                <span class="text-[10px] font-black uppercase tracking-widest">
                                    {{ $buku->stok > 0 ? 'Stok: ' . $buku->stok : 'Habis' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 space-y-6">
                        <div class="space-y-2">
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($buku->RelasiKategori as $kategori)
                                <span class="px-2 py-0.5 bg-beige/20 text-MediumBrown text-[9px] font-bold uppercase tracking-tighter rounded border border-beige/40">
                                    {{ $kategori->nama_kategori }}
                                </span>
                                @endforeach
                            </div>
                            <h1 class="text-2xl md:text-3xl font-black text-DarkChocolate leading-tight uppercase tracking-tight">
                                {{ $buku->judul_buku }}
                            </h1>
                            <p class="text-base md:text-lg text-MediumBrown/80 font-medium italic">
                                oleh <span class="text-MediumBrown font-bold">{{ $buku->penulis }}</span>
                            </p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 border-y border-beige/20 py-6">
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-Caramel uppercase tracking-widest">ISBN</p>
                                <p class="text-sm font-bold text-DarkChocolate">{{ $buku->isbn }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-Caramel uppercase tracking-widest">Penerbit</p>
                                <p class="text-sm font-bold text-DarkChocolate">{{ $buku->penerbit }}</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-[9px] font-black text-Caramel uppercase tracking-widest">Tahun Terbit</p>
                                <p class="text-sm font-bold text-DarkChocolate">{{ $buku->tahun_terbit }}</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <h3 class="text-[11px] font-black text-Chocolate uppercase tracking-[0.2em] flex items-center gap-2">
                                <span class="w-6 h-[1px] bg-beige"></span> Sinopsis Buku
                            </h3>
                            <div class="text-sm text-MediumBrown/90 leading-relaxed text-justify italic font-serif">
                                {!! nl2br(e($buku->deskripsi ?? 'Deskripsi belum tersedia.')) !!}
                            </div>
                        </div>

                        {{-- <div class="pt-6 flex items-center gap-4 text-[10px] text-MediumBrown/40 font-bold border-t border-beige/10">
                            <div class="flex items-center gap-1">
                                <i class="far fa-clock"></i>
                                <span>Input: {{ $buku->created_at->format('d/m/y') }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <i class="fas fa-sync-alt"></i>
                                <span>Update: {{ $buku->updated_at->diffForHumans() }}</span>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
@endsection