@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Crear Estudiante</h1>

@if($errors->any())
    <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('estudiantes.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-md">
    @csrf
    <div class="mb-4">
        <label class="block mb-1">Nombre</label>
        <input type="text" name="nombre" class="w-full border p-2 rounded" value="{{ old('nombre') }}" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded" value="{{ old('email') }}" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1">Teléfono</label>
        <input type="text" name="telefono" class="w-full border p-2 rounded" value="{{ old('telefono') }}">
    </div>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
    <a href="{{ route('estudiantes.index') }}" class="ml-2 text-gray-600">Cancelar</a>
</form>
@endsection
