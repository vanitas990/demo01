<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'telefono',
        'direccion',
        'genero',
        'estado', // 👈 para saber si el usuario está activo o desactivado
    ];

    protected $hidden = [
        'password',
    ];

    // 👇 Método útil para saber si está activo
    public function estaActivo()
    {
        return $this->estado === 'activo';
    }
}
