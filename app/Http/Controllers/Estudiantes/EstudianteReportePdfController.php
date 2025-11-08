<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Estudiante;

class EstudianteReportePdfController extends Controller
{
    public function index(Request $request)  // Cambia __invoke por index
    {
        // Obtener todos los estudiantes
        $estudiantes = Estudiante::all();
        
        // Preparar los datos para la vista
        $data = [
            'estudiantes' => $estudiantes,
            'fecha' => now()->format('d/m/Y'),
            'titulo' => 'Reporte de Estudiantes'
        ];

        // Cargar la vista con los datos
        $pdf = Pdf::loadView('estudiantes.pdf.index', $data);
        
        // Descargar el PDF con nombre personalizado
        return $pdf->download('reporte-estudiantes-' . now()->format('Y-m-d') . '.pdf');
    }
}
