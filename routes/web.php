<?php

use App\Http\Controllers\Estudiantes\EstudiantesInertiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Usuarios\UsuariosInertiaController;
use App\Http\Controllers\Estudiantes\EstudianteReportePdfController;

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

// RUTA DEL PDF CORREGIDA
Route::get('/estudiantes/reporte/pdf', [EstudianteReportePdfController::class, 'index'])
    ->name('estudiantes.reporte.pdf');

// RUTAS DE USUARIOS
Route::middleware(['auth'])->group(function () {
    Route::get('/Usuarios', [UsuariosInertiaController::class, 'Index'])->name('Usuarios.Index');
});

require __DIR__.'/auth.php';
