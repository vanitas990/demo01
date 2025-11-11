<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Usuario;

class UsuarioReportePdfController extends Controller
{
    public function index(Request $request)  // Cambia __invoke por index
    {
        // Obtener todos los usuarios
        $usuarios = Usuario::all();
        
        // Preparar los datos para la vista
        $data = [
            'usuarios' => $usuarios,
            'fecha' => now()->format('d/m/Y'),
            'titulo' => 'Reporte de Usuarios'
        ];

        // Cargar la vista con los datos
        $pdf = Pdf::loadView('usuarios.pdf.index', $data);
        
        // Descargar el PDF con nombre personalizado
        return $pdf->download('reporte-usuarios-' . now()->format('Y-m-d') . '.pdf');
    }
}
