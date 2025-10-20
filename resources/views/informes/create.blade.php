@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center p-6"
     style="background-image: url('{{ asset('image/ciinformes.png') }}');">

    {{-- Capa translúcida --}}
    <div class="w-full min-h-screen bg-black/50 flex items-center justify-center backdrop-blur-sm">

        {{-- Contenedor principal --}}
        <div class="bg-white/10 backdrop-blur-md p-10 rounded-3xl shadow-2xl w-full max-w-lg border border-white/30 text-white">

            {{-- Encabezado con logo --}}
            <div class="flex flex-col items-center mb-8">
                <img src="{{ asset('image/logoc.png') }}" alt="Logo Universidad Continental" class="w-16 h-16 mb-4 drop-shadow-lg">
                <h1 class="text-4xl font-bold text-center tracking-tight text-white">
                    Crear Informe
                </h1>
                <div class="w-24 h-1 bg-green-400 rounded-full mt-3"></div>
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
            <form action="{{ route('informes.store') }}" method="POST" class="space-y-6 text-lg">
                @csrf

                {{-- Estudiante --}}
                <div>
                    <label class="block mb-1 font-semibold text-white">Estudiante</label>
                    <select name="estudiante_id" 
                            class="w-full bg-white/20 border border-white/30 p-3 rounded-md text-white focus:ring-2 focus:ring-green-300 focus:outline-none">
                        <option value="">-- Seleccione un estudiante --</option>
                        @foreach($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}" {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}>
                                {{ $estudiante->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Título --}}
                <div>
                    <label class="block mb-1 font-semibold text-white">Título</label>
                    <input type="text" name="titulo" 
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-md text-white placeholder-gray-200 focus:ring-2 focus:ring-green-300 focus:outline-none"
                           value="{{ old('titulo') }}" required>
                </div>

                {{-- Descripción --}}
                <div>
                    <label class="block mb-1 font-semibold text-white">Descripción</label>
                    <textarea name="descripcion"
                              class="w-full bg-white/20 border border-white/30 p-3 rounded-md text-white placeholder-gray-200 focus:ring-2 focus:ring-green-300 focus:outline-none"
                              rows="4" required>{{ old('descripcion') }}</textarea>
                </div>

                {{-- Fecha --}}
                <div>
                    <label class="block mb-1 font-semibold text-white">Fecha</label>
                    <input type="date" name="fecha"
                           class="w-full bg-white/20 border border-white/30 p-3 rounded-md text-white focus:ring-2 focus:ring-green-300 focus:outline-none"
                           value="{{ old('fecha') }}" required>
                </div>

                {{-- Botones --}}
                <div class="mt-10 flex flex-col sm:flex-row justify-between gap-4">
                    <button type="submit" 
                            class="flex-1 bg-green-500 hover:bg-green-600 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                        Guardar
                    </button>
                    <a href="{{ route('informes.index') }}" 
                       class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-semibold text-lg px-5 py-3 rounded-lg shadow transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
