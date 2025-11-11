<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsuariosInertiaController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'DESC')->get();

        return Inertia::render('Usuarios/index', [
            'usuarios' => $usuarios
        ]);
    }

    public function create()
    {
        return Inertia::render('Usuarios/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:500',
            'genero' => 'nullable|string|in:masculino,femenino,otro',
            'estado' => 'required|string|in:activo,inactivo'
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
            'estado' => $request->estado,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);

        return Inertia::render('Usuarios/edit', [
            'usuario' => $usuario
        ]);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $usuario->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:500',
            'genero' => 'nullable|string|in:masculino,femenino,otro',
            'estado' => 'required|string|in:activo,inactivo'
        ]);

        $data = [
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
            'estado' => $request->estado,
        ];

        // Solo actualizar la contraseña si se proporciona
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente');
    }

   public function delete($id)
{
    $usuario = Usuario::findOrFail($id);

    return Inertia::render('Usuarios/delete', [
        'usuario' => $usuario
    ]);
}
public function destroy($id)
{
    $usuario = Usuario::findOrFail($id);
    $usuario->delete();

    return redirect()->route('usuarios.index')
        ->with('success', 'Usuario eliminado exitosamente');
}       
}
