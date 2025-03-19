<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;  

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TextoController;
use App\Http\Controllers\ArchivoController;



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


    //USUARIOS
    Route::get('/usuarios', [UsuarioController::class, 'index']);
    Route::post('/usuarios', [UsuarioController::class, 'guardar']);
    Route::put('/usuarios', [UsuarioController::class, 'actualizar']);
    Route::delete('/usuarios', [UsuarioController::class, 'eliminar']);
    
    // CATEGORIAS
    Route::get('/categorias', [ProfileController::class, 'getCategorias']);
    Route::post('/categorias', [ProfileController::class, 'postCategorias']);
    

    // CATEGORÍAS {id}
    Route::get('/categorias', [CategoriaController::class, 'index']);                                   //->name('categorias.index');
    Route::post('/categorias', [CategoriaController::class, 'guardar']);                                //->name('categorias.store');
    Route::put('/categorias', [CategoriaController::class, 'actualizar']);                              //->name('categorias.update');
    Route::delete('/categorias', [CategoriaController::class, 'eliminar']);                             //->name('categorias.destroy');

    
   
   // TEXTOS {id}
   Route::get('/textos', [TextoController::class, 'index']);                                             //->name('textos.index');
   Route::post('/textos', [TextoController::class, 'guardar']);                                          //->name('textos.store');
   Route::put('/textos', [TextoController::class, 'actualizar']);                                        //->name('textos.update');
   Route::delete('/textos', [TextoController::class, 'eliminar']);                                       //->name('textos.destroy');

    //ARCHIVOS {id}
    Route::get('/archivos', [ArchivoController::class, 'index']);                                      // ->name('archivos.index');
    Route::post('/archivos', [ArchivoController::class, 'guardar']);                                   // ->name('archivos.store');
    Route::put('/archivos', [ArchivoController::class, 'actualizar']);                                 // ->name('archivos.update');
    Route::delete('/archivos', [ArchivoController::class, 'eliminar']);                                // ->name('archivos.destroy');
    
    
    //AUTORES

    Route::get('/autores',[AutorController::class,'index']);
    Route::post('/autores', [AutorController::class,'guardar']);
    Route::put('/autores', [AutorController::class,'actualizar']);
    Route::delete('/autores', [AutorController::class,'eliminar']);
    
  
});

require __DIR__.'/auth.php';
