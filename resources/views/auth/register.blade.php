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

            <h2 class="text-2xl font-bold text-center text-white mb-6">Registro</h2>

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="mb-4 text-red-400 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-white mb-1">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-transparent text-white placeholder-white focus:ring focus:ring-blue-300 focus:outline-none"
                           placeholder="Tu nombre completo">
                </div>

                <div>
                    <label for="email" class="block text-white mb-1">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-transparent text-white placeholder-white focus:ring focus:ring-blue-300 focus:outline-none"
                           placeholder="tucorreo@ejemplo.com">
                </div>

                <div class="relative">
                    <label for="password" class="block text-white mb-1">Contraseña</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-transparent text-white placeholder-white focus:ring focus:ring-blue-300 focus:outline-none"
                           placeholder="********">
                </div>

                <div class="relative">
                    <label for="password_confirmation" class="block text-white mb-1">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-transparent text-white placeholder-white focus:ring focus:ring-blue-300 focus:outline-none"
                           placeholder="********">
                </div>

                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                    Registrarse
                </button>
            </form>

            <!-- Enlace a login -->
            <p class="text-center mt-4 text-white text-sm">
                ¿Ya tienes cuenta? 
                <a href="{{ route('login') }}" class="text-blue-300 hover:underline">Inicia sesión</a>
            </p>
        </div>
    </div>
</div>
@endsection
