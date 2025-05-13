@extends('layouts.bootstrap')
@section('title', 'Lista de Piezas')
@section('content')
    <h1 class="mb-4">Lista de Piezas</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary mb-3">← Volver al menú principal</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('piezas.create') }}" class="btn btn-success mb-3">Crear Nueva Pieza</a>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Yacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($piezas as $pieza)
                <tr>
                    <td>{{ $pieza->nombre }}</td>
                    <td>{{ $pieza->descripcion }}</td>
                    <td>{{ $pieza->yacimiento->nombre ?? 'No asignado' }}</td>
                    <td>
                        @if(auth()->user()->hasRole('gestor'))
                            <a href="{{ route('piezas.edit', $pieza) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('piezas.destroy', $pieza) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta pieza?')">Eliminar</button>
                            </form>
                        @endif
                        {{-- @if(auth()->user()->hasRole('arqueologo'))
                            <a href="{{ route('piezas.show', $pieza) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                        @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection