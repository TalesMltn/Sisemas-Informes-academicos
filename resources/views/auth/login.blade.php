@extends('layouts.guest')

@section('content')
<div class="min-h-screen relative flex flex-col">

    <!-- Contenedor centrado -->
    <div class="flex-grow flex items-center justify-center z-10 px-4">
        <div class="w-full max-w-md p-10 rounded-3xl shadow-lg bg-cover bg-center"
             style="background-image: url('{{ asset('image/gfcs3.JPG') }}');">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('image/ucci.png') }}" alt="Logo" class="h-16 w-auto">
            </div>

            <h2 class="text-2xl font-bold text-center text-white mb-6">Iniciar Sesión</h2>

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="mb-4 text-red-400 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-white mb-1">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-transparent text-white placeholder-white focus:ring focus:ring-blue-300 focus:outline-none">
                </div>

                <div class="relative">
                    <label for="password" class="block text-white mb-1">Contraseña</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-transparent text-white placeholder-white focus:ring focus:ring-blue-300 focus:outline-none" 
                           placeholder="********">
                    
                    <!-- Botón ojo -->
                    <button type="button" id="togglePassword" class="absolute right-3 top-9 text-white">👁</button>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Ingresar
                </button>
            </form>
        </div>
    </div>

    <!-- Footer siempre al final -->
    <footer class="text-center text-white text-sm py-4 z-10">
        © 2025 Sistema de Informes Académicos - Todos los derechos reservados.
    </footer>
</div>

<!-- Script mostrar/ocultar contraseña -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
    });
</script>
@endsection
