<aside class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0 bg-white border-r border-beige/50 shadow-sm">
    <div class="h-full flex flex-col">
        <div class="h-[88px] flex items-center px-8 border-b border-beige/30">
            <div class="flex items-center gap-3">
                <div class="">
                    <img src="{{ asset('image/logo.png') }}" alt="Aksara Logo"
                            class="h-12 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </div>
                <span class="text-xl font-serif font-bold text-DarkChocolate">
                    {{ Auth::user()->role == 'admin' ? 'Admin' : 'Petugas' }}<span class="text-Chocolate">.</span>
                </span>
            </div>
        </div>

        <div class="flex-1 px-4 py-6 overflow-y-auto custom-scrollbar">
            <nav class="space-y-1.5">
                <p class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-MediumBrown/40 mb-3">Main Menu</p>
                
                <a href="{{ route('admin-dashboard') }}"
                    class="group flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all
                    {{ request()->routeIs('admin-dashboard') ? 'bg-Chocolate text-white shadow-lg shadow-Chocolate/20' : 'text-MediumBrown hover:bg-beige/20 hover:text-Chocolate' }}">
                    <i class="fas fa-th-large w-5 mr-3 {{ request()->routeIs('admin-dashboard') ? 'text-white' : 'text-MediumBrown group-hover:text-Chocolate' }}"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin-pengembalian') }}"
                    class="group flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all
                    {{ request()->routeIs('admin-pengembalian') ? 'bg-Chocolate text-white shadow-lg shadow-Chocolate/20' : 'text-MediumBrown hover:bg-beige/20 hover:text-Chocolate' }}">
                    <i class="fas fa-exchange-alt w-5 mr-3 {{ request()->routeIs('admin-pengembalian') ? 'text-white' : 'text-MediumBrown group-hover:text-Chocolate' }}"></i>
                    Pengembalian
                </a>

                @if (Auth::user()->role == 'admin')
                    <div class="relative">
                        <button id="btn-master-akun" type="button"
                            class="w-full group flex items-center justify-between px-4 py-3 text-sm font-bold rounded-xl transition-all outline-none
                            {{ request()->routeIs('MDA*') ? 'bg-beige/30 text-Chocolate' : 'text-MediumBrown hover:bg-beige/20 hover:text-Chocolate' }}">
                            <div class="flex items-center">
                                <i class="fas fa-users-cog w-5 mr-3"></i>
                                <span>Master Akun</span>
                            </div>
                            <i id="arrow-icon" class="fas fa-chevron-down text-[10px] transition-transform duration-300 {{ request()->routeIs('MDA*') ? 'rotate-180' : '' }}"></i>
                        </button>

                        <div id="menu-master-akun" class="{{ request()->routeIs('MDA*') ? '' : 'hidden' }} mt-1 ml-4 border-l-2 border-beige/50 space-y-1">
                            <a href="{{ route('MDA') }}"
                                class="block py-2.5 pl-8 pr-4 text-[13px] font-bold transition-all rounded-r-xl
                                {{ request()->routeIs('MDA-petugas') ? 'text-Chocolate bg-beige/10' : 'text-MediumBrown/60 hover:text-Chocolate' }}">
                                Data Petugas
                            </a>
                            <a href="{{ route('data-user') }}"
                                class="block py-2.5 pl-8 pr-4 text-[13px] font-bold transition-all rounded-r-xl
                                {{ request()->routeIs('MDA-user') ? 'text-Chocolate bg-beige/10' : 'text-MediumBrown/60 hover:text-Chocolate' }}">
                                Data User
                            </a>
                        </div>
                    </div>
                @endif

                <p class="px-4 text-[10px] font-black uppercase tracking-[0.2em] text-MediumBrown/40 pt-4 mb-3">Katalog & Laporan</p>

                <a href="{{ route('MDK') }}"
                    class="group flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all
                    {{ request()->routeIs('MDK') ? 'bg-Chocolate text-white shadow-lg shadow-Chocolate/20' : 'text-MediumBrown hover:bg-beige/20 hover:text-Chocolate' }}">
                    <i class="fas fa-tags w-5 mr-3 {{ request()->routeIs('MDK') ? 'text-white' : 'text-MediumBrown group-hover:text-Chocolate' }}"></i>
                    Kategori
                </a>

                <a href="{{ route('MDB') }}"
                    class="group flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all
                    {{ request()->routeIs('MDB') ? 'bg-Chocolate text-white shadow-lg shadow-Chocolate/20' : 'text-MediumBrown hover:bg-beige/20 hover:text-Chocolate' }}">
                    <i class="fas fa-book w-5 mr-3 {{ request()->routeIs('MDB') ? 'text-white' : 'text-MediumBrown group-hover:text-Chocolate' }}"></i>
                    Data Buku
                </a>

                <a href="{{ route('ulasan') }}"
                    class="group flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all
                    {{ request()->routeIs('ulasan') ? 'bg-Chocolate text-white shadow-lg shadow-Chocolate/20' : 'text-MediumBrown hover:bg-beige/20 hover:text-Chocolate' }}">
                    <i class="fas fa-star w-5 mr-3 {{ request()->routeIs('ulasan') ? 'text-white' : 'text-MediumBrown group-hover:text-Chocolate' }}"></i>
                    Ulasan
                </a>

                <a href="{{ route('laporan') }}"
                    class="group flex items-center px-4 py-3 text-sm font-bold rounded-xl transition-all
                    {{ request()->routeIs('laporan') ? 'bg-Chocolate text-white shadow-lg shadow-Chocolate/20' : 'text-MediumBrown hover:bg-beige/20 hover:text-Chocolate' }}">
                    <i class="fas fa-file-alt w-5 mr-3 {{ request()->routeIs('laporan') ? 'text-white' : 'text-MediumBrown group-hover:text-Chocolate' }}"></i>
                    Laporan
                </a>
            </nav>
        </div>

        {{-- <div class="p-4 border-t border-beige/30">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="flex items-center w-full px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition-colors">
                    <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                    Keluar
                </button>
            </form>
        </div> --}}
    </div>
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
