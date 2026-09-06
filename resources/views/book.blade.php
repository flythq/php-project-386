@extends('layouts.app')

@section('title', 'Запись на звонок')

@section('content')
    <div class="mx-auto max-w-3xl">
        <a href="{{ route('home.index') }}" class="inline-flex items-center gap-1 text-sm text-neutral-500 transition hover:text-neutral-900 dark:text-neutral-400 dark:hover:text-neutral-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                <path d="m12 19-7-7 7-7M19 12H5"/>
            </svg>
            На главную
        </a>

        <h1 class="mt-4 text-3xl font-semibold tracking-tight text-neutral-900 dark:text-white">
            Запись на звонок
        </h1>
        <p class="mt-2 text-neutral-600 dark:text-neutral-400">
            Выберите свободный 30-минутный слот и оставьте свои данные.
        </p>

        @if (session('status'))
            <div class="mt-6 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-900/60 dark:bg-green-950/40 dark:text-green-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-0.5 h-4 w-4 flex-shrink-0">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <path d="m9 11 3 3L22 4"/>
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if ($slots->isEmpty())
            <x-empty-state class="mt-8" title="Свободных слотов пока нет" description="Загляните позже — организатор добавит новые окна доступности.">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                    <rect width="18" height="18" x="3" y="4" rx="2"/>
                    <path d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
            </x-empty-state>
        @else
            <form method="POST" action="{{ route('book.store') }}" class="mt-8 space-y-8">
                @csrf

                <x-card class="p-6">
                    <fieldset>
                        <legend class="text-sm font-semibold text-neutral-900 dark:text-white">Свободные слоты</legend>
                        <p class="mt-1 text-xs text-neutral-500 dark:text-neutral-400">Каждый слот — 30 минут. Выберите подходящее время.</p>
                        <ul class="mt-4 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($slots as $slot)
                                @if ($slot->is_available)
                                    <li>
                                        <label class="group flex cursor-pointer items-center gap-3 rounded-xl border border-neutral-300 px-4 py-3 transition hover:border-brand-400 hover:bg-brand-50/40 has-[:checked]:border-brand-500 has-[:checked]:bg-brand-50 has-[:checked]:ring-2 has-[:checked]:ring-brand-500/30 dark:border-neutral-700 dark:hover:border-brand-600 dark:hover:bg-brand-950/30 dark:has-[:checked]:border-brand-500 dark:has-[:checked]:bg-brand-950/50">
                                            <input type="radio" name="slot_start_at" value="{{ $slot->start_at->toDateTimeString() }}" class="h-4 w-4 border-neutral-300 text-brand-600 focus:ring-brand-600 dark:border-neutral-600 dark:bg-neutral-700">
                                            <span class="text-sm font-medium text-neutral-900 dark:text-neutral-100">{{ $slot->start_at->format('d.m.Y H:i') }}</span>
                                        </label>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        @error('slot_start_at')
                            <p class="mt-3 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </fieldset>
                </x-card>

                <x-card class="p-6">
                    <h2 class="text-sm font-semibold text-neutral-900 dark:text-white">Ваши данные</h2>
                    <div class="mt-4 grid gap-4 sm:grid-cols-2">
                        <x-input label="Имя" name="invitee_name" :value="old('invitee_name')" />
                        <x-input label="E-mail" name="invitee_email" type="email" :value="old('invitee_email')" />
                    </div>
                </x-card>

                <div class="flex items-center justify-end">
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-3 text-base font-medium text-white shadow-sm transition hover:bg-brand-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-600">
                        Записаться
                    </button>
                </div>
            </form>
        @endif
    </div>
@endsection
