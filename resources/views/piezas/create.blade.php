@extends('layouts.bootstrap')

@section('title', 'Crear Pieza')

@section('content')
    <h1 class="mb-4">Crear Pieza</h1>
    <a href="{{ route('piezas.index') }}" class="btn btn-secondary mb-3">← Volver a la lista</a>


    <form action="{{ route('piezas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>

        <div class="mb-3">
            <label for="yacimiento_id" class="form-label">Yacimiento</label>
            <select class="form-control" id="yacimiento_id" name="yacimiento_id" required>
                <option value="">Seleccione un Yacimiento</option>
                @foreach ($yacimientos as $yacimiento)
                    <option value="{{ $yacimiento->id }}">{{ $yacimiento->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
