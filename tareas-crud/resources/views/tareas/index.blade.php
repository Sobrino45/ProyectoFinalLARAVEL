@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">📋 Lista de Tareas</h1>
        <a href="{{ route('tareas.create') }}" class="btn btn-success">
            ➕ Nueva Tarea
        </a>
    </div>

    {{-- Filtro de estado --}}
    <form method="GET" action="{{ route('tareas.index') }}" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="estado" class="form-label mb-0">Filtrar por estado:</label>
            </div>
            <div class="col-auto">
                <select name="estado" id="estado" onchange="this.form.submit()" class="form-select">
                    <option value="">Todas</option>
                    <option value="1" {{ request('estado') === '1' ? 'selected' : '' }}>Completadas</option>
                    <option value="0" {{ request('estado') === '0' ? 'selected' : '' }}>Pendientes</option>
                </select>
            </div>
        </div>
    </form>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabla de tareas --}}
    @if($tareas->count())
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->titulo }}</td>
                        <td>
                            @if($tarea->estado)
                                <span class="badge bg-success">Completada</span>
                            @else
                                <span class="badge bg-warning text-dark">Pendiente</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-outline-primary btn-sm">Ver</a>
                            <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-outline-warning btn-sm">Editar</a>
                            <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Seguro que quieres borrar esta tarea?')" 
                                        class="btn btn-outline-danger btn-sm">Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-secondary">No hay tareas registradas.</div>
    @endif

</div>
@endsection
