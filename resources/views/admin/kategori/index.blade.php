@extends('layouts.admin')

@section('content')
    <div class="px-2 space-y-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <form action="{{ url()->current() }}" method="GET">
                <div class="relative w-full md:w-80 group">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-MediumBrown/30 text-xs transition-colors group-focus-within:text-Chocolate"></i>
                    <input type="text" placeholder="Cari kategori buku..." name="search" value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2.5 bg-white border border-beige/40 rounded-2xl text-xs focus:outline-none focus:ring-4 focus:ring-Chocolate/5 transition-all text-DarkChocolate shadow-sm">
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start grid-flow-row-dense">
            
            <div class="md:row-span-2 p-6 bg-beige/10 rounded-2xl border-2 border-dashed border-beige/40 flex flex-col justify-center">
                <form action="{{ route('store-MDK') }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label class="text-[10px] font-bold uppercase tracking-widest text-MediumBrown/60 ml-1">Tambah Kategori Baru</label>
                        <input type="text" name="nama_kategori" placeholder="Masukkan nama kategori..." required
                            class="w-full mt-2 px-4 py-2.5 bg-white border border-beige/40 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-Chocolate/20 transition-all text-DarkChocolate shadow-sm">
                    </div>
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-Chocolate text-white px-4 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-DarkChocolate transition-all shadow-md active:scale-95">
                        <i class="fas fa-save text-[10px]"></i> Simpan Kategori
                    </button>
                </form>
            </div>

            @forelse($kategori as $item)
                <div class="p-6 bg-white rounded-2xl border border-beige/20 shadow-sm transition-all">
                    <div class="flex justify-between items-center gap-4">
                        <div class="flex-1">
                            <h3 class="font-bold text-DarkChocolate group-hover:text-Chocolate transition-colors uppercase text-sm tracking-wide">
                                {{ $item->nama_kategori }}
                            </h3>
                        </div>

                        <div class="flex gap-2 shrink-0">
                            <a href="{{ route('edit-MDK', $item->id) }}"
                                class="w-8 h-8 flex items-center justify-center rounded-xl bg-beige/10 text-Caramel hover:bg-Chocolate hover:text-white transition-all shadow-sm"
                                title="Edit Kategori">
                                <i class="fas fa-edit text-[10px]"></i>
                            </a>

                            <form action="{{ route('delete-MDK', $item->id) }}" method="POST"
                                onsubmit="return confirm('Apakah yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-400 hover:bg-red-500 hover:text-white transition-all shadow-sm"
                                    title="Hapus Kategori">
                                    <i class="fas fa-trash-alt text-[10px]"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection