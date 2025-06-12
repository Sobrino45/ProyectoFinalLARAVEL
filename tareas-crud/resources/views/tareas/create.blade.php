@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear nueva tarea</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="estado" id="estado" class="form-check-input" {{ old('estado') ? 'checked' : '' }}>
            <label for="estado" class="form-check-label">Completada</label>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
