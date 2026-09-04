@extends('layouts.app')

@section('title', 'Запись подтверждена')

@section('content')
    <section class="text-center">
        <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Запись подтверждена
        </h1>
        <p class="mt-3 text-gray-600 dark:text-gray-400">
            Ваша запись на звонок зафиксирована.
        </p>

        <dl class="mt-8 text-left inline-block space-y-2">
            <div>
                <dt class="inline font-medium text-gray-900 dark:text-white">Когда:</dt>
                <dd class="inline text-gray-700 dark:text-gray-300">{{ $booking->slot_start_at->format('d.m.Y H:i') }} (30 минут)</dd>
            </div>
            <div>
                <dt class="inline font-medium text-gray-900 dark:text-white">Имя:</dt>
                <dd class="inline text-gray-700 dark:text-gray-300">{{ $booking->invitee_name }}</dd>
            </div>
            <div>
                <dt class="inline font-medium text-gray-900 dark:text-white">E-mail:</dt>
                <dd class="inline text-gray-700 dark:text-gray-300">{{ $booking->invitee_email }}</dd>
            </div>
        </dl>

        <div class="mt-8">
            <a href="{{ route('home.index') }}" class="inline-block rounded-lg border border-gray-300 dark:border-gray-700 px-6 py-3 text-base font-medium text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800">
                На главную
            </a>
        </div>
    </section>
@endsection
