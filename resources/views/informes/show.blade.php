@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center p-6"
     style="background-image: url('{{ asset('image/ciiii4nformes.png') }}');">

    {{-- Capa translúcida --}}
    <div class="w-full min-h-screen bg-black/50 flex items-center justify-center backdrop-blur-sm">

        {{-- Contenedor principal --}}
        <div class="bg-white/10 backdrop-blur-md p-10 rounded-3xl shadow-2xl w-full max-w-lg border border-white/30 text-white">

            {{-- Encabezado con logo --}}
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('image/logoc.png') }}" alt="Logo Universidad Continental" class="w-16 h-16 mb-4 drop-shadow-lg">
                <h1 class="text-4xl font-bold text-center tracking-tight text-white">
                    Detalle del Informe
                </h1>
                <div class="w-24 h-1 bg-green-400 rounded-full mt-3"></div>
            </div>

            {{-- Datos del informe --}}
            <div class="space-y-3 text-lg text-gray-100">
                <p><strong class="text-white">ID:</strong> {{ $informe->id }}</p>
                <p><strong class="text-white">Título:</strong> {{ $informe->titulo }}</p>
                <p><strong class="text-white">Descripción:</strong> {{ $informe->descripcion }}</p>
                <p><strong class="text-white">Fecha:</strong> {{ $informe->fecha }}</p>
            </div>

            {{-- Botones --}}
            <div class="mt-10 flex flex-col sm:flex-row justify-between gap-4">
                <a href="{{ route('informes.edit', $informe->id) }}" 
                   class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                    Editar
                </a>
                <a href="{{ route('informes.index') }}" 
                   class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                    Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
