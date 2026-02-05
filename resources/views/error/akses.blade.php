<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 | Akses Terlarang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: #020617;
            /* slate-950 */
        }

        /* Glassmorphism Dark Mode */
        .glass-container {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(25px) saturate(200%);
            -webkit-backdrop-filter: blur(25px) saturate(200%);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sky-neon-glow {
            box-shadow: 0 0 50px rgba(14, 165, 233, 0.1);
        }

        .text-gradient-sky {
            background: linear-gradient(to right, #38bdf8, #0ea5e9, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center overflow-hidden relative">

    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full flex justify-around items-center opacity-30 pointer-events-none">
        <div class="w-[500px] h-[500px] bg-sky-600/30 rounded-full filter blur-[120px] animate-morph"></div>
        <div class="w-[500px] h-[500px] bg-blue-700/20 rounded-full filter blur-[120px] animate-morph"
            style="animation-delay: -5s;"></div>
    </div>

    <div class="relative z-10 w-full max-w-lg px-6 flex flex-col items-center justify-center">
        <div
            class="glass-container w-full rounded-[3rem] p-12 text-center sky-neon-glow transform transition-all duration-700 hover:scale-[1.01]">

            <div class="relative mb-8 inline-block">
                <div class="absolute inset-0 bg-sky-500 blur-3xl opacity-20 animate-pulse"></div>
                <div class="relative bg-slate-900 border border-sky-500/30 p-7 rounded-[2.5rem] shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-sky-400 animate-floating"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>

            <h1 class="text-5xl font-extrabold mb-5 tracking-tighter text-white">
                Akses <span class="text-gradient-sky">Ditolak</span>
            </h1>
            <p class="text-slate-400 text-lg font-light leading-relaxed mb-10">
                Akses ditolak. Anda mencoba memasuki area terbatas tanpa otorisasi yang valid.
            </p>

            <div class="space-y-4">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="group relative flex items-center justify-center w-full py-4 bg-sky-600 text-white rounded-2xl font-bold transition-all duration-300 hover:bg-sky-500 hover:shadow-[0_0_30px_rgba(14,165,233,0.4)] active:scale-[0.97]">
                        <span class="flex items-center gap-3 tracking-widest text-xs">
                        KEMBALI KE BERANDA
                        <svg class="w-5 h-5 group-hover:rotate-180 transition-transform duration-700" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        </span>
                    </button>
                </form>

                <button onclick="window.history.back()"
                    class="w-full py-2 text-slate-500 hover:text-sky-400 transition-colors text-[10px] font-bold tracking-[0.4em]">
                    [ KEMBALI KE HALAMAN SEBELUMNYA ]
                </button>
            </div>
        </div>
    </div>

</body>

</html>
