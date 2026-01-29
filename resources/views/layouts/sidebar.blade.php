<aside class="w-64 bg-white shadow-md hidden md:block relative z-10">
    <div class="p-6 font-bold text-amber-600 text-2xl">AdminPanel</div>
    <nav class="mt-8">
        <a href="{{ route('admin-dashboard') }}" 
           class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors 
                  @if(request()->routeIs('admin-dashboard')) border-l-4 border-amber-500 font-medium @else border-l-4 border-transparent @endif">
            Dashboard
        </a>
        <a href="{{ route('MDA') }}" 
           class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors 
                  @if(request()->routeIs('MDA')) border-l-4 border-amber-500 font-medium @else border-l-4 border-transparent @endif">
            Master Data Akun
        </a>
        <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors border-l-4 border-transparent hover:border-amber-500">Master Data Kategori</a>
        <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors border-l-4 border-transparent hover:border-amber-500">Master Data Buku</a>
        <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-amber-50 hover:text-amber-600 transition-colors border-l-4 border-transparent hover:border-amber-500">Laporan</a>

        <div class="mt-auto pt-6 border-t mx-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center text-gray-600 hover:text-red-600 transition-colors w-full">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>
</aside>
