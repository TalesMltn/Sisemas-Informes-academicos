@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Detalle del Estudiante</h1>

<div class="bg-white p-6 rounded shadow max-w-md">
    <p><strong>ID:</strong> {{ $estudiante->id }}</p>
    <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
    <p><strong>Email:</strong> {{ $estudiante->email }}</p>
    <p><strong>Teléfono:</strong> {{ $estudiante->telefono }}</p>
</div>

<div class="mt-4">
    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
    <a href="{{ route('estudiantes.index') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
</div>
@endsection
