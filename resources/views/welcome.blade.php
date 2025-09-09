@extends('layouts.guest')

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold mb-4">Sistema de Informes Académicos</h1>
    <p class="mb-6 text-gray-600">Gestiona estudiantes e informes de manera sencilla</p>
    <a href="{{ route('login') }}" class="bg-blue-500 text-white px-6 py-3 rounded">Iniciar Sesión</a>
</div>
@endsection
