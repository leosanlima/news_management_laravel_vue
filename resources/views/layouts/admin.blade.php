<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Administração de Notícias</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div>
        <!-- Navigation -->
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="text-gray-300 hover:text-white px-3 py-2 rounded-md">
                            <span class="text-white font-bold">Administração</span>
                        </a>
                        </div>
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="{{ route('admin.categories.index') }}" 
                               class="text-gray-300 hover:text-white px-3 py-2 rounded-md">
                                Categorias
                            </a>
                            <a href="{{ route('admin.news.index') }}" 
                               class="text-gray-300 hover:text-white px-3 py-2 rounded-md">
                                Notícias
                            </a>
                            <a href="/" 
                               class="text-gray-300 hover:text-white px-3 py-2 rounded-md">
                                Exibir Notícias
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>