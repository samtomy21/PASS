<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

use App\Http\Controllers\PassController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\DependenceController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
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
Route::delete('passes.deleteAll', [PassController::class, 'deleteAll'])->name('passes.deleteAll')->middleware('auth');
Route::resource('charges', ChargeController::class)->middleware('auth');
Route::resource('dependences', DependenceController::class)->middleware('auth');

Route::get('passes.reporte', [PassController::class, 'reporte'])->middleware('auth')->name('passes.reporte');
Route::get('passes/{id}/print', [PassController::class, 'print'])->middleware('auth')->name('passes.print');
Route::get('passes/{id}/firmar', [PassController::class, 'firmar'])->middleware('auth')->name('passes.firmar');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->middleware('auth');


Route::get('pdf', function(){
    $pdf = PDF::loadview('pdf.pdf', [
        'titulo' => 'Este es mi titulo'
    ]);
    //$path = storage_path('app/public/prueba.pdf');
    //$pdf->save($path);

    //Storage::put('public/prueba2.pdf', $pdf->output());

    return $pdf->stream();
});



