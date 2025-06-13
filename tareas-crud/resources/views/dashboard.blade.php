@extends('layouts.app')

@section('content')
    <div class="card bg-dark border-light text-white">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Dashboard</h3>
        </div>
        <div class="card-body">
            <p class="mb-3">Bienvenido, <strong>{{ Auth::user()->name }}</strong>. ¡Estás autenticado!</p>

            <a href="{{ route('tareas.index') }}" class="btn btn-outline-light">
                <i class="bi bi-list-task"></i> Ir a la lista de tareas
            </a>
        </div>
    </div>
@endsection
