<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="flex items-center group">
                    <div class="bg-amber-500 group-hover:bg-amber-700 p-2 rounded-lg transition-colors duration-300">
                        <i class="fas fa-cube text-white text-xl"></i>
                    </div>
                    <span class="ml-3 text-xl font-bold text-amber-600 group-hover:text-amber-700 transition-colors duration-300">Aksara.</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-1">
                <a href="#" class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fas fa-home mr-2"></i> Beranda
                </a>

                <a href="#about" class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fa-solid fa-circle-info mr-2"></i> Tentang
                </a>
                <a href="#keunggulan" class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fa-solid fa-award mr-2"></i> Keunggulan
                </a>

                <a href="#koleksi" class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fas fa-book mr-2"></i> Koleksi Buku
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="hidden md:flex items-center bg-amber-600 hover:bg-amber-800 text-white px-5 py-2 rounded-lg font-medium transition-colors duration-200 shadow-sm">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>

                <button id="mobile-menu-button" class="md:hidden p-2 text-amber-600 hover:text-amber-700 rounded-lg hover:bg-amber-50 transition-colors">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="mobile-menu md:hidden bg-white border-t border-gray-200">
    <div class="px-2 pt-2 pb-4 space-y-1">
        <a href="#"
            class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
            <i class="fas fa-home text-amber-500 mr-3 w-5 text-center"></i>
            Beranda
        </a>
        <a href="#"
            class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
            <i class="fa-solid fa-circle-info text-amber-500 mr-3 w-5 text-center"></i>
            Tentang
        </a>
        <a href="#"
            class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
            <i class="fas fa-award text-amber-500 mr-3 w-5 text-center"></i>
            Keunggulan
        </a>
        <a href="#"
            class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
            <i class="fas fa-book text-amber-500 mr-3 w-5 text-center"></i>
            Koleksi Buku
        </a>
        <div class="border-t border-gray-200 pt-2 mt-2">
            <a href="{{ route('login') }}"
                class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
                <i class="fas fa-sign-in-alt text-amber-500 mr-3 w-5 text-center"></i>
                Login
            </a>
        </div>
    </div>
</div>