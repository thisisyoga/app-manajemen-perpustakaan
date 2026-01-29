<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPanel</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        @include('layouts.sidebar')

        <div class="flex flex-1 flex-col">
           

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
    </script>
</body>
</html>