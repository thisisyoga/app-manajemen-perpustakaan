@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50/50 flex items-center justify-center py-12 px-4">
    <main class="w-full max-w-lg mx-auto">
        
        <div class="flex items-center justify-between mb-6 px-2">
            <div>
                <h2 class="text-2xl font-extrabold text-DarkChocolate tracking-tight">Kategori Baru</h2>
                <p class="text-xs text-gray-500 mt-1">Tambahkan klasifikasi buku baru.</p>
            </div>
            <a href="{{ route('MDK') }}" class="p-2 bg-white rounded-full shadow-sm border border-gray-100 text-gray-400 hover:text-Chocolate transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </a>
        </div>

        <div class="bg-white rounded-[28px] shadow-xl shadow-Chocolate/5 border border-gray-100 overflow-hidden">
            {{-- <div class="h-1.5 bg-beige/20">
                <div class="h-full bg-Chocolate w-1/3 transition-all duration-700"></div>
            </div> --}}

            <div class="p-8 md:p-10">
                <form action="{{ route('store-MDK') }}" method="POST" class="space-y-8">
                    @csrf

                    <div class="space-y-4">
                        <label for="nama_kategori" class="block text-[11px] font-bold uppercase tracking-[0.15em] text-DarkChocolate/60 ml-1">
                            Nama Kategori
                        </label>
                        
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-300 group-focus-within:text-Chocolate transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            
                            <input type="text" name="nama_kategori" id="nama_kategori" 
                                class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-sm font-semibold focus:ring-4 focus:ring-Chocolate/5 focus:border-Chocolate focus:bg-white outline-none transition-all text-DarkChocolate placeholder:text-gray-300 @error('nama_kategori') border-rose-400 ring-rose-50 ring-4 @enderror"
                                placeholder="Contoh: Sains, Sejarah, Arsitektur" 
                                value="{{ old('nama_kategori') }}" required autofocus>
                        </div>
                        
                        @error('nama_kategori')
                            <div class="flex items-center gap-2 text-rose-500 font-bold text-[10px] uppercase tracking-wider ml-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                        {{-- <div class="p-4 bg-beige/10 rounded-2xl border border-beige/30 flex gap-3">
                            <svg class="w-5 h-5 text-Chocolate shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-[11px] text-DarkChocolate/70 leading-relaxed italic">
                                Nama kategori yang unik membantu user menemukan buku lebih cepat. Hindari penulisan duplikat.
                            </p>
                        </div> --}}

                    <div class="flex items-center gap-3 pt-6 border-t border-gray-50">
                        <a href="{{ route('MDK') }}" 
                            class="flex-1 px-6 py-3.5 rounded-2xl text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-DarkChocolate hover:bg-gray-100 transition-all text-center">
                            Batal
                        </a>
                        <button type="submit" 
                            class="flex-[2] flex items-center justify-center gap-2 px-6 py-3.5 bg-Chocolate text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-DarkChocolate transition-all shadow-lg shadow-Chocolate/20 active:scale-95 group">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>Simpan Kategori</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection