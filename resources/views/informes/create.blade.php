@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Crear Informe</h1>

@if($errors->any())
    <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('informes.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-md">
    @csrf

    <div class="mb-4">
        <label class="block mb-1">Estudiante</label>
        <select name="estudiante_id" class="w-full border p-2 rounded" required>
            <option value="">-- Seleccione un estudiante --</option>
            @foreach($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}" {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}>
                    {{ $estudiante->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Título</label>
        <input type="text" name="titulo" class="w-full border p-2 rounded" value="{{ old('titulo') }}" required>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Descripción</label>
        <textarea name="descripcion" class="w-full border p-2 rounded" required>{{ old('descripcion') }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Fecha</label>
        <input type="date" name="fecha" class="w-full border p-2 rounded" value="{{ old('fecha') }}" required>
    </div>

    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
    <a href="{{ route('informes.index') }}" class="ml-2 text-gray-600">Cancelar</a>
</form>
@endsection
