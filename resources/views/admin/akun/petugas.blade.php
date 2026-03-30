@extends('layouts.admin')

@section('content')
    <div class="px-2 space-y-6">
        <div
            class="flex flex-col md:flex-row justify-between items-center gap-4 bg-white p-4 rounded-[28px] border border-beige/40 shadow-sm">
                <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-3">
                    <div class="relative w-full md:w-80 group">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-MediumBrown/30 text-[10px] group-focus-within:text-Chocolate transition-colors"></i>
                        <input type="text" name="user" value="{{ request('user') }}"
                            placeholder="Cari berdasarkan nama atau email..."
                            class="w-full pl-10 pr-4 py-2.5 bg-beige/5 border border-beige/20 rounded-2xl text-[11px] focus:outline-none focus:ring-4 focus:ring-Chocolate/5 transition-all text-DarkChocolate">
                    </div>
                </form>

            <a href="{{ route('create-MDA') }}" class="w-full md:w-auto">
                <button
                    class="w-full flex items-center justify-center gap-2 px-6 py-2.5 bg-Chocolate text-white text-[11px] font-black uppercase tracking-[0.1em] rounded-2xl hover:bg-DarkChocolate transition-all shadow-lg shadow-Chocolate/20 active:scale-95">
                    <i class="fas fa-user-plus text-[10px]"></i> Tambah Petugas
                </button>
            </a>
        </div>

        <div class="bg-white rounded-[32px] border border-beige/40 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-beige/5 text-MediumBrown/50 font-black uppercase tracking-widest text-[10px]">
                            <th class="p-5 pl-8 text-center w-16">No</th>
                            <th class="p-5">Profil Petugas</th>
                            <th class="p-5">Kontak</th>
                            <th class="p-5">Hak Akses</th>
                            <th class="p-5 pr-8 text-center">Opsi Pengelolaan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-beige/10">
                        @foreach ($petugas as $p)
                            <tr class="hover:bg-beige/5 transition-colors group">
                                <td class="p-5 pl-8 text-center text-[10px] font-bold text-MediumBrown/30">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="p-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="h-10 w-10 rounded-xl bg-Chocolate/5 flex items-center justify-center text-Chocolate font-bold text-xs border border-Chocolate/10">
                                            {{ substr($p->NamaLengkap, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-DarkChocolate leading-none mb-1">
                                                {{ $p->NamaLengkap }}</p>
                                            <p class="text-[9px] text-Chocolate font-medium tracking-tight italic">
                                                {{ $p->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5">
                                    <div class="flex items-center gap-2 text-MediumBrown/70">
                                        <i class="far fa-envelope text-[10px]"></i>
                                        <span class="text-xs">{{ $p->email }}</span>
                                    </div>
                                </td>
                                <td class="p-5">
                                    <span
                                        class="px-3 py-1 bg-white border border-beige/60 text-DarkChocolate text-[9px] font-black uppercase tracking-widest rounded-lg shadow-sm group-hover:border-Chocolate/30 transition-colors">
                                        {{ $p->role }}
                                    </span>
                                </td>
                                <td class="p-5 pr-8">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('edit-MDA', $p->id) }}"
                                            class="h-8 w-8 flex items-center justify-center bg-white border border-beige/40 text-blue-500 rounded-lg hover:bg-blue-50 transition-all shadow-sm"
                                            title="Edit Data">
                                            <i class="fas fa-pen text-[9px]"></i>
                                        </a>

                                        <form action="{{ route('delete-MDA', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus akun petugas ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="h-8 w-8 flex items-center justify-center bg-white border border-beige/40 text-rose-500 rounded-lg hover:bg-rose-50 transition-all shadow-sm"
                                                title="Hapus Akun">
                                                <i class="fas fa-trash-alt text-[9px]"></i>
                                            </button>
                                        </form>

                                        <a href=""
                                            class="h-8 w-8 flex items-center justify-center bg-white border border-beige/40 text-emerald-500 rounded-lg hover:bg-emerald-50 transition-all shadow-sm"
                                            title="Detail Profil">
                                            <i class="fas fa-eye text-[9px]"></i>
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
                Menampilkan <span class="text-DarkChocolate font-black italic">1 - 10</span> dari <span
                    class="text-DarkChocolate font-black italic">1.284</span> Ulasan
            </p>
            <div class="flex items-center gap-2">
                <button
                    class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-300 hover:bg-white transition-all cursor-not-allowed"
                    disabled>
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
                <div class="flex gap-1 px-2">
                    <button
                        class="w-10 h-10 rounded-xl bg-Chocolate text-white text-xs font-black shadow-lg shadow-Chocolate/20 transition-all">1</button>
                    <button
                        class="w-10 h-10 rounded-xl bg-white text-DarkChocolate text-xs font-bold hover:bg-beige/20 transition-all">2</button>
                    <button
                        class="w-10 h-10 rounded-xl bg-white text-DarkChocolate text-xs font-bold hover:bg-beige/20 transition-all">3</button>
                </div>
                <button
                    class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-Chocolate hover:bg-white hover:border-Chocolate transition-all shadow-sm">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>
    </div>
@endsection
