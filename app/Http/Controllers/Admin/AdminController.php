<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:admin.access');
    }

    // Listado de usuarios con búsqueda paginada
    public function index(Request $request)
    {
        $search = $request->input('search');

        $usuarios = Usuario::when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.index', compact('usuarios'));
    }

    // Edición de usuario con verificación de permisos
    public function edit(Usuario $usuario)
    {
        Gate::authorize('update-user', $usuario);
        
        return view('admin.edit', [
            'usuario' => $usuario,
            'generos' => ['masculino', 'femenino', 'otro']
        ]);
    }

    // Actualización segura de datos
    public function update(Request $request, Usuario $usuario)
    {
        Gate::authorize('update-user', $usuario);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('usuarios')->ignore($usuario->id)
            ],
            'genero' => 'required|in:masculino,femenino,otro',
            'password' => 'nullable|min:8|confirmed'
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $usuario->update($validated);
        
        Log::info("Usuario actualizado - ID: {$usuario->id}");

        return redirect()->route('admin.index')
                         ->with('success', 'Usuario actualizado correctamente');
    }

    // Desactivación con verificación
    public function desactivar(Usuario $usuario)
    {
        Gate::authorize('deactivate-user', $usuario);
        
        $usuario->update(['estado' => 'inactivo']);
        
        Log::warning("Usuario desactivado - ID: {$usuario->id}");
        
        return back()->with('warning', 'Usuario desactivado temporalmente');
    }

    // Eliminación segura con verificación
    public function eliminar(Usuario $usuario)
    {
        Gate::authorize('delete-user', $usuario);
        
        if ($usuario->es_admin && Usuario::where('es_admin', true)->count() === 1) {
            abort(403, 'No se puede eliminar el último administrador');
        }
        
        $usuario->delete();
        
        Log::critical("Usuario eliminado - ID: {$usuario->id}");
        
        return redirect()->route('admin.index')
                         ->with('danger', 'Usuario eliminado permanentemente');
    }
}
