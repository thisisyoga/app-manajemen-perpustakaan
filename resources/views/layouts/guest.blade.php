<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-stone-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Perpustakaan Digital') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; 
        overflow: hidden;
    }
    </style>
</head>
<body class="h-full antialiased text-stone-600">
    
    <div class="min-h-screen flex">
        <!-- Left Side: Form Area -->
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-white">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <!-- Brand / Logo -->
                <div class="flex items-center gap-3 mb-10">
                    <div class="bg-amber-600 p-2 rounded-lg text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-stone-900 tracking-tight">PerpusDigi.</span>
                </div>

                <!-- Content Slot -->
                <div>
                    {{ $slot }}
                </div>

                <!-- Footer -->
                {{-- <div class="mt-10 border-t border-stone-100 pt-6">
                    <p class="text-xs text-stone-400 text-center">
                        &copy; {{ date('Y') }} Perpustakaan Digital. Hak cipta dilindungi.
                    </p>
                </div> --}}
            </div>
        </div>

        <!-- Right Side: Image & Atmosphere -->
        <div class="hidden lg:block relative w-0 flex-1">
            <!-- Real Image from Unsplash for authenticity -->
            <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1507842217121-9e9f147d7121?q=80&w=2670&auto=format&fit=crop" alt="Library background">
            
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-stone-900/90 via-stone-900/50 to-stone-900/20 mix-blend-multiply"></div>
            
            <!-- Text Overlay -->
            <div class="absolute bottom-0 left-0 right-0 p-16 text-white z-10">
                <blockquote class="space-y-2">
                    <p class="text-lg font-medium leading-relaxed opacity-90">
                        "Buku adalah liburan paling murah namun paling menyenangkan yang bisa Anda beli."
                    </p>
                    <footer class="text-sm font-semibold text-amber-400">— Literasi Indonesia</footer>
                </blockquote>
            </div>
        </div>
    </div>

</body>
</html>