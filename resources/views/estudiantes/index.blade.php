@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Estudiantes</h1>

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('estudiantes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Crear Nuevo Estudiante</a>

<table class="min-w-full bg-white rounded shadow">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Teléfono</th>
            <th class="px-4 py-2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estudiantes as $estudiante)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $estudiante->id }}</td>
            <td class="px-4 py-2">{{ $estudiante->nombre }}</td>
            <td class="px-4 py-2">{{ $estudiante->email }}</td>
            <td class="px-4 py-2">{{ $estudiante->telefono }}</td>
            <td class="px-4 py-2">
                <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="text-blue-500 mr-2">Ver</a>
                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="text-yellow-500 mr-2">Editar</a>
                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500" onclick="return confirm('¿Eliminar estudiante?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
