<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Календарь звонков') }}</title>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center antialiased">
        <main class="max-w-md w-full text-center px-6">
            <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                Календарь звонков
            </h1>
            <p class="mt-3 text-gray-600 dark:text-gray-400">
                Сервис записи на звонки по 30 минут. Каркас приложения собран и готов к разработке функциональности.
            </p>
            <p class="mt-8 text-sm text-gray-400 dark:text-gray-500">
                v{{ app()->version() }}
            </p>
        </main>
    </body>
</html>
