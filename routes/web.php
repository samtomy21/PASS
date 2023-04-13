<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PassController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\DependenceController;

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

Route::resource('passes', PassController::class)->middleware('auth');
Route::resource('charges', ChargeController::class)->middleware('auth');
Route::resource('dependences', DependenceController::class)->middleware('auth');
