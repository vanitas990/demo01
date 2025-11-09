<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EstudiantesInertiaController extends Controller
{
    public function index(Request $request)
    {
        $estudiantes = Estudiante::orderBy('id', 'DESC')->get();

        return Inertia::render('Estudiante/index', [
            'estudiantes' => $estudiantes
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Estudiante/create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:20|unique:estudiantes,codigo',
            'nombres' => 'required|string|max:100',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'dni' => 'required|string|max:15|unique:estudiantes,dni',
            'email' => 'nullable|email|max:150|unique:estudiantes,email',
            'telefono' => 'nullable|string|max:20',
            'carrera' => 'nullable|string|max:100'
        ]);

        try {
            $estudiante = Estudiante::create($validatedData);
            
            return redirect()->route('estudiantes.index')
                            ->with('success', 'Estudiante creado exitosamente');
                            
        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('error', 'Error al crear el estudiante: ' . $e->getMessage())
                            ->withInput();
        }
    }

 

    // Método para editar un estudiante
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        
        return Inertia::render('Estudiante/edit', [
            'estudiante' => $estudiante
        ]);
    }

    // Método para actualizar un estudiante
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $validatedData = $request->validate([
            'codigo' => 'required|string|max:20|unique:estudiantes,codigo,' . $id,
            'nombres' => 'required|string|max:100',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'dni' => 'required|string|max:15|unique:estudiantes,dni,' . $id,
            'email' => 'nullable|email|max:150|unique:estudiantes,email,' . $id,
            'telefono' => 'nullable|string|max:20',
            'carrera' => 'nullable|string|max:100'
        ]);

        try {
            $estudiante->update($validatedData);
            
            return redirect()->route('estudiantes.index')
                            ->with('success', 'Estudiante actualizado exitosamente');
                            
        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('error', 'Error al actualizar el estudiante: ' . $e->getMessage())
                            ->withInput();
        }
    }
    // En App\Http\Controllers\Estudiantes\EstudiantesInertiaController
public function destroy($id)
{
    try {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        
        return redirect()->route('estudiantes.index')
                        ->with('success', 'Estudiante eliminado exitosamente');
                        
    } catch (\Exception $e) {
        return redirect()->back()
                        ->with('error', 'Error al eliminar el estudiante: ' . $e->getMessage());
    }
}


    // Agrega este método en EstudiantesInertiaController
public function delete($id)
{
    $estudiante = Estudiante::findOrFail($id);
    
    return Inertia::render('Estudiante/delete', [
        'estudiante' => $estudiante
    ]);
}

}
