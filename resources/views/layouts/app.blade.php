<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', config('app.name', 'Календарь звонков'))</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen antialiased">
        <header class="border-b border-gray-200 dark:border-gray-800">
            <div class="max-w-4xl mx-auto px-6 py-4 flex items-center justify-between">
                <a href="{{ route('home.index') }}" class="font-semibold tracking-tight text-gray-900 dark:text-white">
                    Календарь звонков
                </a>
                <a href="{{ route('book.index') }}" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">
                    Записаться
                </a>
            </div>
        </header>

        <main class="max-w-4xl mx-auto px-6 py-12">
            @yield('content')
        </main>

        <footer class="max-w-4xl mx-auto px-6 py-8 text-sm text-gray-400 dark:text-gray-500">
            v{{ app()->version() }}
        </footer>
    </body>
</html>
