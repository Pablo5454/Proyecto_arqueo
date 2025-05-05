@extends('layouts.bootstrap')

@section('title', 'Lista de Arqueólogos')

@section('content')
    <h1 class="mb-4">Lista de Arqueólogos</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary mb-3">← Volver al menú principal</a>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('arqueologos.create') }}" class="btn btn-primary mb-3">Crear Arqueólogo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Yacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arqueologos as $arqueologo)
                <tr>
                    <td>{{ $arqueologo->nombre }}</td>
                    <td>
                        @foreach ($arqueologo->yacimientos as $yacimiento)
                            <span class="badge bg-secondary">{{ $yacimiento->nombre }}</span>
                        @endforeach
                    </td>

                    <td>
                        <a href="{{ route('arqueologos.edit', $arqueologo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('arqueologos.destroy', $arqueologo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este arqueólogo?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
