<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('usuarios.registro');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'genero' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $validatedData['nombre'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'genero' => $validatedData['genero'],
        ]);

        // Redirigir a la página de login con un mensaje de éxito
        return redirect()->route('login')->with('success', 'Cuenta creada correctamente');
    }
}
