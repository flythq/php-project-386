@extends('layouts.app')

@section('title', 'Запись на звонок')

@section('content')
    <section>
        <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Запись на звонок
        </h1>
        <p class="mt-3 text-gray-600 dark:text-gray-400">
            Выберите свободный 30-минутный слот и оставьте свои данные.
        </p>

        @if ($slots->isEmpty())
            <p class="mt-8 text-gray-600 dark:text-gray-400">
                Свободных слотов пока нет. Загляните позже.
            </p>
        @else
            <ul class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($slots as $slot)
                    @if ($slot->is_available)
                        <li>
                            <a href="{{ route('book.index') }}?slot={{ $slot->start_at->toDateTimeString() }}"
                               class="block rounded-lg border border-gray-300 dark:border-gray-700 px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-800">
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ $slot->start_at->format('d.m.Y H:i') }}
                                </span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400">
                                    30 минут
                                </span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif

        <div class="mt-8">
            <a href="{{ route('home.index') }}" class="inline-block rounded-lg border border-gray-300 dark:border-gray-700 px-6 py-3 text-base font-medium text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800">
                На главную
            </a>
        </div>
    </section>
@endsection
