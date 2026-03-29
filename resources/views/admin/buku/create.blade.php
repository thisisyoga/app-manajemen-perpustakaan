@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gray-50/50 pb-20">
        <main class="px-4 md:px-8 max-w-5xl mx-auto pt-8">

            <div class="mb-8">
                <nav class="flex mb-4 text-sm text-gray-500" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin-dashboard') }}"
                                class="hover:text-Chocolate transition-colors">Dashboard</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ route('MDB') }}" class="ml-1 hover:text-Chocolate transition-colors">Data
                                    Buku</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ml-1 font-medium text-Chocolate">Tambah Buku</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div>
                    <h2 class="text-3xl font-extrabold text-DarkChocolate tracking-tight">Tambah Buku Baru</h2>
                    <p class="text-gray-500 mt-1">Daftarkan koleksi buku baru ke dalam sistem perpustakaan.</p>
                </div>

            </div>

            <div class="bg-white rounded-[24px] shadow-sm border border-gray-100 overflow-hidden">
                {{-- <div class="h-2 bg-gradient-to-r from-Chocolate via-Caramel to-transparent"></div> --}}

                <form action="{{ route('store-MDB') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-10">
                    @csrf
                    @if ($errors->any())
                        <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-rose-500 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M10.29 3.86l-7.82 13.54A1 1 0 003.34 19h17.32a1 1 0 00.87-1.5L13.71 3.86a1 1 0 00-1.74 0z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-bold text-rose-700">Data belum bisa disimpan.</p>
                                    <ul class="mt-1 text-sm text-rose-600 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                        <div class="lg:col-span-4 space-y-6">
                            <div>
                                <label
                                    class="block text-sm font-bold text-DarkChocolate uppercase tracking-wider mb-4">Cover
                                    Buku</label>

                                <div id="preview"
                                    class="relative mb-4 group aspect-[3/4] rounded-2xl overflow-hidden bg-gray-100 border-2 border-dashed border-gray-200 flex items-center justify-center">
                                    <img id="preview-image" class="hidden w-full h-full object-cover shadow-inner"
                                        src="" alt="Preview">

                                    <div id="upload-placeholder"
                                        class="flex flex-col items-center text-gray-400 group-hover:text-Chocolate transition-colors">
                                        <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-xs font-medium">Belum ada foto</p>
                                    </div>
                                </div>

                                <label for="image"
                                    class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-beige/10 border border-Chocolate/20 text-Chocolate rounded-xl cursor-pointer hover:bg-Chocolate hover:text-white transition-all font-bold text-xs uppercase tracking-widest shadow-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Pilih File Cover
                                </label>
                                <input id="image" name="image" type="file" class="hidden" accept="image/*" />
                                <p class="mt-3 text-[11px] text-gray-400 leading-relaxed text-center">Rekomendasi rasio 3:4.
                                    Format JPG/PNG max 2MB.</p>
                            </div>
                        </div>

                        <div class="lg:col-span-8 space-y-6">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="md:col-span-2">
                                    <label for="judul_buku"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">Judul
                                        Buku <span class="text-rose-500">*</span></label>
                                    <input type="text" name="judul_buku" id="judul_buku"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-4 focus:ring-Chocolate/10 focus:border-Chocolate focus:bg-white transition-all outline-none text-gray-700 placeholder:text-gray-300"
                                        placeholder="Masukkan judul lengkap buku..." required
                                        value="{{ old('judul_buku') }}">
                                    @error('judul_buku')
                                        <p class="mt-1 text-xs text-rose-500 font-medium italic">* {{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="isbn"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">ISBN
                                        <span class="text-rose-500">*</span></label>
                                    <input type="text" name="isbn" id="isbn"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-Chocolate focus:ring-4 focus:ring-Chocolate/10 outline-none transition-all"
                                        placeholder="978-xxx..." required value="{{ old('isbn') }}">
                                </div>

                                <div>
                                    <label for="penulis"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">Penulis
                                        <span class="text-rose-500">*</span></label>
                                    <input type="text" name="penulis" id="penulis"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-Chocolate focus:ring-4 focus:ring-Chocolate/10 outline-none transition-all"
                                        placeholder="Nama penulis..." required value="{{ old('penulis') }}">
                                </div>

                                <div>
                                    <label for="penerbit"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">Penerbit
                                        <span class="text-rose-500">*</span></label>
                                    <input type="text" name="penerbit" id="penerbit"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-Chocolate focus:ring-4 focus:ring-Chocolate/10 outline-none transition-all"
                                        placeholder="Nama penerbit..." required value="{{ old('penerbit') }}">
                                </div>

                                <div class="relative">
                                    <label for="tahun_terbit"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">Tahun
                                        Terbit <span class="text-rose-500">*</span></label>
                                    <input type="number" name="tahun_terbit" id="tahun_terbit"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-Chocolate focus:ring-4 focus:ring-Chocolate/10 outline-none transition-all"
                                        placeholder="2024" required value="{{ old('tahun_terbit') }}">
                                </div>

                                <div class="relative">
                                    <label for="stok"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">Stok
                                        Tersedia <span class="text-rose-500">*</span></label>
                                    <div class="relative">
                                        <input type="number" name="stok" id="stok"
                                            class="w-full pl-4 pr-12 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-Chocolate focus:ring-4 focus:ring-Chocolate/10 outline-none transition-all"
                                            placeholder="0" required value="{{ old('stok') }}">
                                        <span
                                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-xs font-bold">PCS</span>
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

                                <div class="md:col-span-2">
                                    <label for="deskripsi"
                                        class="block text-xs font-bold text-DarkChocolate uppercase tracking-widest mb-2 ml-1">Sinopsis
                                        Singkat</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="4"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:border-Chocolate focus:ring-4 focus:ring-Chocolate/10 outline-none transition-all resize-none placeholder:text-gray-300"
                                        placeholder="Tulis sinopsis buku untuk menarik pembaca...">{{ old('deskripsi') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-10 mt-10 border-t border-gray-100">
                        <a href="{{ route('MDB') }}"
                            class="px-8 py-3 rounded-xl text-xs font-bold uppercase tracking-[0.2em] text-gray-400 hover:text-rose-500 hover:bg-rose-50 transition-all">
                            Batal
                        </a>
                        <button type="submit"
                            class="flex items-center gap-2 px-10 py-3 bg-Chocolate text-white text-xs font-bold uppercase tracking-[0.2em] rounded-xl hover:bg-DarkChocolate transition-all shadow-lg shadow-Chocolate/20 active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview');
            const previewImg = document.getElementById('preview-image');
            const placeholder = document.getElementById('upload-placeholder');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                    preview.classList.remove('border-dashed', 'bg-gray-100');
                    preview.classList.add('border-solid', 'border-white', 'ring-1', 'ring-gray-200');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
