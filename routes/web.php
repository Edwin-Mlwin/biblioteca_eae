<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;  // Asegúrate de importar el DashboardController
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TextoController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Actualiza esta ruta para que apunte a tu controlador y su método 'index'
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rutas para el perfil (si las necesitas)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    // CATEGORIAS
    //Route::get('/getCategorias', [ProfileController::class, 'getCategorias']);

    
    Route::resource('usuarios', UsuarioController::class);    // Rutas de usuarios
        
    
    Route::resource('categorias', CategoriaController::class);  // Rutas de categorías
    
    
    Route::resource('textos', TextoController::class);    // Rutas de textos
    
    
    Route::resource('archivos', ArchivoController::class);     // Rutas de archivos
    
    
    Route::resource('autores', AutorController::class);      // Rutas de autores
});

require __DIR__.'/auth.php';
