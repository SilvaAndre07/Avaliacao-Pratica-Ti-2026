<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro de Startup</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0B1F3B',   
                        secondary: '#F5C518', 
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Navigation --}}
    <nav class="bg-primary text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-lg font-bold tracking-wide">
                Portal de Startups - Vale do Sol
            </a>

            <a href="/startups/create"
               class="bg-secondary text-primary font-semibold px-4 py-2 rounded hover:opacity-90 transition">
                Registre sua Startup
            </a>
        </div>
    </nav>

    {{-- Content --}}
    <main class="flex-1 max-w-6xl mx-auto px-4 py-10 w-full">
        @yield('content')
    </main>
</body>
</html>
