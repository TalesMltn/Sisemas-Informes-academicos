@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Detalle del Informe</h1>

<div class="bg-white p-6 rounded shadow max-w-md">
    <p><strong>ID:</strong> {{ $informe->id }}</p>
    <p><strong>Título:</strong> {{ $informe->titulo }}</p>
    <p><strong>Descripción:</strong> {{ $informe->descripcion }}</p>
    <p><strong>Fecha:</strong> {{ $informe->fecha }}</p>
</div>

<div class="mt-4">
    <a href="{{ route('informes.edit', $informe->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
    <a href="{{ route('informes.index') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
</div>
@endsection
