<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Yacimientos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Yacimientos</h1>

        <a href="{{ route('yacimientos.create') }}" class="btn btn-success mb-3">Crear Nuevo Yacimiento</a>

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
                            <a href="{{ route('yacimientos.edit', $yacimiento) }}" class="btn btn-primary btn-sm">Editar</a>

                            <form action="{{ route('yacimientos.destroy', $yacimiento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
