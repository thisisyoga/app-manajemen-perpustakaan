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

                @guest
                <a href="#about" class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fa-solid fa-circle-info mr-2"></i> Tentang
                </a>
                <a href="#keunggulan" class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fa-solid fa-award mr-2"></i> Keunggulan
                </a>
                @endguest

                <a href="#koleksi" class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fas fa-book mr-2"></i> Koleksi Buku
                </a>
            </div>

            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="hidden md:flex items-center bg-amber-600 hover:bg-amber-800 text-white px-5 py-2 rounded-lg font-medium transition-colors duration-200 shadow-sm">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                @endguest

                @auth
                    <div class="relative group">
                        <button type="button" class="flex items-center gap-3 p-1 rounded-full hover:bg-gray-50 transition-all duration-200 focus:outline-none">
                            <div class="relative">
                                <div class="h-9 w-9 rounded-full overflow-hidden border-2 border-amber-500 shadow-sm">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                        alt="User" class="h-full w-full object-cover">
                                </div>
                                <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start leading-tight">
                                <span class="text-sm font-bold text-gray-800 group-hover:text-amber-600 transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-wider font-semibold">{{ Auth::user()->role == 'user' ? 'Member' : 'Admin' }}</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs text-gray-400 hidden lg:inline transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <div class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-[60]">
                            <div class="px-4 py-3 border-b border-gray-50 mb-1">
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mb-1">Akun Saya</p>
                                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="/profile" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors">
                                <i class="fas fa-user-circle mr-3 w-5 text-amber-500"></i> My Profile
                            </a>

                            <div class="border-t border-gray-50 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <i class="fas fa-sign-out-alt mr-3 w-5"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

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
        <a href="#"
            class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
            <i class="fas fa-envelope text-amber-500 mr-3 w-5 text-center"></i>
            Contact
            <span class="ml-2 bg-amber-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">New</span>
        </a>
        <div class="border-t border-gray-200 pt-2 mt-2">
            <a href="#"
                class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
                <i class="fas fa-user-circle text-amber-500 mr-3 w-5 text-center"></i>
                Profile
            </a>
            <a href="#"
                class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
                <i class="fas fa-cog text-amber-500 mr-3 w-5 text-center"></i>
                Settings
            </a>
            <a href="#"
                class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
                <i class="fas fa-sign-out-alt text-amber-500 mr-3 w-5 text-center"></i>
                Sign Out
            </a>
        </div>
    </div>
</div>
</nav>
