<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Estudiantes\EstudiantesController;
use App\Http\Controllers\Jugadores\JugadoresController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas públicas
Route::get('/turismo-quest', function () {
    return view('turismo-quest.index');
})->name('turismo-quest');

// RUTAS DE AUTENTICACIÓN (FUERA del grupo admin, SIN middleware auth)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registrar', [RegisterController::class, 'register'])->name('registrar.submit');

// Rutas de estudiantes (CRUD completo)
Route::resource('estudiantes', EstudiantesController::class)->except(['show']);
Route::get('/estudiantes/{id}/delete', [EstudiantesController::class, 'delete'])->name('estudiantes.delete');

// Rutas de usuarios
Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::get('/usuarios/login', [UsuarioController::class, 'login'])->name('usuarios.login');

// Grupo de rutas administrativas protegidas (SOLO para usuarios autenticados)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // Rutas de gestión de administradores
    Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [AdminController::class, 'update'])->name('update');
    
    // Rutas de desactivación
    Route::get('/{id}/desactivar', [AdminController::class, 'showDesactivar'])->name('desactivar');
    Route::put('/{id}/desactivar', [AdminController::class, 'desactivar'])->name('desactivar.confirm');
    
    // Rutas de eliminación
    Route::get('/{id}/eliminar', [AdminController::class, 'showEliminar'])->name('eliminar');
    Route::delete('/{id}/eliminar', [AdminController::class, 'eliminar'])->name('eliminar.confirm');

    
});
