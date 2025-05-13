<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ArqueologíaApp')</title>
    
    <!-- Tailwind CSS para el navbar -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap para el resto del contenido -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <style>
        body {
            padding-top: 20px;
        }
        /* Para evitar conflictos entre Tailwind y Bootstrap */
        .container {
            width: 100%;
            padding-right: var(--bs-gutter-x, 0.75rem);
            padding-left: var(--bs-gutter-x, 0.75rem);
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <!-- Incluir el Navbar aquí -->
    @include('layouts.navigation')
    
    <div class="container py-4">
        @yield('content')
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>