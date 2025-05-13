@extends('layouts.bootstrap')

@section('title', 'Crear Arqueólogo')

@section('content')
        <h1 class="mb-4">Crear Arqueólogo</h1>
        <a href="{{ route('arqueologos.index') }}" class="btn btn-secondary mb-3">← Volver a la lista</a>



    
    <form action="{{ route('arqueologos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            @error('apellidos')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}">
            @error('dni')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" class="form-control @error('especialidad') is-invalid @enderror" id="especialidad" name="especialidad" value="{{ old('especialidad') }}">
            @error('especialidad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="yacimiento_id" class="form-label">Yacimiento</label>
            <select class="form-select @error('yacimiento_id') is-invalid @enderror" id="yacimiento_id" name="yacimiento_id[]" multiple>
                @foreach ($yacimientos as $yacimiento)
                    <option value="{{ $yacimiento->id }}" {{ (is_array(old('yacimiento_id')) && in_array($yacimiento->id, old('yacimiento_id'))) ? 'selected' : '' }}>
                        {{ $yacimiento->nombre }}
                    </option>
                @endforeach
            </select>
            @error('yacimiento_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection