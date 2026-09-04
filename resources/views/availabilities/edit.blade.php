@extends('layouts.app')

@section('title', 'Изменить окно доступности')

@section('content')
    <section class="max-w-lg">
        <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Изменить окно доступности
        </h1>

        <form method="POST" action="{{ route('availabilities.update', $availability) }}" class="mt-8 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="weekday" class="block text-sm font-medium text-gray-900 dark:text-white">День недели</label>
                <select name="weekday" id="weekday" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-gray-900 dark:text-gray-100">
                    @for ($d = 1; $d <= 7; $d++)
                        <option value="{{ $d }}" {{ old('weekday', (string) $availability->weekday) == (string) $d ? 'selected' : '' }}>{{ $d }}</option>
                    @endfor
                </select>
                @error('weekday')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="start_time" class="block text-sm font-medium text-gray-900 dark:text-white">Начало (ЧЧ:ММ)</label>
                <input type="text" name="start_time" id="start_time" value="{{ old('start_time', $availability->start_time?->format('H:i')) }}" placeholder="10:00" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-gray-900 dark:text-gray-100">
                @error('start_time')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="end_time" class="block text-sm font-medium text-gray-900 dark:text-white">Окончание (ЧЧ:ММ)</label>
                <input type="text" name="end_time" id="end_time" value="{{ old('end_time', $availability->end_time?->format('H:i')) }}" placeholder="18:00" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-3 py-2 text-gray-900 dark:text-gray-100">
                @error('end_time')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Сохранить</button>
                <a href="{{ route('availabilities.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Отмена</a>
            </div>
        </form>
    </section>
@endsection
