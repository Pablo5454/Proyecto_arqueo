@extends('layouts.bootstrap')

@section('title', 'Editar Yacimiento')

@section('content')
    <h1 class="mb-4">Editar Yacimiento</h1>
    <a href="{{ route('yacimientos.index') }}" class="btn btn-secondary mb-3">← Volver a la lista</a>


    <form action="{{ route('yacimientos.update', $yacimiento) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $yacimiento->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $yacimiento->ubicacion }}" required>
        </div>

        <div class="mb-3">
            <label for="poblacion" class="form-label">Población</label>
            <input type="text" class="form-control" id="poblacion" name="poblacion" value="{{ $yacimiento->poblacion }}" required>
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais" value="{{ $yacimiento->pais }}">
        </div>

        <div class="mb-3">
            <label for="anio_descubrimiento" class="form-label">Año de descubrimiento</label>
            <select class="form-control" id="anio_descubrimiento" name="anio_descubrimiento" required>
                <option value="">Seleccione un año</option>
                @for ($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}" @if($year == $yacimiento->anio_descubrimiento) selected @endif>{{ $year }}</option>
                @endfor
            </select>
        </div>  
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
