<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Yacimientos</title>
</head>
<body>
    <h1>Lista de Yacimientos</h1>

    <!-- Lista de yacimientos -->
    <ul>
        @foreach ($yacimientos as $yacimiento)
            <li>{{ $yacimiento->nombre }} </li>
        @endforeach
    </ul>
</body>
</html>
