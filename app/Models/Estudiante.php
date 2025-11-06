<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estudiantes';

    /**
     * Campos que se pueden llenar masivamente
     */
    protected $fillable = [
        'codigo',
        'nombres',
        'pri_ape',
        'seg_ape',
        'dni',
        'email',      // Nuevo campo
        'telefono',   // Nuevo campo
        'carrera'     // Nuevo campo
    ];

    /**
     * Campos que deben ser ocultos en las respuestas JSON
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Casts para los atributos del modelo
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * Reglas de validación para el modelo
     */
    public static function rules()
    {
        return [
            'codigo' => 'required|string|max:20|unique:estudiantes,codigo',
            'nombres' => 'required|string|max:100',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'dni' => 'required|string|max:15|unique:estudiantes,dni',
            'email' => 'nullable|email|max:150|unique:estudiantes,email',    // Nueva regla
            'telefono' => 'nullable|string|max:20',                          // Nueva regla
            'carrera' => 'nullable|string|max:100'                           // Nueva regla
        ];
    }

    /**
     * Mensajes de validación personalizados
     */
    public static function messages()
    {
        return [
            'codigo.required' => 'El código del estudiante es obligatorio',
            'codigo.unique' => 'El código ya está registrado en el sistema',
            'nombres.required' => 'Los nombres son obligatorios',
            'pri_ape.required' => 'El primer apellido es obligatorio',
            'dni.required' => 'El DNI es obligatorio',
            'dni.unique' => 'El DNI ya está registrado en el sistema',
            'email.email' => 'El formato del email no es válido',            // Nuevo mensaje
            'email.unique' => 'El email ya está registrado en el sistema',   // Nuevo mensaje
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres', // Nuevo mensaje
            'carrera.max' => 'La carrera no puede exceder los 100 caracteres'   // Nuevo mensaje
        ];
    }

    /**
     * Scope para búsquedas
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('codigo', 'LIKE', "%{$search}%")
                    ->orWhere('nombres', 'LIKE', "%{$search}%")
                    ->orWhere('pri_ape', 'LIKE', "%{$search}%")
                    ->orWhere('dni', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")      // Nueva búsqueda
                    ->orWhere('telefono', 'LIKE', "%{$search}%")   // Nueva búsqueda
                    ->orWhere('carrera', 'LIKE', "%{$search}%");   // Nueva búsqueda
    }

    /**
     * Scope para estudiantes activos (no eliminados)
     */
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }

    /**
     * Obtener el nombre completo del estudiante
     */
    public function getNombreCompletoAttribute()
    {
        return trim("{$this->nombres} {$this->pri_ape} " . ($this->seg_ape ?? ''));
    }

    /**
     * Obtener información de contacto completa
     */
    public function getContactoCompletoAttribute()
    {
        $contacto = [];
        if ($this->email) {
            $contacto[] = "Email: {$this->email}";
        }
        if ($this->telefono) {
            $contacto[] = "Teléfono: {$this->telefono}";
        }
        if ($this->carrera) {
            $contacto[] = "Carrera: {$this->carrera}";
        }
        
        return implode(' | ', $contacto);
    }

    /**
     * Relación con otros modelos (si los tienes)
     */
    // public function cursos()
    // {
    //     return $this->belongsToMany(Curso::class, 'estudiante_curso')
    //                 ->withPivot('nota', 'estado')
    //                 ->withTimestamps();
    // }
}
