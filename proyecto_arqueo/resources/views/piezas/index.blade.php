<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Piezas</title>
</head>
<body>
    <h1>Lista de Piezas</h1>

    <!-- Lista de piezas -->
    <ul>
        @foreach ($piezas as $pieza)
            <li>{{ $pieza->nombre }} </li>
        @endforeach
    </ul>
</body>
</html>
