<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('prueba');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('passes', App\Http\Controllers\PassController::class)->middleware('auth');