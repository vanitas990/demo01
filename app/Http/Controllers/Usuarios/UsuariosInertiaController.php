<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsuariosInertiaController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('id', 'DESC')->get();

        return Inertia::render('Usuarios/Index', [
            'Usuarios' => $usuarios
        ]);
    }
}
