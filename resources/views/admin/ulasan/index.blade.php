@extends('layouts.admin')

@section('content')

<div class="container mx-auto py-8 px-4">
    
    <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-800">Manajemen Ulasan</h1>
            <p class="text-gray-500">Moderasi dan pantau feedback dari anggota perpustakaan.</p>
        </div>
        
        <div class="flex gap-4">
            <div class="bg-amber-50 p-4 rounded-xl border border-amber-100 flex items-center shadow-sm">
                <div class="p-3 bg-amber-500 rounded-lg text-white mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs text-amber-600 font-bold uppercase tracking-wider">Total Ulasan</p>
                    <p class="text-2xl font-bold text-gray-800">1,284</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-4 rounded-t-xl border-x border-t flex flex-wrap gap-4 items-center justify-between">
        <div class="relative w-full md:w-64">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
            <input type="text" class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg w-full focus:ring-2 focus:ring-amber-500 focus:outline-none" placeholder="Cari buku atau user...">
        </div>
        <div class="flex gap-2">
            <select class="border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                <option>Semua Rating</option>
                <option>Bintang 1-2 (Butuh Perhatian)</option>
                <option>Bintang 5</option>
            </select>
        </div>
    </div>

    <div class="bg-white rounded-b-xl shadow-sm border overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Informasi Buku & User</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Rating</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Komentar</th>
                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-8 bg-gray-200 rounded shadow-sm mr-3 flex-shrink-0 overflow-hidden">
                                <img src="https://via.placeholder.com/40x60" alt="cover">
                            </div>
                            <div>
                                <div class="text-sm font-bold text-gray-900">Bumi Manusia</div>
                                <div class="text-xs text-gray-500">Oleh: @ahmad_salim</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex text-yellow-400 text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span class="text-gray-300">★</span>
                        </div>
                        <span class="text-[10px] font-bold text-gray-400 uppercase">4.0 / 5.0</span>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 line-clamp-2 max-w-xs">
                            "Ceritanya sangat mendalam, namun ada beberapa bagian yang typo di halaman tengah."
                        </p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition" title="Lihat Detail">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            <button onclick="confirmDelete()" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus Ulasan">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="bg-gray-50 px-6 py-4 border-t">
            <div class="flex justify-between items-center text-sm text-gray-500">
                <span>Menampilkan 1 sampai 10 dari 1,284 ulasan</span>
                <div class="flex gap-2">
                    <button class="px-3 py-1 border rounded bg-white hover:bg-gray-100">Prev</button>
                    <button class="px-3 py-1 border rounded bg-white hover:bg-gray-100 text-amber-600 font-bold">1</button>
                    <button class="px-3 py-1 border rounded bg-white hover:bg-gray-100">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        if(confirm('Apakah Anda yakin ingin menghapus ulasan ini? Tindakan ini tidak dapat dibatalkan.')) {
            // Logika hapus (form submit) di sini
            alert('Ulasan berhasil dihapus!');
        }
    }
</script>
@endsection