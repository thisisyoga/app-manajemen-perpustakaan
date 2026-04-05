@extends('layouts.admin')

@section('content')
    <div class="px-4 md:px-8 pb-20">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-10 pt-4">
            <div class="flex items-center gap-5 bg-white p-5 pr-10 rounded-[28px] shadow-sm border border-gray-100">
                <div
                    class="h-14 w-14 bg-gradient-to-br from-Chocolate to-DarkChocolate rounded-2xl flex items-center justify-center text-white shadow-lg shadow-Chocolate/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] text-gray-400 font-bold uppercase tracking-[0.2em] leading-none mb-2">Total Ulasan
                    </p>
                    <p class="text-2xl font-black text-DarkChocolate">{{ $totalulasan }} <span
                            class="text-xs font-medium text-Chocolate/60 ml-1">Ulasan</span></p>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 w-full lg:w-auto">
                <form action="{{ url()->current() }}" method="GET">
                    <div class="relative w-full md:w-80 group">
                        <i
                            class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-MediumBrown/30 text-xs transition-colors group-focus-within:text-Chocolate"></i>
                        <input type="text" placeholder="Cari nama buku atau nama pengguna" name="search"
                            value="{{ request('search') }}"
                            class="w-full pl-10 pr-4 py-2.5 bg-white border border-beige/40 rounded-2xl text-xs focus:outline-none focus:ring-4 focus:ring-Chocolate/5 transition-all text-DarkChocolate shadow-sm">
                    </div>
                </form>

                <form action="{{ url()->current() }}" method="GET" class="flex gap-4">
                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <div class="relative">
                        <select name="rating" onchange="this.form.submit()"
                            class="appearance-none bg-white border border-gray-200 rounded-2xl pl-5 pr-12 py-3 text-xs font-bold text-DarkChocolate/70 focus:outline-none focus:ring-4 focus:ring-Chocolate/5 cursor-pointer transition-all">
                            <option value="">Semua Rating</option>
                            <option value="rendah" {{ request('rating') == 'rendah' ? 'selected' : '' }}>Rating Rendah (1-2)
                            </option>
                        </option>
                            <option value="tinggi" {{ request('rating') == 'tinggi' ? 'selected' : '' }}>Rating Tinggi (5)
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-[32px] border border-gray-100 shadow-xl shadow-gray-200/20 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-gray-50/50 text-gray-400 font-bold uppercase tracking-widest text-[10px] border-b border-gray-50">
                            <th class="p-6 pl-10">Buku & Pengguna</th>
                            <th class="p-6">Penilaian</th>
                            <th class="p-6">Komentar Anggota</th>
                            <th class="p-6 pr-10 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($ulasan as $u)
                            <tr class="hover:bg-beige/5 transition-colors group">
                                <td class="p-6 pl-10">
                                    <div class="flex items-center gap-5">
                                        <div
                                            class="h-16 w-11 rounded-lg overflow-hidden shadow-md border border-white flex-shrink-0 relative group-hover:scale-105 transition-transform">
                                            <img src="{{ asset('storage/' . $u->buku->cover) }}" 
                                                class="h-full w-full object-cover" alt="Cover" onerror="this.src='https://placehold.co/400x600/5D3A2E/FFF?text=No+Cover'"> 
                                            <div class="absolute inset-0 bg-black/10"></div>
                                        </div>
                                        <div>
                                            <p
                                                class="text-sm font-black text-DarkChocolate mb-1 group-hover:text-Chocolate transition-colors">
                                                {{ $u->buku->judul_buku }}</p>
                                            <div class="flex items-center gap-1.5">
                                                <div class="h-4 w-4 rounded-full bg-beige flex items-center justify-center">
                                                    <i class="fas fa-user text-[8px] text-Chocolate"></i>
                                                </div>
                                                <p class="text-[11px] text-gray-400 font-bold tracking-tight">@
                                                    {{ $u->user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="p-6">
                                    {{-- <div class="flex text-amber-400 text-[11px] gap-1 mb-1.5">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="far fa-star text-gray-200"></i>
                                    </div> --}}
                                    <div class="flex items-center gap-2">
                                        <div class="flex text-amber-400 text-[11px] gap-1 mb-1.5">
                                            @for ($i = 0; $i < $u->rating; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                            @for ($i = $u->rating; $i < 5; $i++)
                                                <i class="far fa-star text-gray-200"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6">
                                    <div class="max-w-sm">
                                        <div class="relative">
                                            <svg class="w-4 h-4 text-beige absolute -left-2 -top-2 opacity-50"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C20.1216 16 21.017 16.8954 21.017 18V21C21.017 22.1046 20.1216 23 19.017 23H16.017C14.9124 23 14.017 22.1046 14.017 21ZM5.017 21L5.017 18C5.017 16.8954 5.91243 16 7.017 16H10.017C11.1216 16 12.017 16.8954 12.017 18V21C12.017 22.1046 11.1216 23 10.017 23H7.017C5.91243 23 5.017 22.1046 5.017 21Z" />
                                            </svg>
                                            <p
                                                class="text-xs text-DarkChocolate/70 leading-relaxed italic pl-3 line-clamp-2 group-hover:line-clamp-none transition-all duration-500">
                                                {{ $u->ulasan }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-6 pr-10">
                                    <div class="flex justify-center gap-3">
                                        {{-- <button
                                            class="h-10 w-10 flex items-center justify-center bg-white border border-gray-100 text-blue-500 rounded-2xl hover:bg-blue-50 hover:border-blue-100 hover:shadow-lg transition-all active:scale-90 shadow-sm">
                                            <i class="fas fa-eye text-xs"></i>
                                        </button> --}}

                                        <form action="{{ route('ulasan.delete', $u->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus buku ini dari database?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="h-10 w-10 flex items-center justify-center bg-white border border-gray-100 text-rose-400 rounded-2xl hover:bg-rose-50 hover:border-rose-100 hover:shadow-lg transition-all active:scale-90 shadow-sm">
                                                <i class="fas fa-trash-alt text-[10px]"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @empty
                            <tr>
                                <td colspan="7" class="p-20 text-center">
                                    <div class="flex flex-col items-center justify-center">

                                        <h3 class="text-lg font-serif font-bold text-DarkChocolate">Ulasan Tidak Ditemukan
                                        </h3>

                                        <p class="text-xs text-MediumBrown/50 max-w-xs mx-auto leading-relaxed mt-2">
                                            Maaf, kami tidak menemukan ulasan

                                            @if (request('search') && request('rating'))
                                                dengan kata kunci <span
                                                    class="font-black text-Chocolate italic">"{{ request('search') }}"</span>
                                                dan kategori <span class="font-black text-Chocolate italic">"Rating
                                                    {{ request('rating') }}"</span>.
                                            @elseif(request('search'))
                                                dengan kata kunci <span
                                                    class="font-black text-Chocolate italic">"{{ request('search') }}"</span>.
                                            @elseif(request('rating'))
                                                untuk kategori <span class="font-black text-Chocolate italic">"Rating
                                                    {{ request('rating') }}"</span>.
                                            @else
                                                di dalam database saat ini.
                                            @endif
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-between items-center gap-6 mt-10 px-4">
            <p class="text-[11px] font-bold text-gray-400 uppercase tracking-[0.2em]">
                Menampilkan <span class="text-DarkChocolate font-black italic">{{ $ulasan->firstItem() }} - {{ $ulasan->lastItem() }}</span> dari <span
                    class="text-DarkChocolate font-black italic">{{ number_format($ulasan->total(), 0, ',', '.') }}</span> Ulasan
            </p>
            <div class="flex items-center gap-2">
                @if ($ulasan->onFirstPage())
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed"
                        disabled>
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>
                @else
                    <a href="{{ $ulasan->previousPageUrl() }}"
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-Chocolate hover:bg-white transition-all shadow-sm">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </a>
                @endif

                <div class="flex gap-1 px-2">
                    @foreach ($ulasan->getUrlRange(max(1, $ulasan->currentPage() - 1), min($ulasan->lastPage(), $ulasan->currentPage() + 1)) as $page => $url)
                        <a href="{{ $url }}"
                            class="w-10 h-10 flex items-center justify-center rounded-xl text-xs transition-all {{ $page == $ulasan->currentPage() ? 'bg-Chocolate text-white font-black shadow-lg shadow-Chocolate/20' : 'bg-white text-DarkChocolate font-bold hover:bg-beige/20' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                @if ($ulasan->hasMorePages())
                    <a href="{{ $ulasan->nextPageUrl() }}"
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-Chocolate hover:bg-white transition-all shadow-sm">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </a>
                @else
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-300 cursor-not-allowed"
                        disabled>
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>
@endsection
