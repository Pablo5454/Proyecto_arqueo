@extends('layouts.bootstrap')

@section('title', 'Crear Pieza')

@section('content')
    <h1 class="mb-4">Crear Pieza</h1>
    <a href="{{ route('piezas.index') }}" class="btn btn-secondary mb-3">← Volver a la lista</a>

<form action="{{ route('piezas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="yacimiento_id" class="form-label">Yacimiento</label>
        <select class="form-control @error('yacimiento_id') is-invalid @enderror" id="yacimiento_id" name="yacimiento_id">
            <option value="">Seleccione un Yacimiento</option>
            @foreach ($yacimientos as $yacimiento)
                <option value="{{ $yacimiento->id }}" {{ old('yacimiento_id') == $yacimiento->id ? 'selected' : '' }}>{{ $yacimiento->nombre }}</option>
            @endforeach
        </select>
        @error('yacimiento_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
