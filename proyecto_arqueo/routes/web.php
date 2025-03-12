<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArqueologoController;
use App\Http\Controllers\YacimientoController;
use App\Http\Controllers\PiezaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/arqueologos', [ArqueologoController::class, 'index'])->name('arqueologos.index');
    Route::get('/yacimientos', [YacimientoController::class, 'index'])->name('yacimientos.index');
    Route::get('/piezas', [PiezaController::class, 'index'])->name('piezas.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
