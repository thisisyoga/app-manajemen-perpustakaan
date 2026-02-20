@extends('layouts.user')

@section('content')
<main class="max-w-6xl mx-auto p-6 lg:py-12">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white p-4 rounded-2xl shadow-md border border-gray-100">
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800&auto=format&fit=crop" 
                     class="w-full aspect-[3/4] object-cover rounded-xl shadow-lg" 
                     alt="Cover Buku">
            </div>

            <div class="space-y-3">
                <button class="w-full bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 transition">
                    Pratinjau Buku
                </button>
                <div class="flex gap-2">
                    <button class="flex-1 flex justify-center items-center gap-2 border border-gray-200 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">
                        <span class="text-red-500">❤</span> Favorit
                    </button>
                    <button class="flex-1 flex justify-center items-center gap-2 border border-gray-200 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">
                        <span>↗</span> Bagikan
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-8">
            <div class="mb-8">
                <span class="text-indigo-600 text-xs font-bold px-3 py-1 bg-indigo-50 rounded-full uppercase">
                    Kategori: Sains
                </span>
                <h1 class="text-3xl font-extrabold text-gray-900 mt-4">Pengetahuan Lingkungan Modern</h1>
                <p class="text-gray-500 mt-2 italic">Ditulis oleh: Dr. Ir. Sri Mumpuni N. Rahayu, dkk.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                    <p class="text-[10px] text-gray-400 font-bold uppercase">Halaman</p>
                    <p class="text-lg font-bold">188</p>
                </div>
                <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                    <p class="text-[10px] text-gray-400 font-bold uppercase">Terbit</p>
                    <p class="text-lg font-bold">2024</p>
                </div>
                <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                    <p class="text-[10px] text-gray-400 font-bold uppercase">Bahasa</p>
                    <p class="text-lg font-bold">IDN</p>
                </div>
                <div class="p-4 bg-white border border-gray-200 rounded-xl text-center shadow-sm">
                    <p class="text-[10px] text-gray-400 font-bold uppercase">Rating</p>
                    <p class="text-lg font-bold text-yellow-500">4.5/5</p>
                </div>
            </div>

            <div class="flex border-b border-gray-200 gap-8 mb-6">
                <button id="btn-sinopsis" class="pb-3 border-b-2 border-indigo-600 text-indigo-600 font-bold">
                    Sinopsis
                </button>
                <button id="btn-data" class="pb-3 border-b-2 border-transparent text-gray-500 font-bold hover:text-gray-700">
                    Data Buku
                </button>
            </div>

            <div id="box-sinopsis" class="block">
                <p class="text-gray-600 leading-relaxed">
                    Buku ini mengulas interaksi kompleks antara manusia dan alam. Dimulai dari pemahaman ekosistem dasar hingga solusi menghadapi perubahan iklim global. Sangat cocok bagi mahasiswa dan praktisi lingkungan yang ingin memperdalam wawasan tentang keberlanjutan sumber daya alam.
                </p>
            </div>

            <div id="box-data" class="hidden">
                <ul class="space-y-2 text-sm">
                    <li class="flex justify-between p-2 border-b"><span>Penerbit</span> <b>Lentera Ilmu</b></li>
                    <li class="flex justify-between p-2 border-b"><span>ISBN</span> <b>978-623-000-00</b></li>
                    <li class="flex justify-between p-2 border-b"><span>Berat</span> <b>350 gram</b></li>
                </ul>
            </div>
        </div>
    </div>
</main>

<script>
    // 1. Ambil elemen tombol dan box konten
    const sBtn = document.getElementById('btn-sinopsis');
    const dBtn = document.getElementById('btn-data');
    const sBox = document.getElementById('box-sinopsis');
    const dBox = document.getElementById('box-data');

    // 2. Fungsi Klik Tab Sinopsis
    sBtn.onclick = function() {
        // Atur Style Tombol (Mana yang aktif)
        sBtn.classList.add('border-indigo-600', 'text-indigo-600');
        dBtn.classList.remove('border-indigo-600', 'text-indigo-600');
        
        // Tampilkan Box Sinopsis, Sembunyikan Data
        sBox.classList.remove('hidden');
        dBox.classList.add('hidden');
    }

    // 3. Fungsi Klik Tab Data Buku
    dBtn.onclick = function() {
        // Atur Style Tombol
        dBtn.classList.add('border-indigo-600', 'text-indigo-600');
        sBtn.classList.remove('border-indigo-600', 'text-indigo-600');
        
        // Tampilkan Box Data, Sembunyikan Sinopsis
        dBox.classList.remove('hidden');
        sBox.classList.add('hidden');
    }
</script>
@endsection