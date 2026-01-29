@extends('layouts.admin')

@section('content')

    <body class="bg-gray-100 font-sans antialiased">
        <div class="flex min-h-screen">
            <div class="flex flex-1 flex-col overflow-hidden">

                <main class="p-6 space-y-6 overflow-y-auto bg-gray-50 flex-1">

                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-amber-600">Buat Akun Baru</h2>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="p-6 md:p-8">
                            <form action="#" method="POST">
                                <!-- @csrf (Aktifkan jika di Laravel) -->

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <div class="col-span-1">
                                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                            Lengkap</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="Masukkan nama lengkap">
                                        </div>
                                    </div>

                                    <!-- 2. Nama (Username) -->
                                    <div class="col-span-1">
                                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama /
                                            Username</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="nama" id="nama"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="Contoh: user123">
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                            Email</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <input type="email" name="email" id="email"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="nama@email.com">
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <label for="password"
                                            class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                            </div>
                                            <input type="password" name="password" id="password"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="********">
                                        </div>
                                    </div>

                                    <div class="col-span-1 md:col-span-2">
                                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role
                                            Pengguna</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                            </div>
                                            <select name="role" id="role"
                                                class="w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm bg-white appearance-none cursor-pointer">
                                                <option value="" disabled selected>Pilih Role...</option>
                                                <option value="user">User</option>
                                                <option value="petugas">Petugas</option>
                                            </select>
                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-1 md:col-span-2">
                                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                            Lengkap</label>
                                        <div class="relative">
                                            <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                            <textarea name="alamat" id="alamat" rows="4"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm resize-none"
                                                placeholder="Masukkan alamat lengkap..."></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="mt-8 flex items-center justify-end gap-4 border-t pt-6">
                                    <button type="button"
                                        class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2.5 rounded-lg text-sm font-medium text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 shadow-md transition-colors flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Simpan Akun
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    @endsection
