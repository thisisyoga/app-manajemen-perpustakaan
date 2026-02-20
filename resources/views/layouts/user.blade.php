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

        @include('layouts.navbar')

        <div class="flex flex-1 flex-col">
           

                @yield('content')
            
        </div>
    


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = mobileMenu.classList.contains('open');
            if (isExpanded) {
                mobileMenu.classList.remove('open');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            } else {
                mobileMenu.classList.remove('hidden');
                void mobileMenu.offsetHeight;
                mobileMenu.classList.add('open');
            }

            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);

            const icon = this.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }
        });
    }
});
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
                    link.classList.add('text-amber-600', 'font-medium');
                    link.classList.remove('text-gray-700');
                }
            });
        });
    </script>
</body>

</html>