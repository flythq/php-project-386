@extends('layouts.app')

@section('title', 'Список записей')

@section('content')
    <section>
        <h1 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Записи на звонки
        </h1>

        @if ($bookings->isEmpty())
            <p class="mt-8 text-gray-600 dark:text-gray-400">
                Записей нет.
            </p>
        @else
            <table class="mt-8 w-full text-left text-sm">
                <thead class="border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="py-2 pr-4 font-medium text-gray-900 dark:text-white">Когда</th>
                        <th class="py-2 pr-4 font-medium text-gray-900 dark:text-white">Гость</th>
                        <th class="py-2 font-medium text-gray-900 dark:text-white">E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <td class="py-2 pr-4 text-gray-900 dark:text-gray-100">{{ $booking->slot_start_at->format('d.m.Y H:i') }}</td>
                            <td class="py-2 pr-4 text-gray-900 dark:text-gray-100">{{ $booking->invitee_name }}</td>
                            <td class="py-2 text-gray-900 dark:text-gray-100">{{ $booking->invitee_email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>
@endsection
