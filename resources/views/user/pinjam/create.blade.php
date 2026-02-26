@extends('layouts.user')

@section('content')
    <div class="flex min-h-screen bg-gray-100 font-sans antialiased">
        <div class="flex flex-1 flex-col overflow-hidden">
            <main class="p-6 space-y-6 overflow-y-auto bg-gray-50 flex-1">

                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-amber-600">Form Peminjaman Buku</h2>
                </div>

                {{-- Alert untuk pesan sukses atau error --}}
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="bg-amber-50 p-6 rounded-2xl border border-amber-100 shadow-sm">
                        <form action="{{ route('store-peminjaman') }}" method="POST" class="space-y-4">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            
                            <input type="hidden" name="buku_id" value="{{ $pinjam->id }}">
                            <input type="hidden" name="status" value="menunggu">

                            <div class="space-y-3">
                                <div>
                                    <label class="block text-xs font-bold text-amber-700 uppercase mb-1">Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_peminjaman" required
                                        class="w-full px-4 py-2 rounded-lg border border-gray-200 bg-gray-100 text-gray-500 outline-none text-sm cursor-not-allowed"
                                        value="{{ date('Y-m-d') }}" readonly>
                                    <small class="text-gray-400 text-[10px]">* Peminjaman hanya bisa dilakukan hari ini.</small>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-amber-700 uppercase mb-1">Tanggal Kembali</label>
                                    <input type="date" name="tanggal_pengembalian" 
                                        min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                                        class="w-full px-4 py-2 rounded-lg border border-amber-200 focus:ring-2 focus:ring-amber-500 outline-none text-sm">
                                    <small class="text-gray-400 text-[10px]">* Minimal pengembalian adalah besok.</small>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-amber-600 text-white font-bold py-3 rounded-xl hover:bg-amber-700 transition shadow-md flex justify-center items-center gap-2">
                                <span>📩</span> Ajukan Peminjaman
                            </button>
                            
                            <a href="{{ url()->previous() }}" class="block text-center text-sm text-gray-500 hover:text-amber-600 mt-2">
                                Batal
                            </a>
                        </form>
                    </div>
                </div>

            </main>
        </div>
    </div>
@endsection