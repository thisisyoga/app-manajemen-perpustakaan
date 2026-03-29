@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50/50 flex items-center justify-center py-12 px-4">
    <main class="w-full max-w-lg mx-auto">
        
        <div class="flex items-end justify-between mb-6 px-2">
            <div>
                <h2 class="text-2xl font-extrabold text-DarkChocolate tracking-tight">Edit Kategori</h2>
                <p class="text-xs text-gray-500 mt-1">Perbarui informasi klasifikasi buku.</p>
            </div>
            <div class="flex flex-col items-end">
                <span class="text-[10px] font-black text-Chocolate/40 uppercase tracking-widest mb-1">Database Ref</span>
                <span class="px-3 py-1 bg-white border border-beige/40 rounded-lg text-[10px] font-bold text-Chocolate shadow-sm">
                    #KTG-{{ $kategori->id }}
                </span>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-xl shadow-Chocolate/5 border border-gray-100 overflow-hidden">
            {{-- <div class="h-1.5 bg-gradient-to-r from-amber-400 to-Chocolate"></div> --}}

            <div class="p-8 md:p-10">
                <form action="{{ route('update-MDK', $kategori->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <label for="nama_kategori" class="block text-[11px] font-bold uppercase tracking-[0.15em] text-DarkChocolate/60 ml-1">
                            Nama Kategori
                        </label>
                        
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-300 group-focus-within:text-Chocolate transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            
                            <input type="text" name="nama_kategori" id="nama_kategori" 
                                class="w-full pl-12 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl text-sm font-semibold focus:ring-4 focus:ring-Chocolate/5 focus:border-Chocolate focus:bg-white outline-none transition-all text-DarkChocolate placeholder:text-gray-300 @error('nama_kategori') border-rose-400 @enderror"
                                placeholder="Masukkan nama kategori..." 
                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required autofocus>
                        </div>
                        
                        @error('nama_kategori')
                            <p class="mt-2 text-[10px] text-rose-500 font-bold italic ml-1 tracking-tight italic">
                                * {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100 flex gap-3">
                        <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <p class="text-[11px] text-amber-700 leading-relaxed font-medium">
                            Perubahan pada nama kategori akan langsung berdampak pada semua buku yang terhubung dengan kategori ini.
                        </p>
                    </div>

                    <div class="flex items-center gap-3 pt-6 border-t border-gray-50">
                        <a href="{{ route('MDK') }}" 
                            class="flex-1 px-6 py-3.5 rounded-2xl text-[11px] font-black uppercase tracking-widest text-gray-400 hover:text-DarkChocolate hover:bg-gray-100 transition-all text-center">
                            Batal
                        </a>
                        <button type="submit" 
                            class="flex-[2] flex items-center justify-center gap-2 px-6 py-3.5 bg-DarkChocolate text-white text-[11px] font-black uppercase tracking-[0.2em] rounded-2xl hover:bg-black transition-all shadow-lg shadow-DarkChocolate/20 active:scale-95 group">
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>Simpan Perubahan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection