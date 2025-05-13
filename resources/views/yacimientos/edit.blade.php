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
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $yacimiento->nombre) }}">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" id="ubicacion" name="ubicacion" value="{{ old('ubicacion', $yacimiento->ubicacion) }}">
            @error('ubicacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="poblacion" class="form-label">Población</label>
            <input type="text" class="form-control @error('poblacion') is-invalid @enderror" id="poblacion" name="poblacion" value="{{ old('poblacion', $yacimiento->poblacion) }}">
            @error('poblacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais', $yacimiento->pais) }}">
            @error('pais')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="anio_descubrimiento" class="form-label">Año de descubrimiento</label>
            <select class="form-control @error('anio_descubrimiento') is-invalid @enderror" id="anio_descubrimiento" name="anio_descubrimiento">
                <option value="">Seleccione un año</option>
                @for ($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}" {{ old('anio_descubrimiento', $yacimiento->anio_descubrimiento) == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endfor
            </select>
            @error('anio_descubrimiento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>  

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
