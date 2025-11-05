<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Elimina esta línea:
    // use AuthenticatesUsers;
    
    // Método para mostrar formulario de login
    public function showLoginForm()
    {
        return view('usuarios.login');
    }
    
   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Cambia '/admin' por '/usuarios/juego'
        return redirect()->intended('/usuarios/juego');
    }

    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas no son válidas.',
    ])->onlyInput('email');
}

}
