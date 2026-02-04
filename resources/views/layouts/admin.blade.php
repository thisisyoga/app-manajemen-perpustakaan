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