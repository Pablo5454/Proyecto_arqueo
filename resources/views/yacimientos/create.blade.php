@extends('layouts.bootstrap')

@section('title', 'Crear Yacimiento')

@section('content')
    <h1 class="mb-4">Crear Yacimiento</h1>
    <a href="{{ route('yacimientos.index') }}" class="btn btn-secondary mb-3">← Volver a la lista</a>


    <form action="{{ route('yacimientos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
        </div>

        <div class="mb-3">
            <label for="poblacion" class="form-label">Población</label>
            <input type="text" class="form-control" id="poblacion" name="poblacion" required>
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais">
        </div>

        <div class="mb-3">
            <label for="anio_descubrimiento" class="form-label">Año de descubrimiento</label>
            <select class="form-control" id="anio_descubrimiento" name="anio_descubrimiento" required>
                <option value="">Seleccione un año</option>
                @for ($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>  
        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
