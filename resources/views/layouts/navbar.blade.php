<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="#" class="flex items-center group">
                    <div class="bg-amber-500 group-hover:bg-amber-700 p-2 rounded-lg transition-colors duration-300">
                        <i class="fas fa-cube text-white text-xl"></i>
                    </div>
                    <span
                        class="ml-3 text-xl font-bold text-amber-600 group-hover:text-amber-700 transition-colors duration-300">Aksara.</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-1">
                <a href="#"
                    class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fas fa-home mr-2"></i>
                    Home
                </a>


                <a href="#about"
                    class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fa-solid fa-circle-info mr-2"></i>
                    Tentang
                </a>

                <a href="#keunggulan"
                    class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fa-solid fa-award mr-2"></i>
                    Keunggulan
                </a>

                <a href="#koleksi"
                    class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fas fa-book mr-2"></i>
                    Koleksi Buku
                </a>


                <a href="#kontak"
                    class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                    <i class="fas fa-envelope mr-2"></i>
                    Contact

                </a>
            </div>

            <div class="flex items-center space-x-3">
                @guest
                    <a href="{{ route('login') }}"
                        class="hidden md:flex items-center bg-amber-600 hover:bg-amber-800 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
                @endguest

                @auth
                    <div class="dropdown relative group">
                        <button type="button" class="flex items-center gap-2 focus:outline-none">
                            <div class="relative">
                                <div
                                    class="h-9 w-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 overflow-hidden border-2 border-amber-500">
                                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                                        alt="User" class="h-full w-full object-cover">
                                </div>
                                <span
                                    class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                            </div>

                            <div class="hidden lg:flex flex-col items-start">
                                <span
                                    class="text-sm font-medium text-gray-700 group-hover:text-amber-600 transition-colors duration-200">
                                    {{ Auth::user()->name }}
                                </span>
                                <span class="text-xs text-gray-500 capitalize">{{ Auth::user()->role ?? 'User' }}</span>
                            </div>

                            <i
                                class="fas fa-chevron-down text-xs text-gray-500 hidden lg:inline transition-transform duration-200 group-hover:rotate-180"></i>
                        </button>

                        <div
                            class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl py-1 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 border border-gray-100">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="flex items-center">
                                    <div
                                        class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 overflow-hidden mr-3">
                                        <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                                            alt="User" class="h-full w-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-sm text-gray-500 truncate w-40">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <a href="/profile"
                                class="block px-4 py-2.5 text-gray-700 hover:bg-amber-50 hover:text-amber-600 flex items-center transition-colors duration-200">
                                <i class="fas fa-user-circle text-gray-400 mr-3 w-5 text-center"></i>
                                My Profile
                            </a>

                            <div class="border-t border-gray-100 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left block px-4 py-2.5 text-gray-700 hover:bg-red-50 hover:text-red-600 flex items-center transition-colors duration-200">
                                    <i class="fas fa-sign-out-alt text-gray-400 mr-3 w-5 text-center"></i>
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <button id="mobile-menu-button"
                class="md:hidden p-2 text-amber-600 hover:text-amber-700 rounded-lg hover:bg-amber-50 transition-colors duration-200">
                <i class="fas fa-bars text-xl"></i>
                <span class="sr-only">Menu</span>
            </button>
        </div>
    </div>
</nav>
<!-- Mobile Menu -->
<div id="mobile-menu" class="mobile-menu md:hidden bg-white border-t border-gray-200">
    <div class="px-2 pt-2 pb-4 space-y-1">
        <a href="#"
            class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 flex items-center transition-colors duration-200">
            <i class="fas fa-home text-amber-500 mr-3 w-5 text-center"></i>
            Home
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
