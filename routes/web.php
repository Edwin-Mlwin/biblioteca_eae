<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TextoController;
use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // USUARIOS
    Route::get('/getUsuarios', [UsuarioController::class, 'getUsuarios']);
    Route::post('/storeUsuarios', [UsuarioController::class, 'storeUsuarios']);
    Route::post('/updateUsuarios', [UsuarioController::class, 'updateUsuarios']); 
    Route::post('/deleteUsuarios', [UsuarioController::class, 'deleteUsuarios']); 
    
    // CATEGORÍAS
    Route::get('/getCategorias', [CategoriaController::class, 'getCategorias']);                                   
    Route::post('/storeCategorias', [CategoriaController::class, 'storeCategorias']);                                
    Route::post('/updateCategorias', [CategoriaController::class, 'updateCategorias']);                              
    Route::post('/deleteCategorias', [CategoriaController::class, 'deleteCategorias']);                             
                                     
    // ARCHIVOS
    Route::get('/getArchivos', [ArchivoController::class, 'getArchivos']);                                      
    Route::post('/storeArchivos', [ArchivoController::class, 'storeArchivos']);                                   
    Route::post('/updateArchivos', [ArchivoController::class, 'updateArchivos']);                                 
    Route::post('/deleteArchivos', [ArchivoController::class, 'deleteArchivos']);                                
    
    // AUTORES
    Route::get('/getAutores',[AutorController::class,'getAutores']);
    Route::post('/storeAutores', [AutorController::class,'storeAutores']);
    Route::post('/updateAutores', [AutorController::class,'updateAutores']);
    Route::post('/deleteAutores', [AutorController::class,'deleteAutores']);

    // TEXTOS
    Route::get('/getTextos', [TextoController::class, 'getTextos']);                                             
    Route::post('/storeTextos', [TextoController::class, 'storeTextos']);                                          
    Route::post('/updateTextos', [TextoController::class, 'updateTextos']);                                        
    Route::post('/deleteTextos', [TextoController::class, 'deleteTextos']);  
});

require __DIR__.'/auth.php';
