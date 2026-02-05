<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0 bg-white shadow-md border-r">
    <div class="h-full px-0 py-4 overflow-y-auto">
        @if (Auth::user()->role == 'admin')
            <div class="p-6 font-bold text-amber-600 text-2xl">AdminPanel</div>
        @elseif (Auth::user()->role == 'petugas')
            <div class="p-6 font-bold text-amber-600 text-2xl">PetugasPanel</div>
        @endif

        <nav class="mt-8">
            <a href="{{ route('admin-dashboard') }}"
                class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors 
            @if (request()->routeIs('admin-dashboard')) border-l-4 border-amber-500 font-medium bg-amber-50 @else border-l-4 border-transparent @endif">
                Dashboard
            </a>
            @if (Auth::user()->role == 'admin')
                <div class="relative">
                    <button id="btn-master-akun" type="button"
                        class="w-full flex items-center justify-between py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors border-l-4 border-transparent focus:outline-none">
                        <span>Master Data Akun</span>
                        <svg id="arrow-icon"
                            class="w-4 h-4 transition-transform duration-200 @if (request()->routeIs('MDA*')) rotate-180 @endif"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div id="menu-master-akun" class="@if (!request()->routeIs('MDA*')) hidden @endif bg-gray-50 pb-2">
                        <a href="{{ route('MDA') }}"
                            class="block py-2 pl-12 pr-6 text-sm text-gray-600 hover:text-amber-600 @if (request()->routeIs('MDA-petugas')) font-bold text-amber-600 @endif">
                            Data Petugas
                        </a>
                        <a href="{{ route('data-user') }}"
                            class="block py-2 pl-12 pr-6 text-sm text-gray-600 hover:text-amber-600 @if (request()->routeIs('MDA-user')) font-bold text-amber-600 @endif">
                            Data User
                        </a>
                    </div>
                </div>
            @endif

            <a href="{{ route('MDK') }}"
                class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors 
                 @if (request()->routeIs('MDK')) border-l-4 border-amber-500 font-medium bg-amber-50 @else border-l-4 border-transparent @endif">Master
                Data Kategori</a>
            <a href="{{ route('MDB') }}"
                class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-color
            @if (request()->routeIs('MDB')) border-l-4 border-amber-500 font-medium bg-amber-50 @else border-l-4 border-transparent @endif">Master
                Data Buku</a>
            <a href="#"
                class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors border-l-4 border-transparent hover:border-amber-500">Ulasan</a>
            <a href="#"
                class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors border-l-4 border-transparent hover:border-amber-500">Laporan</a>
        </nav>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnAkun = document.getElementById('btn-master-akun');
        const menuAkun = document.getElementById('menu-master-akun');
        const arrowIcon = document.getElementById('arrow-icon');

        btnAkun.addEventListener('click', function() {
            // Toggle class hidden (buka/tutup menu)
            menuAkun.classList.toggle('hidden');

            // Toggle rotasi panah
            arrowIcon.classList.toggle('rotate-180');
        });
    });
</script>
