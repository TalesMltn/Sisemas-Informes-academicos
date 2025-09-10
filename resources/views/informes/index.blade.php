@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center p-6 rounded" 
     style="background-image: url('{{ asset('image/inf.png') }}');">

    <div class="bg-white/80 p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-6">Informes</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('informes.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Crear Nuevo Informe
        </a>

        <table class="min-w-full bg-white rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($informes as $informe)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $informe->id }}</td>
                    <td class="px-4 py-2">{{ $informe->titulo }}</td>
                    <td class="px-4 py-2">{{ Str::limit($informe->descripcion, 50) }}</td>
                    <td class="px-4 py-2">{{ $informe->fecha }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('informes.show', $informe->id) }}" class="text-blue-500 mr-2">Ver</a>
                        <a href="{{ route('informes.edit', $informe->id) }}" class="text-yellow-500 mr-2">Editar</a>
                        <form action="{{ route('informes.destroy', $informe->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('¿Eliminar informe?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
