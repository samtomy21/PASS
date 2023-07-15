<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ChartController;

use App\Http\Controllers\PassController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\DependenceController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\UsernocheckController;
use App\Http\Controllers\UsercheckController;
use App\Http\Controllers\BosscheckController;
use App\Http\Controllers\RhcheckController;
use App\Http\Controllers\ArchivedController;

use App\Http\Controllers\HourController;
use App\Http\Controllers\DepartureTimeController;
use App\Http\Controllers\ReturnTimeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [ChartController::class, 'useChart1'])->name('dashboard');
    Route::get('/dashboard', [ChartController::class, 'useChart2'])->name('dashboard');
});

Route::resource('passes', PassController::class)->middleware('auth');
Route::resource('charges', ChargeController::class)->middleware('auth');
Route::resource('dependences', DependenceController::class)->middleware('auth');
Route::resource('times', TimeController::class)->middleware('auth');

Route::get('passes.reporte', [PassController::class, 'reporte'])->middleware('auth')->name('passes.reporte');
Route::get('passes/{id}/print', [PassController::class, 'print'])->middleware('auth')->name('passes.print');

Route::get('passes/{id}/firmar', [PassController::class, 'firmar'])->middleware('auth')->name('passes.firmar');
Route::get('passes/{id}/firmaruser', [UsercheckController::class, 'firmarUser'])->middleware('auth')->name('passes.firmaruser');
Route::get('passes/{id}/firmarboss', [BosscheckController::class, 'firmarBoss'])->middleware('auth')->name('passes.firmarboss');
Route::get('passes/{id}/firmarrh', [RhcheckController::class, 'firmarRh'])->middleware('auth')->name('passes.firmarrh');

Route::get('passes/{id}/archivar', [HourController::class, 'archivar'])->middleware('auth')->name('passes.archivar');
Route::get('archived', [ArchivedController::class, 'index'])->middleware('auth')->name('archived.index');
Route::get('archived/{id}/show', [ArchivedController::class, 'show'])->middleware('auth')->name('archived.show');
Route::get('archived.reporte', [ArchivedController::class, 'reporte'])->middleware('auth')->name('archived.reporte');
Route::get('archived/{id}/print', [ArchivedController::class, 'print'])->middleware('auth')->name('archived.print');


Route::get('passesadmin.reporte', [AdminController::class, 'reporte'])->middleware('auth')->name('passesadmin.reporte');
Route::get('passesadmin', [AdminController::class, 'index'])->middleware('auth')->name('passesadmin.index');
Route::get('usernocheck', [UsernocheckController::class, 'index'])->middleware('auth')->name('usernocheck.index');
Route::get('usercheck', [UsercheckController::class, 'index'])->middleware('auth')->name('usercheck.index');
Route::get('bosscheck', [BosscheckController::class, 'index'])->middleware('auth')->name('bosscheck.index');
Route::get('rhcheck', [RhcheckController::class, 'index'])->middleware('auth')->name('rhcheck.index');


Route::get('hours', [HourController::class, 'index'])->middleware('auth')->name('hours.index');

Route::get('hours/{id}/asignarHoraSalida', [DepartureTimeController::class, 'assign_departure_time'])->middleware('auth')->name('hours.asignarHoraSalida');
Route::get('hours/{id}/asignarHoraRetorno', [ReturnTimeController::class, 'assing_return_time'])->middleware('auth')->name('hours.asignarHoraRetorno');
Route::post('hours/horaRetornoStore', [ReturnTimeController::class, 'return_hour_store'])->middleware('auth')->name('hours.store');


Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->middleware('auth');


