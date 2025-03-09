<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Arqueólogos</title>
</head>
<body>
    <h1>Lista de Arqueólogos</h1>

    <!-- Lista de arqueólogos -->
    <ul>
        @foreach ($arqueologos as $arqueologo)
            <li>{{ $arqueologo->nombre }} </li>
        @endforeach
    </ul>
</body>
</html>
