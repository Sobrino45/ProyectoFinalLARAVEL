@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la tarea</h1>

    <div class="card">
        <div class="card-header">
            {{ $tarea->titulo }}
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $tarea->descripcion ?: 'Sin descripción' }}</p>
            <p><strong>Estado:</strong> {{ $tarea->estado ? 'Completada' : 'Pendiente' }}</p>
        </div>
    </div>

    <a href="{{ route('tareas.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
