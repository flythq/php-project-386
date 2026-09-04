@extends('layouts.app')

@section('content')
    <section class="text-center">
        <h1 class="text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Календарь звонков
        </h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
            Запишитесь на 30-минутный звонок в удобное время — просто и без переписки.
        </p>
        <div class="mt-8">
            <a href="{{ route('book.index') }}" class="inline-block rounded-lg bg-blue-600 px-6 py-3 text-base font-medium text-white hover:bg-blue-700">
                Записаться на звонок
            </a>
        </div>
    </section>

    <section class="mt-16 grid gap-8 sm:grid-cols-3">
        <div class="text-center">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">30 минут</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Фиксированная длительность звонка — без недопониманий по времени.
            </p>
        </div>
        <div class="text-center">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Выбор слота</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Свободные 30-минутные интервалы в календаре организатора на выбор.
            </p>
        </div>
        <div class="text-center">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">Подтверждение на e-mail</h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Уведомление о записи приходит на почту сразу после выбора слота.
            </p>
        </div>
    </section>
@endsection
