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

        @if (session('status'))
            <p class="mt-4 rounded-lg bg-green-50 dark:bg-green-900/30 px-4 py-3 text-sm text-green-700 dark:text-green-300">
                {{ session('status') }}
            </p>
        @endif

        @if ($slots->isEmpty())
            <p class="mt-8 text-gray-600 dark:text-gray-400">
                Свободных слотов пока нет. Загляните позже.
            </p>
        @else
            <form method="POST" action="{{ route('book.store') }}" class="mt-8 space-y-6">
                @csrf
                <fieldset>
                    <legend class="text-sm font-medium text-gray-900 dark:text-white">Свободные слоты</legend>
                    <ul class="mt-3 grid gap-2 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($slots as $slot)
                            @if ($slot->is_available)
                                <li>
                                    <label class="flex items-center gap-2 rounded-lg border border-gray-300 dark:border-gray-700 px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-800">
                                        <input type="radio" name="slot_start_at" value="{{ $slot->start_at->toDateTimeString() }}" class="text-blue-600">
                                        <span class="text-gray-900 dark:text-gray-100">{{ $slot->start_at->format('d.m.Y H:i') }}</span>
                                    </label>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    @error('slot_start_at')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="invitee_name" class="block text-sm font-medium text-gray-900 dark:text-white">Имя</label>
                        <input type="text" name="invitee_name" id="invitee_name" value="{{ old('invitee_name') }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-gray-900 dark:text-gray-100">
                        @error('invitee_name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="invitee_email" class="block text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                        <input type="email" name="invitee_email" id="invitee_email" value="{{ old('invitee_email') }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-gray-900 dark:text-gray-100">
                        @error('invitee_email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="rounded-lg bg-blue-600 px-6 py-3 text-base font-medium text-white hover:bg-blue-700">
                    Записаться
                </button>
            </form>
        @endif

        <div class="mt-8">
            <a href="{{ route('home.index') }}" class="inline-block rounded-lg border border-gray-300 dark:border-gray-700 px-6 py-3 text-base font-medium text-gray-900 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800">
                На главную
            </a>
        </div>
    </section>
@endsection
