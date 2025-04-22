<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Arqueólogos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container py-4">
        <h1 class="mb-4">Lista de Arqueólogos</h1>

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
    </div>

</body>
</html>
