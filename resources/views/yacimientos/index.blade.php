@extends('layouts.bootstrap')
@section('title', 'Lista de Yacimientos')
@section('content')
    <h1 class="mb-4">Lista de Yacimientos</h1>
    
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary mb-3">← Volver al menú principal</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(auth()->user()->hasRole('gestor'))
        <a href="{{ route('yacimientos.create') }}" class="btn btn-success mb-3">Crear Nuevo Yacimiento</a>
    @endif
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Población</th>
                <th>País</th>
                <th>Año de Descubrimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($yacimientos as $yacimiento)
                <tr>
                    <td>{{ $yacimiento->nombre }}</td>
                    <td>{{ $yacimiento->ubicacion }}</td>
                    <td>{{ $yacimiento->poblacion }}</td>
                    <td>{{ $yacimiento->pais }}</td>
                    <td>{{ $yacimiento->anio_descubrimiento }}</td>
                    <td>
                        @if(auth()->user()->hasRole('gestor'))
                            <a href="{{ route('yacimientos.edit', $yacimiento) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('yacimientos.destroy', $yacimiento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este yacimiento?')">Eliminar</button>
                            </form>
                        @endif
                        {{-- @if(auth()->user()->hasRole('arqueologo')) --}}
                            {{-- <a href="{{ route('yacimientos.show', $yacimiento) }}" class="btn btn-info btn-sm">Ver Detalles</a> --}}
                        {{-- @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection