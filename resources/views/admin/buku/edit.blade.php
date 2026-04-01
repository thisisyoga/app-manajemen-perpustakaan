@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-50/50 pb-12">
    <main class="p-4 md:p-8 max-w-5xl mx-auto">
        
        <div class="mb-8">
            <nav class="flex mb-4 text-sm text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#" class="hover:text-Chocolate transition-colors">Dashboard</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ml-1 hover:text-Chocolate transition-colors">Data Buku</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 font-medium text-Chocolate">Edit Buku</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="text-3xl font-extrabold text-DarkChocolate tracking-tight">Edit Detail Buku</h2>
            <p class="text-gray-500 mt-1">Perbarui informasi buku, stok, dan kategori secara akurat.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-1 sm:p-2 bg-gradient-to-r from-Chocolate/10 to-transparent"></div>
            
            <div class="p-6 md:p-10">
                <form action="{{ route('update-MDB', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                        
                        <div class="lg:col-span-1">
                            <label class="block text-sm font-semibold text-DarkChocolate mb-4">Cover Buku Saat Ini</label>
                            
                            <div class="relative group">
                                <div id="preview" class="mb-4 overflow-hidden rounded-2xl shadow-lg border-4 border-white ring-1 ring-gray-200 aspect-[3/4] bg-gray-50">
                                    <img id="preview-image" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                         src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://via.placeholder.com/300x400?text=No+Cover' }}" 
                                         alt="Preview">
                                </div>
                                
                                <label for="image" class="flex flex-col items-center justify-center w-full p-4 border-2 border-dashed border-Caramel/40 rounded-xl cursor-pointer bg-beige/5 hover:bg-beige/20 hover:border-Chocolate transition-all group">
                                    <div class="flex flex-center items-center gap-2 text-Chocolate font-medium text-sm">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        Ganti Foto Cover
                                    </div>
                                    <input id="image" name="image" type="file" class="hidden" accept="image/*" />
                                </label>
                            </div>
                            <p class="mt-3 text-xs text-gray-400 text-center">Format: JPG, PNG. Maksimal 2MB.</p>
                        </div>

                        <div class="lg:col-span-2 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                
                                <div class="md:col-span-2">
                                    <label for="judul_buku" class="block text-sm font-semibold text-DarkChocolate mb-2">Judul Lengkap <span class="text-red-500">*</span></label>
                                    <input type="text" name="judul_buku" id="judul_buku"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-Chocolate/10 focus:border-Chocolate focus:bg-white transition-all outline-none text-gray-700"
                                           placeholder="Contoh: Filosofi Teras"
                                           value="{{ old('judul_buku', $book->judul_buku) }}" required>
                                    @error('judul_buku') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="isbn" class="block text-sm font-semibold text-DarkChocolate mb-2">ISBN <span class="text-red-500">*</span></label>
                                    <input type="text" name="isbn" id="isbn"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-Chocolate/10 focus:border-Chocolate focus:bg-white transition-all outline-none text-gray-700"
                                           value="{{ old('isbn', $book->isbn) }}" required>
                                </div>

                                <div>
                                    <label for="penulis" class="block text-sm font-semibold text-DarkChocolate mb-2">Nama Penulis <span class="text-red-500">*</span></label>
                                    <input type="text" name="penulis" id="penulis"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-Chocolate/10 focus:border-Chocolate focus:bg-white transition-all outline-none text-gray-700"
                                           value="{{ old('penulis', $book->penulis) }}" required>
                                </div>

                                <div>
                                    <label for="stok" class="block text-sm font-semibold text-DarkChocolate mb-2">Jumlah Stok <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="number" name="stok" id="stok"
                                               class="w-full pl-4 pr-12 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-Chocolate/10 focus:border-Chocolate focus:bg-white transition-all outline-none text-gray-700"
                                               value="{{ old('stok', $book->stok) }}" min="0" required>
                                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm">Pcs</span>
                                    </div>
                                </div>

                                <div>
                                    <label for="kategori"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">Kategori
                                        <span class="text-rose-500">*</span></label>
                                    <div class="relative">
                                        <div>
                                            <div
                                                class="grid grid-cols-2 md:grid-cols-3 gap-3 p-4 bg-gray-50 border border-gray-200 rounded-xl">
                                                @foreach ($kategori as $k)
                                                    <label class="flex items-center space-x-3 cursor-pointer group">
                                                        <div class="relative flex items-center">
                                                            <input type="checkbox" name="kategori[]"
                                                                value="{{ $k->id }}"
                                                                class="w-5 h-5 rounded border-gray-300 text-Chocolate focus:ring-Chocolate transition-all cursor-pointer"
                                                                {{ is_array(old('kategori')) && in_array($k->id, old('kategori')) ? 'checked' : '' }}>
                                                        </div>
                                                        <span
                                                            class="text-sm text-gray-600 group-hover:text-DarkChocolate transition-colors">
                                                            {{ $k->nama_kategori }}
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>

                                            @error('kategori')
                                                <p class="mt-1 text-xs text-rose-500 font-medium italic">* {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="deskripsi" class="block text-sm font-semibold text-DarkChocolate mb-2">Sinopsis / Deskripsi Buku</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="5"
                                              class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-Chocolate/10 focus:border-Chocolate focus:bg-white transition-all outline-none text-gray-700 resize-none"
                                              placeholder="Tulis ringkasan cerita buku...">{{ old('deskripsi', $book->deskripsi) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-end gap-3">
                        <a href="{{ url()->previous() }}" 
                           class="w-full sm:w-auto px-8 py-3 rounded-xl text-sm font-bold text-gray-500 bg-white border border-gray-200 hover:bg-gray-50 hover:text-gray-700 transition-all text-center">
                            Batal
                        </a>
                        <button type="submit"
                                class="w-full sm:w-auto px-10 py-3 rounded-xl text-sm font-bold text-white bg-Chocolate hover:bg-DarkChocolate shadow-lg shadow-Chocolate/20 focus:ring-4 focus:ring-Chocolate/30 transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </main>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgPreview = document.getElementById('preview-image');
                imgPreview.src = e.target.result;
                // Add a small animation effect
                imgPreview.classList.add('opacity-0');
                setTimeout(() => imgPreview.classList.remove('opacity-0'), 100);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection