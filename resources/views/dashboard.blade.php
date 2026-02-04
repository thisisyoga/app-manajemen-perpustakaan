<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: currentColor;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .mobile-menu.open {
            max-height: 1000px;
            transition: max-height 0.5s ease-in;
        }

        .badge {
            font-size: 0.65rem;
            top: -0.5rem;
            right: -0.5rem;
        }

        .avatar-ring {
            box-shadow: 0 0 0 2px white, 0 0 0 4px #3B82F6;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Premium Professional Navigation Bar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left Section - Logo/Brand -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center group">
                        <div
                            class="bg-amber-500 group-hover:bg-amber-700 p-2 rounded-lg transition-colors duration-300">
                            <i class="fas fa-cube text-white text-xl"></i>
                        </div>
                        <span
                            class="ml-3 text-xl font-bold text-amber-600 group-hover:text-amber-700 transition-colors duration-300">Aksara.</span>
                    </a>
                </div>

                <!-- Center Section - Main Navigation (Desktop) -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#"
                        class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>
                        Home
                    </a>


                    <a href="#"
                        class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                        <i class="fas fa-building mr-2"></i>
                        Tentang
                    </a>

                    <button
                        class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                        <i class="fas fa-briefcase mr-2"></i>
                        Keunggulan
                    </button>

                    <button
                        class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                        <i class="fas fa-file-alt mr-2"></i>
                        Koleksi Buku
                    </button>


                    <a href="#"
                        class="nav-link text-amber-600 hover:text-amber-700 px-4 py-2 flex items-center rounded-lg hover:bg-amber-50 transition-colors duration-200">
                        <i class="fas fa-envelope mr-2"></i>
                        Contact

                    </a>
                </div>

                <!-- Right Section - Actions -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}"
                        class="hidden md:flex items-center bg-amber-600 hover:bg-amber-800 text-white px-3 py-1 rounded-lg font-medium transition-colors duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
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
                class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                <i class="fas fa-home text-blue-500 mr-3 w-5 text-center"></i>
                Home
            </a>
            <div class="group">
                <button
                    class="w-full flex justify-between items-center px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200">
                    <div class="flex items-center">
                        <i class="fas fa-briefcase text-blue-500 mr-3 w-5 text-center"></i>
                        Products
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-focus:rotate-180"></i>
                </button>
                <div class="pl-4 mt-1 space-y-1 hidden group-focus:block">
                    <a href="#"
                        class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                        <i class="fas fa-laptop text-blue-400 mr-3 w-5 text-center"></i>
                        Software
                    </a>
                    <a href="#"
                        class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                        <i class="fas fa-server text-blue-400 mr-3 w-5 text-center"></i>
                        Services
                    </a>
                    <a href="#"
                        class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                        <i class="fas fa-mobile-screen text-blue-400 mr-3 w-5 text-center"></i>
                        Apps
                    </a>
                </div>
            </div>
            <a href="#"
                class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                <i class="fas fa-building text-blue-500 mr-3 w-5 text-center"></i>
                Company
            </a>
            <div class="group">
                <button
                    class="w-full flex justify-between items-center px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-colors duration-200">
                    <div class="flex items-center">
                        <i class="fas fa-file-alt text-blue-500 mr-3 w-5 text-center"></i>
                        Resources
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-focus:rotate-180"></i>
                </button>
                <div class="pl-4 mt-1 space-y-1 hidden group-focus:block">
                    <a href="#"
                        class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                        <i class="fas fa-book text-blue-400 mr-3 w-5 text-center"></i>
                        Documentation
                    </a>
                    <a href="#"
                        class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                        <i class="fas fa-video text-blue-400 mr-3 w-5 text-center"></i>
                        Tutorials
                    </a>
                    <a href="#"
                        class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                        <i class="fas fa-blog text-blue-400 mr-3 w-5 text-center"></i>
                        Blog
                    </a>
                </div>
            </div>
            <a href="#"
                class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                <i class="fas fa-envelope text-blue-500 mr-3 w-5 text-center"></i>
                Contact
                <span class="ml-2 bg-blue-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">New</span>
            </a>
            <div class="border-t border-gray-200 pt-2 mt-2">
                <a href="#"
                    class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                    <i class="fas fa-user-circle text-blue-500 mr-3 w-5 text-center"></i>
                    Profile
                </a>
                <a href="#"
                    class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                    <i class="fas fa-cog text-blue-500 mr-3 w-5 text-center"></i>
                    Settings
                </a>
                <a href="#"
                    class="block px-4 py-3 rounded-lg text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 flex items-center transition-colors duration-200">
                    <i class="fas fa-sign-out-alt text-blue-500 mr-3 w-5 text-center"></i>
                    Sign Out
                </a>
            </div>
        </div>
    </div>
    </nav>

    <!-- JavaScript for enhanced functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced mobile menu toggle with animation
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    const isExpanded = mobileMenu.classList.contains('open');
                    if (isExpanded) {
                        mobileMenu.classList.remove('open');
                        setTimeout(() => {
                            mobileMenu.classList.add('hidden');
                        }, 300); // Match this with the transition duration
                    } else {
                        mobileMenu.classList.remove('hidden');
                        // Trigger reflow to enable animation
                        void mobileMenu.offsetHeight;
                        mobileMenu.classList.add('open');
                    }

                    // Toggle aria-expanded attribute
                    const expanded = this.getAttribute('aria-expanded') === 'true';
                    this.setAttribute('aria-expanded', !expanded);

                    // Change icon
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-bars');
                        icon.classList.toggle('fa-times');
                    }
                });
            }

            // Improved dropdown handling
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
