@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Editar Informe</h1>

@if($errors->any())
    <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('informes.update', $informe->id) }}" method="POST" class="bg-white p-6 rounded shadow max-w-md">
    @csrf
    @method('PATCH')
    <div class="mb-4">
        <label class="block mb-1">Título</label>
        <input type="text" name="titulo" class="w-full border p-2 rounded" value="{{ old('titulo', $informe->titulo) }}" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1">Descripción</label>
        <textarea name="descripcion" class="w-full border p-2 rounded" required>{{ old('descripcion', $informe->descripcion) }}</textarea>
    </div>
    <div class="mb-4">
        <label class="block mb-1">Fecha</label>
        <input type="date" name="fecha" class="w-full border p-2 rounded" value="{{ old('fecha', $informe->fecha) }}" required>
    </div>
    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Actualizar</button>
    <a href="{{ route('informes.index') }}" class="ml-2 text-gray-600">Cancelar</a>
</form>
@endsection
