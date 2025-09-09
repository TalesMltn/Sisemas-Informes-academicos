@extends('layouts.guest')

@section('content')
<h2 class="text-2xl font-bold mb-4 text-center">Registro</h2>

@if ($errors->any())
    <div class="bg-red-200 p-2 rounded mb-4">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-4">
        <label for="name" class="block mb-1">Nombre:</label>
        <input type="text" name="name" id="name" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block mb-1">Correo:</label>
        <input type="email" name="email" id="email" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block mb-1">Contraseña:</label>
        <input type="password" name="password" id="password" class="w-full border p-2 rounded" required>
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="block mb-1">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border p-2 rounded" required>
    </div>
    <button type="submit" class="w-full bg-green-500 text-white p-2 rounded">Registrarse</button>
</form>
<p class="text-center mt-4">
    ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-500">Inicia sesión</a>
</p>
@endsection
