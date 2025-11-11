<?php

use App\Http\Controllers\Estudiantes\EstudiantesInertiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Usuarios\UsuariosInertiaController;
use App\Http\Controllers\Estudiantes\EstudianteReportePdfController;
use App\Http\Controllers\Usuarios\UsuarioReportepdfController;
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// RUTAS DE ESTUDIANTES
Route::resource('estudiantes', EstudiantesInertiaController::class);
Route::get('/estudiantes', [EstudiantesInertiaController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/{id}/edit', [EstudiantesInertiaController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}', [EstudiantesInertiaController::class, 'update'])->name('estudiantes.update');

Route::get('/estudiantes/{id}/delete', [EstudiantesInertiaController::class, 'delete'])
    ->name('estudiantes.delete');

// RUTA DEL PDF 
Route::get('/estudiantes/reporte/pdf', [EstudianteReportePdfController::class, 'index'])
    ->name('estudiantes.reporte.pdf');

Route::middleware(['auth'])->group(function () {
    // Rutas GET
    Route::get('/usuarios', [UsuariosInertiaController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuariosInertiaController::class, 'create'])->name('usuarios.create');
    Route::get('/usuarios/{id}/edit', [UsuariosInertiaController::class, 'edit'])->name('usuarios.edit');
    Route::get('/usuarios/{id}/delete', [UsuariosInertiaController::class, 'delete'])->name('usuarios.delete');
    
    // Rutas de acción
    Route::post('/usuarios', [UsuariosInertiaController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{id}', [UsuariosInertiaController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UsuariosInertiaController::class, 'destroy'])->name('usuarios.destroy');
});
Route::get('/usuarios/reporte/pdf', [UsuarioReportePdfController::class, 'index'])
    ->name('usuarios.reporte.pdf');



require __DIR__.'/auth.php';
