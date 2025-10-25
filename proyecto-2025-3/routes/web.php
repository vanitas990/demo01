<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Estudiante;

use App\Http\Controllers\Estudiantes\EstudiantesController;

use App\Http\Controllers\Jugadores\JugadoresController;

Route::get('/', function () {


    return view('welcome');
});


// Rutas existentes...
Route::get('/estudiantes', [EstudiantesController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/create', [EstudiantesController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [EstudiantesController::class, 'store'])->name('estudiantes.store');
Route::get('/estudiantes/{id}/edit', [EstudiantesController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'destroy'])->name('estudiantes.destroy');

// Nueva ruta para la página de confirmación de eliminación
Route::get('/estudiantes/{id}/delete', [EstudiantesController::class, 'delete'])->name('estudiantes.delete');


Route::get('/turismo-quest', function () {
    return view('turismo-quest.index'); // 👈 OJO: usa punto (.) no /
})->name('turismo-quest');
