<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<style>
    .dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-menu {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>

<body class="bg-gray-100 overflow-x-hidden">

    <div class="flex min-h-screen ">
        @include('layouts.sidebar')

        <div class="flex flex-1 flex-col md:ml-64">
    
            <main class="p-6 space-y-6">
                <header class="bg-white/80 backdrop-blur-md sticky top-0 z-30 border-b border-beige/30 p-4 mb-8">
                    <div class="flex justify-between items-center max-w-full mx-auto px-2">
                         @if (request()->routeIs('admin-dashboard'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Overview Dashboard</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Selamat
                                datang kembali, {{ Auth::user()->name }}</p>
                        </div>
                        @elseif (request()->routeIs('MDK'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Master Data Kategori</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Kelola klasifikasi buku perpustakaan</p>
                        </div>
                        @elseif (request()->routeIs('MDB'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Master Data Buku</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Kelola koleksi buku perpustakaan</p>
                        </div>
                        @elseif (request()->routeIs('ulasan'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Master Data Ulasan</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Pantau ulasan dari peminjam</p>
                        </div>
                        @elseif (request()->routeIs('laporan'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Pusat Unduhan Laporan</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Ekspor data perpustakaan dalam format PDF</p>
                        </div>
                        @elseif (request()->routeIs('admin-pengembalian'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Master Data Pengembalian</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Manajemen Peminjaman & Pengembalian</p>
                        </div>
                        @elseif (request()->routeIs('MDA'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Master Data Petugas</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Kelola akun petugas</p>
                        </div>
                        @elseif (request()->routeIs('data-user'))
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Master Data Anggota</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Kelola akun user</p>
                        </div>
                        @else
                        <div>
                            <h1 class="text-xl font-serif font-bold text-DarkChocolate">Admin Panel</h1>
                            <p class="text-[10px] text-MediumBrown/60 font-bold uppercase tracking-widest">Kelola data perpustakaan dengan mudah</p>
                        </div>
                        @endif

                        <div class="flex items-center gap-6">
                            <div class="relative group">
                                <button type="button" class="flex items-center gap-3 focus:outline-none">
                                    <div class="text-right hidden lg:block leading-none">
                                        <p class="text-xs font-bold text-DarkChocolate">{{ Auth::user()->name }}</p>
                                        <p class="text-[9px] text-Chocolate font-black uppercase tracking-tighter">
                                            {{ Auth::user()->role }}</p>
                                    </div>
                                    <div class="h-9 w-9 rounded-xl overflow-hidden shadow-sm border border-beige/50">
                                        <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=5D3A2E&color=fff' }}"
                                            alt="User">
                                    </div>
                                </button>

                                <div
                                    class="absolute right-0 mt-3 w-56 bg-white rounded-2xl shadow-xl border border-beige/20 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                                    <div class="px-4 py-3 border-b border-beige/10 mb-1">
                                        <p class="text-xs font-bold text-DarkChocolate truncate">
                                            {{ Auth::user()->email }}</p>
                                    </div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button
                                            class="w-full text-left flex items-center px-4 py-2.5 text-[11px] font-bold text-red-500 hover:bg-red-50 transition-colors">
                                            <i class="fas fa-sign-out-alt mr-3"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </header>
                @yield('content')
            </main>

            <footer class="bg-white p-4 mt-auto text-center text-sm text-gray-400 border-t">
                © 2026 AdminPanel. All rights reserved.
            </footer>
        </div>
    </div>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        amber: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            500: '#f59e0b',
                            600: '#d97706',
                        }
                    }
                }
            }
        }
        const dropdowns = document.querySelectorAll('.dropdown');

        dropdowns.forEach(dropdown => {
            const button = dropdown.querySelector('button');
            const menu = dropdown.querySelector('.dropdown-menu');

            if (button && menu) {
                // Handle click
                button.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isOpen = !menu.classList.contains('opacity-0');

                    // Close all other dropdowns first
                    document.querySelectorAll('.dropdown-menu').forEach(m => {
                        if (m !== menu) {
                            m.classList.add('opacity-0', 'invisible', '-translate-y-2');
                        }
                    });

                    // Toggle current dropdown
                    if (isOpen) {
                        menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
                    } else {
                        menu.classList.remove('opacity-0', 'invisible', '-translate-y-2');
                    }
                });

                // Handle hover for desktop
                if (window.innerWidth > 768) {
                    dropdown.addEventListener('mouseenter', () => {
                        menu.classList.remove('opacity-0', 'invisible', '-translate-y-2');
                    });

                    dropdown.addEventListener('mouseleave', () => {
                        menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
                    });
                }
            }
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function() {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('opacity-0', 'invisible', '-translate-y-2');
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768 && mobileMenu) {
                mobileMenu.classList.remove('open');
                mobileMenu.classList.add('hidden');
                const menuButton = document.getElementById('mobile-menu-button');
                if (menuButton) {
                    menuButton.setAttribute('aria-expanded', 'false');
                    const icon = menuButton.querySelector('i');
                    if (icon) {
                        icon.classList.add('fa-bars');
                        icon.classList.remove('fa-times');
                    }
                }
            }
        });

        // Add active state to current page link (example)
        const currentPath = window.location.pathname.split('/').pop() || 'index.html';
        document.querySelectorAll('.nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.includes(currentPath)) {
            link.classList.add('text-blue-600', 'font-medium');
            link.classList.remove('text-gray-700');
        }
        });
        });
    </script>
</body>

</html>
