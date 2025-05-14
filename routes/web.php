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

Route::get('/debug', function () {
    return [
        'auth' => auth()->check(),
        'user' => auth()->user()?->email,
        'roles' => auth()->user()?->getRoleNames(),
    ];
})->middleware('auth');

Route::middleware('auth')->group(function () {

    // Rutas accesibles por ambos roles: gestor y arqueologo
    Route::middleware('role:gestor|arqueologo')->group(function() {
        // Ver listados
        Route::get('/arqueologos', [ArqueologoController::class, 'index'])->name('arqueologos.index');
        Route::get('/yacimientos', [YacimientoController::class, 'index'])->name('yacimientos.index');
        // Route::get('/yacimientos/{yacimiento}', [YacimientoController::class, 'show'])->name('yacimientos.show');
        Route::get('/piezas', [PiezaController::class, 'index'])->name('piezas.index');
        Route::get('/piezas/create', [PiezaController::class, 'create'])->name('piezas.create');
        Route::post('/piezas', [PiezaController::class, 'store'])->name('piezas.store');

    });

    // Rutas exclusivas para gestores
    Route::middleware('role:gestor')->group(function() {
        // CRUD arqueólogos
        Route::get('/arqueologos/create', [ArqueologoController::class, 'create'])->name('arqueologos.create');
        Route::post('/arqueologos', [ArqueologoController::class, 'store'])->name('arqueologos.store');
        Route::get('/arqueologos/{arqueologo}/edit', [ArqueologoController::class, 'edit'])->name('arqueologos.edit');
        Route::put('/arqueologos/{arqueologo}', [ArqueologoController::class, 'update'])->name('arqueologos.update');
        Route::delete('/arqueologos/{arqueologo}', [ArqueologoController::class, 'destroy'])->name('arqueologos.destroy');

        // CRUD yacimientos
        Route::get('/yacimientos/create', [YacimientoController::class, 'create'])->name('yacimientos.create');
        Route::post('/yacimientos', [YacimientoController::class, 'store'])->name('yacimientos.store');
        Route::get('/yacimientos/{yacimiento}/edit', [YacimientoController::class, 'edit'])->name('yacimientos.edit');
        Route::put('/yacimientos/{yacimiento}', [YacimientoController::class, 'update'])->name('yacimientos.update');
        Route::delete('/yacimientos/{yacimiento}', [YacimientoController::class, 'destroy'])->name('yacimientos.destroy');

        // CRUD piezas
        Route::get('/piezas/create', [PiezaController::class, 'create'])->name('piezas.create');
        Route::post('/piezas', [PiezaController::class, 'store'])->name('piezas.store');
        Route::get('/piezas/{pieza}/edit', [PiezaController::class, 'edit'])->name('piezas.edit');
        Route::put('/piezas/{pieza}', [PiezaController::class, 'update'])->name('piezas.update');
        Route::delete('/piezas/{pieza}', [PiezaController::class, 'destroy'])->name('piezas.destroy');
    });

    // Rutas exclusivas para arqueólogos (crear piezas)
    Route::middleware('role:arqueologo')->group(function() {
        
        
    });

    // Rutas comunes para todos los usuarios autenticados
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
