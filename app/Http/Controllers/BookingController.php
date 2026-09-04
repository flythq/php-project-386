<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use Illuminate\Database\UniqueConstraintViolationException;

class BookingController extends Controller
{
    public function store(StoreBookingRequest $request)
    {
        try {
            $booking = Booking::create($request->validated());
        } catch (UniqueConstraintViolationException $e) {
            return redirect()
                ->route('book.index')
                ->withInput()
                ->withErrors(['slot_start_at' => 'Слот уже занят.']);
        }

        return redirect()->route('book.success', $booking)->with('status', 'Запись создана.');
    }

    public function success(Booking $booking)
    {
        return view('book.success', ['booking' => $booking]);
    }
}
