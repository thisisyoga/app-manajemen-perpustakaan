@extends('layouts.user')

@section('content')
    <main class="max-w-6xl mx-auto p-6 lg:py-12">

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white p-4 rounded-2xl shadow-md border border-gray-100">
                    <img src="{{ asset('storage/' . $pinjam->cover) }}"
                        class="w-full aspect-[3/4] object-cover rounded-xl shadow-lg" alt="Cover Buku">
                </div>

                <div class="space-y-3">
                    <a href="{{ route('pinjam.create', $pinjam->id) }}"> <button class="w-full bg-amber-600 text-white font-bold py-3 rounded-xl hover:bg-amber-700 transition">
                        Pinjam Buku
                    </button></a>
                    <div class="flex gap-2">
                        <a href="{{ route('MDU') }}"
                            class="flex-1 flex justify-center items-center gap-2 border border-gray-200 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">
                            <span>⬅️</span> Kembali
                        </a>
                        <button
                            class="flex-1 flex justify-center items-center gap-2 border border-gray-200 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">
                            <span class="text-red-500">❤</span> Favorit
                        </button>

                    </div>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="mb-8">
                    <span class="text-amber-600 text-xs font-bold px-3 py-1 bg-amber-50 rounded-full uppercase">
                        Kategori: @foreach ($pinjam->RelasiKategori as $kat)
                            {{ $kat->nama_kategori }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </span>
                    <h1 class="text-3xl font-extrabold text-gray-900 mt-4">{{ $pinjam->judul_buku }}</h1>
                    <p class="text-gray-500 mt-2 italic">oleh: {{ $pinjam->penulis }}</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                    {{-- <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Halaman</p>
                        <p class="text-lg font-bold">188</p>
                    </div> --}}
                    <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Terbit</p>
                        <p class="text-lg font-bold">{{ $pinjam->tahun_terbit }}</p>
                    </div>
                    <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Stok</p>
                        <p class="text-lg font-bold">{{ $pinjam->stok }}</p>
                    </div>
                    <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                        <p class="text-[10px] text-gray-400 font-bold uppercase">Rating</p>
                        <p class="text-lg font-bold text-yellow-500">4.5/5</p>
                    </div>
                </div>

                <div class="flex border-b border-gray-200 gap-8 mb-6">
                    <button id="btn-sinopsis" class="pb-3 border-b-2 border-amber-600 text-amber-600 font-bold">
                        Sinopsis
                    </button>
                    <button id="btn-data"
                        class="pb-3 border-b-2 border-transparent  text-gray-500 font-bold hover:text-gray-700">
                        Data Buku
                    </button>
                </div>

                <div id="box-sinopsis" class="block">
                    <p class="text-gray-600 leading-relaxed">
                        {{ $pinjam->deskripsi }}
                    </p>
                </div>

                <div id="box-data" class="hidden">
                    <ul class="space-y-2 text-sm">
                        <li class="flex justify-between p-2 border-b"><span>Penerbit</span> <b>{{ $pinjam->penerbit }}</b>
                        </li>
                        <li class="flex justify-between p-2 border-b"><span>ISBN</span> <b>{{ $pinjam->isbn }}</b></li>
                        <li class="flex justify-between p-2 border-b"><span>Tahun Terbit</span>
                            <b>{{ $pinjam->tahun_terbit }}</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <script>
        const sBtn = document.getElementById('btn-sinopsis');
        const dBtn = document.getElementById('btn-data');
        const sBox = document.getElementById('box-sinopsis');
        const dBox = document.getElementById('box-data');

        function setActive(activeBtn, inactiveBtn, activeBox, inactiveBox) {
            activeBtn.classList.add('border-amber-600', 'text-amber-600');
            activeBtn.classList.remove('border-transparent', 'text-gray-500');

            inactiveBtn.classList.remove('border-amber-600', 'text-amber-600');
            inactiveBtn.classList.add('border-transparent', 'text-gray-500');

            activeBox.classList.remove('hidden');
            inactiveBox.classList.add('hidden');
        }

        sBtn.onclick = () => setActive(sBtn, dBtn, sBox, dBox);
        dBtn.onclick = () => setActive(dBtn, sBtn, dBox, sBox);
    </script>
@endsection
