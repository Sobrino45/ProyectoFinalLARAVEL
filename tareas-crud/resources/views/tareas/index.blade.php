@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tareas</h1>
    <a href="{{ route('tareas.create') }}" class="btn btn-primary mb-3">Crear nueva tarea</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($tareas->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->estado ? 'Completada' : 'Pendiente' }}</td>
                    <td>
                        <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Seguro que quieres borrar esta tarea?')" class="btn btn-danger btn-sm">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay tareas.</p>
    @endif
</div>
@endsection
