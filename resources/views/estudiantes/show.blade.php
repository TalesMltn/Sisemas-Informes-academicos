@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center p-6"
     style="background-image: url('{{ asset('image/civer.png') }}');">

    {{-- Capa translúcida --}}
    <div class="w-full min-h-screen bg-black/50 flex items-center justify-center backdrop-blur-sm">

        {{-- Contenedor principal --}}
        <div class="bg-white/10 backdrop-blur-md p-10 rounded-3xl shadow-2xl w-full max-w-lg border border-white/30 text-white">

            {{-- Encabezado con logo --}}
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('image/logoc.png') }}" alt="Logo Universidad Continental" class="w-16 h-16 mb-4 drop-shadow-lg">
                <h1 class="text-4xl font-bold text-center tracking-tight text-white">
                    Detalle del Estudiante
                </h1>
                <div class="w-24 h-1 bg-green-400 rounded-full mt-3"></div>
            </div>

            {{-- Información del estudiante --}}
            <div class="space-y-5 text-lg bg-white/10 p-6 rounded-2xl border border-white/20 shadow-inner">
                <p><strong>ID:</strong> {{ $estudiante->id }}</p>
                <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
                <p><strong>Email:</strong> {{ $estudiante->email }}</p>
                <p><strong>Teléfono:</strong> {{ $estudiante->telefono }}</p>
            </div>

            {{-- Botones --}}
            <div class="mt-10 flex flex-col sm:flex-row justify-between gap-4">
                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" 
                   class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                    Editar
                </a>
                <a href="{{ route('estudiantes.index') }}" 
                   class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                    Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
