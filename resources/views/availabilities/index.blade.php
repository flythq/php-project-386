@extends('layouts.app')

@section('title', 'Окна доступности')

@section('content')
    <section>
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                Окна доступности
            </h1>
            <a href="{{ route('availabilities.create') }}" class="inline-block rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Добавить окно
            </a>
        </div>

        @if (session('status'))
            <p class="mt-4 rounded-lg bg-green-50 dark:bg-green-900/30 px-4 py-3 text-sm text-green-700 dark:text-green-300">
                {{ session('status') }}
            </p>
        @endif

        @if ($availabilities->isEmpty())
            <p class="mt-8 text-gray-600 dark:text-gray-400">
                Окна доступности не заданы. Добавьте первое.
            </p>
        @else
            <table class="mt-8 w-full text-left text-sm">
                <thead class="border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="py-2 pr-4 font-medium text-gray-900 dark:text-white">День недели</th>
                        <th class="py-2 pr-4 font-medium text-gray-900 dark:text-white">Начало</th>
                        <th class="py-2 pr-4 font-medium text-gray-900 dark:text-white">Окончание</th>
                        <th class="py-2 font-medium text-gray-900 dark:text-white"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availabilities as $availability)
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <td class="py-2 pr-4 text-gray-900 dark:text-gray-100">{{ $availability->weekday }}</td>
                            <td class="py-2 pr-4 text-gray-900 dark:text-gray-100">{{ $availability->start_time?->format('H:i') }}</td>
                            <td class="py-2 pr-4 text-gray-900 dark:text-gray-100">{{ $availability->end_time?->format('H:i') }}</td>
                            <td class="py-2 flex gap-3">
                                <a href="{{ route('availabilities.edit', $availability) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Изменить</a>
                                <form method="POST" action="{{ route('availabilities.destroy', $availability) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 dark:text-red-400 hover:underline">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>
@endsection
