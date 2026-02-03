@extends('layouts.admin')

@section('content')

    <body class="bg-gray-100 font-sans antialiased">
        <div class="flex min-h-screen">
            <div class="flex flex-1 flex-col overflow-hidden">

                <main class="p-6 space-y-6 overflow-y-auto bg-gray-50 flex-1">

                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-amber-600">Buat Kategori Baru</h2>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="p-6 md:p-8">
                            <form action="{{ route('store-MDK') }}" method="POST">
                                 @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <div class="col-span-1">
                                        <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <input type="text" name="nama_kategori" id="nama_kategori"
                                                class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition-all text-sm"
                                                placeholder="Masukkan nama Kategori" >
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="mt-8 flex items-center justify-end gap-4 border-t pt-6">
                                    <button type="button"
                                        class="px-6 py-2.5 rounded-lg text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 transition-colors"
                                        >
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="px-6 py-2.5 rounded-lg text-sm font-medium text-white bg-amber-600 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 shadow-md transition-colors flex items-center"
                                        >
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Simpan Kategori
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    @endsection

