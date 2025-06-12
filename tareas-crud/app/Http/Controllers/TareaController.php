<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('created_at', 'desc')->paginate(10);
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'sometimes|boolean',
        ]);

        // El checkbox no envía nada si no está marcado, así que normalizamos:
        $validated['estado'] = $request->has('estado');

        Tarea::create($validated);

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada correctamente');
    }

    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
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
            'estado' => 'sometimes|boolean',
        ]);

        $validated['estado'] = $request->has('estado');

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
