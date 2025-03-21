<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Arqueólogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Editar Arqueólogo</h1>

        <form action="{{ route('arqueologos.update', $arqueologo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $arqueologo->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $arqueologo->apellidos }}" required>
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" value="{{ $arqueologo->dni }}" required>
            </div>

            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ $arqueologo->especialidad }}">
            </div>

            <div class="mb-3">
                <label for="yacimiento_id" class="form-label">Yacimiento</label>
                <select class="form-select" id="yacimiento_id" name="yacimiento_id" required>
                    @foreach ($yacimientos as $yacimiento)
                        <option value="{{ $yacimiento->id }}" @if($arqueologo->yacimiento_id == $yacimiento->id) selected @endif>
                            {{ $yacimiento->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
