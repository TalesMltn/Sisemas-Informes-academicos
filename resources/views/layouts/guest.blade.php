<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bienvenido')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen relative flex flex-col">

    <!-- Fondo principal completo -->
    <img src="{{ asset('image/gfcs.png') }}" alt="Fondo principal"
         class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/40"></div> <!-- overlay opcional -->

    <!-- Contenido centrado -->
    <div class="relative z-10 flex-1 flex items-center justify-center px-4">
        @yield('content')
    </div>


</body>
</html>
