<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Informes Académicos')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-white shadow p-4">
        <div class="flex justify-between items-center px-8 py-4 w-full">
            <!-- Marca / Título -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="font-bold text-xl">Sistema Informes</a>
                <a href="{{ route('estudiantes.index') }}" class="text-gray-700 hover:text-blue-500">Estudiantes</a>
                <a href="{{ route('informes.index') }}" class="text-gray-700 hover:text-blue-500">Informes</a>
                <a href="{{ route('reportes.index') }}" class="text-gray-700 hover:text-blue-500">Generar desempeño de estudiantes</a>
                <a href="{{ route('estadisticas.index') }}" class="text-gray-700 hover:text-blue-500">Reportes y Estadísticas</a>
            </div>

            <!-- Usuario y Cerrar sesión -->
            <div>
                <span class="mr-4">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:underline">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-6">
        @yield('content')
    </main>
</body>

</html>
