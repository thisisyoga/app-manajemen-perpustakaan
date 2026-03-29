@extends('layouts.admin')

@section('content')
    <div class="px-2 space-y-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="relative w-full md:w-80 group">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-MediumBrown/30 text-xs group-focus-within:text-Chocolate transition-colors"></i>
                <input type="text" placeholder="Cari judul, penulis, atau ISBN..."
                    class="w-full pl-10 pr-4 py-2.5 bg-white border border-beige/40 rounded-2xl text-xs focus:outline-none focus:ring-4 focus:ring-Chocolate/5 transition-all text-DarkChocolate shadow-sm">
            </div>

            <a href="{{ route('create-MDB') }}" class="w-full md:w-auto">
                <button class="w-full md:w-auto flex items-center justify-center gap-2 bg-Chocolate text-white px-6 py-2.5 rounded-2xl text-[11px] font-black uppercase tracking-widest hover:bg-DarkChocolate transition-all shadow-lg shadow-Chocolate/20 active:scale-95">
                    <i class="fas fa-plus text-[10px]"></i> Tambah Koleksi
                </button>
            </a>
        </div>

        <div class="bg-white rounded-[32px] border border-beige/40 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-beige/5 text-MediumBrown/50 font-black uppercase tracking-widest text-[10px]">
                            <th class="p-5 pl-8 text-center w-16">No</th>
                            <th class="p-5 w-24">Cover</th>
                            <th class="p-5">Informasi Buku</th>
                            <th class="p-5">Penulis</th>
                            <th class="p-5">Tahun</th>
                            <th class="p-5">Stok</th>
                            <th class="p-5 pr-8 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-beige/10">
                        @foreach ($buku as $b)
                            <tr class="hover:bg-beige/5 transition-colors group">
                                <td class="p-5 pl-8 text-center text-xs font-bold text-MediumBrown/30">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-5">
                                    <div class="h-20 w-14 rounded-lg overflow-hidden shadow-sm border border-beige/30 group-hover:rotate-2 transition-transform duration-300 bg-beige/10">
                                        <img src="{{ asset('storage/' . $b->cover) }}" 
                                             class="h-full w-full object-cover" 
                                             onerror="this.src='https://placehold.co/400x600/5D3A2E/FFF?text=No+Cover'">
                                    </div>
                                </td>
                                <td class="p-5">
                                    <p class="text-sm font-bold text-DarkChocolate leading-tight group-hover:text-Chocolate transition-colors">{{ $b->judul_buku }}</p>
                                    <p class="text-[10px] text-MediumBrown/50 mt-1 font-medium italic">ISBN: {{ $b->isbn ?? 'N/A' }}</p>
                                </td>
                                <td class="p-5">
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-user-edit text-[10px] text-Chocolate/40"></i>
                                        <span class="text-xs font-bold text-MediumBrown/80">{{ $b->penulis }}</span>
                                    </div>
                                </td>
                                <td class="p-5">
                                    <span class="text-xs font-medium text-DarkChocolate">{{ $b->tahun_terbit }}</span>
                                </td>
                                <td class="p-5">
                                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-beige/20 rounded-lg">
                                        <span class="text-xs font-black text-Chocolate">{{ $b->stok }}</span>
                                        <span class="text-[9px] font-bold text-MediumBrown/40 uppercase">Eks</span>
                                    </div>
                                </td>
                                <td class="p-5 pr-8">
                                    <div class="flex item-center justify-center gap-2">
                                        <a href="{{ route('edit-MDB', $b->id) }}" 
                                           class="h-9 w-9 flex items-center justify-center bg-white border border-beige/40 text-blue-500 rounded-xl hover:bg-blue-50 hover:border-blue-200 transition-all shadow-sm">
                                            <i class="fas fa-pen text-[10px]"></i>
                                        </a>

                                        <form action="{{ route('delete-MDB', $b->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus buku ini dari database?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="h-9 w-9 flex items-center justify-center bg-white border border-beige/40 text-red-500 rounded-xl hover:bg-red-50 hover:border-red-200 transition-all shadow-sm">
                                                <i class="fas fa-trash-alt text-[10px]"></i>
                                            </button>
                                        </form>

                                        <a href="#" 
                                           class="h-9 w-9 flex items-center justify-center bg-white border border-beige/40 text-green-500 rounded-xl hover:bg-green-50 hover:border-green-200 transition-all shadow-sm">
                                            <i class="fas fa-eye text-[10px]"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center gap-6 mt-10 px-4">
        <p class="text-[11px] font-bold text-gray-400 uppercase tracking-[0.2em]">
            Menampilkan <span class="text-DarkChocolate font-black italic">1 - 10</span> dari <span class="text-DarkChocolate font-black italic">1.284</span> Ulasan
        </p>
        <div class="flex items-center gap-2">
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-300 hover:bg-white transition-all cursor-not-allowed" disabled>
                <i class="fas fa-chevron-left text-xs"></i>
            </button>
            <div class="flex gap-1 px-2">
                <button class="w-10 h-10 rounded-xl bg-Chocolate text-white text-xs font-black shadow-lg shadow-Chocolate/20 transition-all">1</button>
                <button class="w-10 h-10 rounded-xl bg-white text-DarkChocolate text-xs font-bold hover:bg-beige/20 transition-all">2</button>
                <button class="w-10 h-10 rounded-xl bg-white text-DarkChocolate text-xs font-bold hover:bg-beige/20 transition-all">3</button>
            </div>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-Chocolate hover:bg-white hover:border-Chocolate transition-all shadow-sm">
                <i class="fas fa-chevron-right text-xs"></i>
            </button>
        </div>
    </div>
    </div>
@endsection