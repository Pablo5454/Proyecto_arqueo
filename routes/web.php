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
    Route::get('/arqueologos/create', [ArqueologoController::class, 'create'])->name('arqueologos.create');
    Route::post('/arqueologos', [ArqueologoController::class, 'store'])->name('arqueologos.store');
    Route::get('/arqueologos/{arqueologo}/edit', [ArqueologoController::class, 'edit'])->name('arqueologos.edit');
    Route::put('/arqueologos/{arqueologo}', [ArqueologoController::class, 'update'])->name('arqueologos.update');
    Route::delete('/arqueologos/{arqueologo}', [ArqueologoController::class, 'destroy'])->name('arqueologos.destroy');

    Route::get('/yacimientos', [YacimientoController::class, 'index'])->name('yacimientos.index');
    Route::get('/yacimientos/create', [YacimientoController::class, 'create'])->name('yacimientos.create');
    Route::post('/yacimientos', [YacimientoController::class, 'store'])->name('yacimientos.store');
    Route::get('/yacimientos/{yacimiento}/edit', [YacimientoController::class, 'edit'])->name('yacimientos.edit');
    Route::put('/yacimientos/{yacimiento}', [YacimientoController::class, 'update'])->name('yacimientos.update');
    Route::delete('/yacimientos/{yacimiento}', [YacimientoController::class, 'destroy'])->name('yacimientos.destroy');
    
    Route::get('/piezas', [PiezaController::class, 'index'])->name('piezas.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
