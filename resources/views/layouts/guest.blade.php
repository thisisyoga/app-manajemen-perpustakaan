<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-amber-50/30">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>{{ config('app.name', 'Perpustakaan Aksara') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            overflow: hidden;
        }
        .font-serif {
            font-family: 'Lora', serif;
        }
    </style>
</head>
<body class="h-full antialiased text-amber-950">
    
    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 bg-white shadow-2xl z-10">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div class="flex items-center gap-3 mb-10 group cursor-default">
                    <div class="flex items-center">
                <a href="#" class="flex items-center group">
                    <img 
                        src="{{ asset('image/logo.png') }}" 
                        alt="Aksara Logo"
                        class="h-20 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
                    >
                </a>
            </div>
                    
                </div>

                <div class="py-4">
                    {{ $slot }}
                </div>

                <div class="mt-8 pt-6 border-t border-amber-50 text-center">
                    <p class="text-[10px] uppercase tracking-widest text-amber-800/30 font-bold">
                        &copy; {{ date('Y') }} Aksara Digital
                    </p>
                </div>
            </div>
        </div>

        <div class="hidden lg:block relative w-0 flex-1 bg-amber-900">
            <img class="absolute inset-0 h-full w-full object-cover" 
                 src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=2070&auto=format&fit=crop" 
                 alt="Library atmosphere">
            
            <div class="absolute inset-0 bg-gradient-to-br from-amber-900/40 via-amber-950/80 to-amber-950/95 mix-blend-multiply"></div>
            
            <div class="absolute top-10 right-10 w-32 h-32 bg-amber-400/10 rounded-full blur-3xl"></div>

            <div class="absolute bottom-0 left-0 right-0 p-20 text-white z-10">
                <blockquote class="max-w-xl">
                    <p class="text-3xl font-serif italic leading-relaxed text-amber-50">
                        "Buku adalah jendela di mana jiwa melihat ke dunia luar."
                    </p>
                    <div class="mt-6 flex items-center gap-4">
                        <div class="h-px w-8 bg-amber-400"></div>
                        <footer class="text-sm font-bold tracking-widest uppercase text-amber-400">
                            Aksara Pustaka
                        </footer>
                    </div>
                </blockquote>
            </div>
        </div>
    </div>
</body>
</html>