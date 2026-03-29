@extends('layouts.admin')

@section('content')

<div class="px-2 space-y-6">
    <div class="bg-white p-4 rounded-[28px] border border-beige/40 shadow-sm flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="relative w-full md:w-96 group">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-MediumBrown/30 text-[10px] group-focus-within:text-Chocolate transition-colors"></i>
            <input type="text" placeholder="Cari nama anggota, email, atau username..."
                class="w-full pl-10 pr-4 py-3 bg-beige/5 border border-beige/20 rounded-2xl text-[11px] focus:outline-none focus:ring-4 focus:ring-Chocolate/5 transition-all text-DarkChocolate">
        </div>
        
        <div class="flex items-center gap-3">
            <span class="text-[10px] font-black uppercase tracking-widest text-MediumBrown/30">Total Anggota:</span>
            <span class="text-xs font-serif font-bold text-Chocolate">{{ count($user) }} Orang</span>
        </div>
    </div>

    <div class="bg-white rounded-[32px] border border-beige/40 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-beige/5 text-MediumBrown/50 font-black uppercase tracking-widest text-[10px]">
                        <th class="p-5 pl-8 text-center w-16">No</th>
                        <th class="p-5">Profil Lengkap</th>
                        <th class="p-5">Identitas Akun</th>
                        <th class="p-5">Kontak Elektronik</th>
                        <th class="p-5 text-center">Tipe Akun</th>
                        <th class="p-5 pr-8 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-beige/10">
                    @foreach ($user as $u)
                    <tr class="hover:bg-beige/5 transition-colors group">
                        <td class="p-5 pl-8 text-center text-[10px] font-bold text-MediumBrown/30">
                            {{ $loop->iteration }}
                        </td>
                        <td class="p-5">
                            <p class="text-xs font-bold text-DarkChocolate leading-none">{{ $u->NamaLengkap }}</p>
                            <p class="text-[9px] text-MediumBrown/40 mt-1 uppercase tracking-tighter">ID: ANGGOTA-{{ $u->id }}</p>
                        </td>
                        <td class="p-5 italic text-xs text-Chocolate">
                            @ {{ $u->name }}
                        </td>
                        <td class="p-5">
                            <div class="flex items-center gap-2 text-MediumBrown/70">
                                <i class="fas fa-envelope text-[10px] text-MediumBrown/30"></i>
                                <span class="text-[11px]">{{ $u->email }}</span>
                            </div>
                        </td>
                        <td class="p-5 text-center">
                            <span class="px-3 py-1 bg-beige/10 border border-beige/30 text-MediumBrown text-[9px] font-black uppercase tracking-widest rounded-lg group-hover:bg-Chocolate/10 group-hover:text-Chocolate transition-all">
                                {{ $u->role }}
                            </span>
                        </td>
                        <td class="p-5 pr-8 text-center">
                            <form action="{{ route ('delete-MDA', $u->id) }}" method="POST" onsubmit="return confirm('Hapus data anggota ini secara permanen?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="group/btn h-9 px-4 flex items-center gap-2 mx-auto bg-rose-50 text-rose-600 rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-rose-600 hover:text-white transition-all active:scale-95 border border-rose-100">
                                    <i class="fas fa-trash-alt group-hover/btn:scale-110 transition-transform"></i>
                                    Hapus
                                </button>
                            </form>
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