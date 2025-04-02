<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Yacimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Crear Yacimiento</h1>

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
                <input type="text" class="form-control" id="anio_descubrimiento" name="anio_descubrimiento">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>
