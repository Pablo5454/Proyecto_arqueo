@extends('layouts.bootstrap')

@section('title', 'Crear Arqueólogo')

@section('content')
        <h1 class="mb-4">Crear Arqueólogo</h1>
        <a href="{{ route('arqueologos.index') }}" class="btn btn-secondary mb-3">← Volver a la lista</a>


        <form action="{{ route('arqueologos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>

            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad">
            </div>

            <div class="mb-3">
                <label for="yacimiento_id" class="form-label">Yacimiento</label>
                <select class="form-select" id="yacimiento_id" name="yacimiento_id[]" multiple required>
                    @foreach ($yacimientos as $yacimiento)
                        <option value="{{ $yacimiento->id }}">{{ $yacimiento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
@endsection