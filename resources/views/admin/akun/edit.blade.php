@extends('layouts.admin')

@section('content')

    <body class="bg-[#FDFBF7] font-sans antialiased text-DarkChocolate">
        <div class="flex min-h-screen">
            <div class="flex flex-1 flex-col overflow-hidden">

                <main class="p-8 space-y-8 overflow-y-auto bg-gray-50/50 flex-1">
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
                                    <a href="{{ route('MDA') }}" class="ml-1 hover:text-Chocolate transition-colors">Data
                                        petugas</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="ml-1 font-medium text-Chocolate">Edit Petugas</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-Chocolate rounded-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </div>
                                <h2 class="text-3xl font-extrabold text-Chocolate tracking-tight">Edit Akun Petugas</h2>
                            </div>
                            <p class="text-MediumBrown text-sm mt-2 ml-11">Perbarui informasi kredensial dan detail profil
                                petugas.</p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-2xl shadow-xl shadow-Chocolate/5  overflow-hidden">
                        <div class="p-8 md:p-10">
                            <form action="{{ route('update-MDA', $petugas->id) }}" method="POST" class="space-y-8">
                                @csrf
                                @method('PUT')

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                    <div class="space-y-2">
                                        <label for="nama_lengkap" class="text-sm font-semibold text-Chocolate ml-1">Nama
                                            Lengkap</label>
                                        <div class="relative group">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-Chocolate text-Caramel/60">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="NamaLengkap" id="nama_lengkap"
                                                class="w-full pl-11 pr-4 py-3 bg-beige/10 border border-Caramel/20 rounded-xl focus:ring-4 focus:ring-Caramel/10 focus:border-Caramel outline-none transition-all text-sm text-DarkChocolate"
                                                placeholder="Masukkan nama lengkap" value="{{ $petugas->NamaLengkap }}">
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="nama"
                                            class="text-sm font-semibold text-Chocolate ml-1">Username</label>
                                        <div class="relative group">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-Chocolate text-Caramel/60">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="name" id="nama"
                                                class="w-full pl-11 pr-4 py-3 bg-beige/10 border border-Caramel/20 rounded-xl focus:ring-4 focus:ring-Caramel/10 focus:border-Caramel outline-none transition-all text-sm text-DarkChocolate"
                                                placeholder="Contoh: user123" value="{{ $petugas->name }}">
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="email" class="text-sm font-semibold text-Chocolate ml-1">Alamat
                                            Email</label>
                                        <div class="relative group">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-Chocolate text-Caramel/60">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <input type="email" name="email" id="email"
                                                class="w-full pl-11 pr-4 py-3 bg-beige/10 border border-Caramel/20 rounded-xl focus:ring-4 focus:ring-Caramel/10 focus:border-Caramel outline-none transition-all text-sm text-DarkChocolate"
                                                placeholder="nama@email.com" value="{{ $petugas->email }}">
                                        </div>
                                    </div>

                                    <div class="space-y-2">
                                        <label for="password" class="text-sm font-semibold text-Chocolate ml-1">Password
                                            Baru (Opsional)</label>
                                        <div class="relative group">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-colors group-focus-within:text-Chocolate text-Caramel/60">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                            </div>
                                            <input type="password" name="password" id="password"
                                                class="w-full pl-11 pr-4 py-3 bg-beige/10 border border-Caramel/20 rounded-xl focus:ring-4 focus:ring-Caramel/10 focus:border-Caramel outline-none transition-all text-sm text-DarkChocolate"
                                                placeholder="Kosongkan jika tidak ingin mengubah">
                                        </div>
                                    </div>

                                    <input type="text" name="role" id="role" value="petugas" hidden>

                                    <div class="col-span-1 md:col-span-2 space-y-2">
                                        <label for="alamat" class="text-sm font-semibold text-Chocolate ml-1">Alamat
                                            Lengkap</label>
                                        <div class="relative group">
                                            <div
                                                class="absolute top-3.5 left-0 pl-4 flex items-start pointer-events-none transition-colors group-focus-within:text-Chocolate text-Caramel/60">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                </svg>
                                            </div>
                                            <textarea name="alamat" id="alamat" rows="3"
                                                class="w-full pl-11 pr-4 py-3 bg-beige/10 border border-Caramel/20 rounded-xl focus:ring-4 focus:ring-Caramel/10 focus:border-Caramel outline-none transition-all text-sm text-DarkChocolate resize-none"
                                                placeholder="Masukkan alamat lengkap...">{{ $petugas->alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-6 border-t border-beige">
                                    <a href="{{ route('MDA') }}"><button type="button"
                                        class="w-full sm:w-auto px-8 py-3 rounded-xl text-sm font-bold text-MediumBrown hover:text-Chocolate bg-white border border-Caramel/30 hover:border-Caramel hover:bg-beige/20 transition-all duration-200">
                                        Batal
                                    </button></a>
                                    <button type="submit"
                                        class="w-full sm:w-auto px-8 py-3 rounded-xl text-sm font-bold text-white bg-Caramel hover:bg-MediumBrown shadow-lg shadow-Caramel/20 hover:shadow-MediumBrown/30 active:scale-95 transition-all duration-200 flex items-center justify-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                        Perbarui Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </body>
@endsection
