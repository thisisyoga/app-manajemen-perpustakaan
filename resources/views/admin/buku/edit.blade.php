@extends('layouts.admin')

@section('content')

    <body class="bg-gray-100 font-sans antialiased">
        <div class="flex min-h-screen">
            <div class="flex flex-1 flex-col overflow-hidden">

                <main class="p-6 space-y-6 overflow-y-auto bg-gray-50 flex-1">

                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-amber-600">Edit Buku</h2>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="p-6 md:p-8">
                            <form action="{{ route('update-MDB', $book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <!-- Judul Buku -->
                                    <div class="col-span-2">
                                        <label for="judul_buku" class="block text-sm font-medium text-gray-700 mb-1">
                                            Judul Buku <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                </svg>
                                            </div>
                                            <input type="text" name="judul_buku" id="judul_buku"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="Masukkan judul buku"
                                                value="{{ old('judul_buku', $book->judul_buku) }}" required>
                                        </div>
                                        @if ($errors->has('judul_buku'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('judul_buku') }}</p>
                                        @endif
                                    </div>

                                    <!-- ISBN -->
                                    <div class="col-span-1">
                                        <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">
                                            ISBN <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                            </div>
                                            <input type="text" name="isbn" id="isbn"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="978-xxx-xxx-xxx-x" value="{{ old('isbn', $book->isbn) }}"
                                                required>
                                        </div>

                                        @if ($errors->has('isbn'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('isbn') }}</p>
                                        @endif
                                    </div>

                                    <!-- Penulis -->
                                    <div class="col-span-1">
                                        <label for="penulis" class="block text-sm font-medium text-gray-700 mb-1">
                                            Penulis <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="penulis" id="penulis"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="Nama penulis" value="{{ old('penulis', $book->penulis) }}"
                                                required>
                                        </div>

                                        @if ($errors->has('penulis'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('penulis') }}</p>
                                        @endif
                                    </div>

                                    <!-- Penerbit -->
                                    <div class="col-span-1">
                                        <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-1">
                                            Penerbit <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                            <input type="text" name="penerbit" id="penerbit"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="Nama penerbit" value="{{ old('penerbit', $book->penerbit) }}"
                                                required>
                                        </div>

                                        @if ($errors->has('penerbit'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('penerbit') }}</p>
                                        @endif
                                    </div>

                                    <!-- Tahun Terbit -->
                                    <div class="col-span-1">
                                        <label for="tahun_terbit" class="block text-sm font-medium text-gray-700 mb-1">
                                            Tahun Terbit <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <input type="number" name="tahun_terbit" id="tahun_terbit"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="2024" min="1900" max="2100"
                                                value="{{ old('tahun_terbit', $book->tahun_terbit) }}" required>
                                        </div>
                                        @if ($errors->has('tahun_terbit'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('tahun_terbit') }}</p>
                                        @endif
                                    </div>

                                    <!-- Stok -->
                                    <div class="col-span-1">
                                        <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">
                                            Stok <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                </svg>
                                            </div>
                                            <input type="number" name="stok" id="stok"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="0" min="0" value="{{ old('stok', $book->stok) }}"
                                                required>
                                        </div>

                                        @if ($errors->has('stok'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('stok') }}</p>
                                        @endif
                                    </div>

                                    <!-- Kategori -->
                                    <div class="col-span-1">
                                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">
                                            Kategori <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                            </div>
                                            <select name="kategori" id="kategori"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm appearance-none"
                                                required>
                                                <option value="">-- Pilih Kategori --</option>
                                                @foreach ($kategori as $k)
                                                    <option value="{{ $k->id }}"
                                                        {{ in_array($k->id, old('kategori', $selectedKategori)) ? 'selected' : '' }}>
                                                        {{ $k->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </div>
                                        </div>

                                        @if ($errors->has('kategori'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('kategori') }}</p>
                                        @endif
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-span-2">
                                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">
                                            Deskripsi Buku
                                        </label>
                                        <textarea name="deskripsi" id="deskripsi" rows="4"
                                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm resize-none"
                                            placeholder="Tulis deskripsi singkat atau sinopsis buku">{{ old('deskripsi', $book->deskripsi) }}</textarea>

                                        @if ($errors->has('deskripsi'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('deskripsi') }}</p>
                                        @endif
                                    </div>

                                    <!-- Upload Foto -->
                                    <div class="col-span-2">
                                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                                            Foto Cover Buku
                                        </label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="image"
                                                class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-200">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                        </path>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik
                                                            untuk upload</span> atau drag and drop</p>
                                                    <p class="text-xs text-gray-500">PNG, JPG atau JPEG (MAX. 2MB)</p>
                                                </div>
                                                <input id="image" name="image" type="file" class="hidden"
                                                    accept="image/*" />
                                            </label>
                                        </div>
                                        <div id="preview" class="mt-4 hidden">
                                            <img id="preview-image" class="w-32 h-40 object-cover rounded-lg shadow-md"
                                                src="{{ asset('storage/' . $book->cover) }}" alt="Preview">
                                        </div>

                                        @if ($errors->has('image'))
                                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>

                                </div>

                                <div class="mt-8 flex items-center justify-end gap-4 border-t pt-6">
                                    <button type="button"
                                        class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2.5 rounded-lg text-sm font-medium text-white bg-amber-600 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 shadow-md transition-colors flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Simpan Perubahan
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </main>
            </div>
        </div>

        <!-- JavaScript for Image Preview -->
        <script>
            document.getElementById('image').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('preview-image').src = e.target.result;
                        document.getElementById('preview').classList.remove('hidden');
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>

    </body>
@endsection
