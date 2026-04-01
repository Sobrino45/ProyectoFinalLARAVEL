<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index(Request $request)
    {
        $query = Tarea::query();

        // Filtro por estado
        if ($request->has('estado') && $request->estado !== '') {
            $query->where('estado', $request->estado);
        }

        $tareas = $query->orderBy('created_at', 'desc')->get(); // He quitado paginate por ahora para que el diseño grid se vea completo
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        // 1. Validamos solo lo que viene del formulario
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // 2. Añadimos el estado manualmente (por defecto pendiente)
        $validated['estado'] = false; 

        // 3. Creamos la tarea
        Tarea::create($validated);

        return redirect()->route('tareas.index')
            ->with('success', '¡Objetivo guardado con éxito!');
    }

    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|boolean', // En editar sí suele venir el estado
        ]);

        $tarea->update($validated);

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea actualizada correctamente');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada correctamente');
    }
}