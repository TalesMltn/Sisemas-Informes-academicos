@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center p-6"
     style="background-image: url('{{ asset('image/cieditar.png') }}');">

    {{-- Capa translúcida --}}
    <div class="w-full min-h-screen bg-black/50 flex items-center justify-center backdrop-blur-sm">

        {{-- Contenedor principal --}}
        <div class="bg-white/10 backdrop-blur-md p-10 rounded-3xl shadow-2xl w-full max-w-lg border border-white/30 text-white">

            {{-- Encabezado con logo --}}
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('image/logoc.png') }}" alt="Logo Universidad Continental" class="w-16 h-16 mb-4 drop-shadow-lg">
                <h1 class="text-4xl font-bold text-center tracking-tight text-white">
                    Editar Estudiante
                </h1>
                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-3"></div>
            </div>

            {{-- Errores de validación --}}
            @if($errors->any())
                <div class="bg-red-500/40 text-white p-3 rounded-lg mb-6 border border-red-300/50">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST" class="space-y-6 text-lg">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block mb-1 font-semibold text-white">Nombre</label>
                    <input type="text" name="nombre" 
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-md text-white placeholder-gray-200 focus:ring-2 focus:ring-yellow-300 focus:outline-none"
                           value="{{ old('nombre', $estudiante->nombre) }}" required>
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-white">Email</label>
                    <input type="email" name="email" 
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-md text-white placeholder-gray-200 focus:ring-2 focus:ring-yellow-300 focus:outline-none"
                           value="{{ old('email', $estudiante->email) }}" required>
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-white">Teléfono</label>
                    <input type="text" name="telefono" 
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-md text-white placeholder-gray-200 focus:ring-2 focus:ring-yellow-300 focus:outline-none"
                           value="{{ old('telefono', $estudiante->telefono) }}">
                </div>

                {{-- Botones --}}
                <div class="mt-10 flex flex-col sm:flex-row justify-between gap-4">
                    <button type="submit" 
                            class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                        Actualizar
                    </button>
                    <a href="{{ route('estudiantes.index') }}" 
                       class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
