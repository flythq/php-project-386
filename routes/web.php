<?php

use App\Http\Controllers\AvailabilitiesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/book', [HomeController::class, 'book'])->name('book.index');

Route::resource('availabilities', AvailabilitiesController::class);
