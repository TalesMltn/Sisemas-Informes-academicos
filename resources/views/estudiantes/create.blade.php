@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center flex items-center justify-center p-6"
     style="background-image: url('{{ asset('image/ciestudiante.png') }}');">

    {{-- Capa translúcida --}}
    <div class="w-full min-h-screen bg-gray-100/85 flex items-center justify-center backdrop-blur-sm">

        <div class="bg-white/95 p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-200">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-900">Crear Estudiante</h1>

            {{-- Errores de validación --}}
            @if($errors->any())
                <div class="bg-red-100 text-red-800 p-3 rounded-lg mb-4 border border-red-300">
                    <ul class="list-disc list-inside text-gray-800">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formulario --}}
            <form action="{{ route('estudiantes.store') }}" method="POST" class="space-y-5 text-gray-800">
                @csrf
                <div>
                    <label class="block mb-1 font-semibold text-gray-900">Nombre</label>
                    <input type="text" name="nombre" 
                           class="w-full border border-gray-300 p-2 rounded-md text-gray-900 focus:ring-2 focus:ring-green-300 focus:outline-none"
                           value="{{ old('nombre') }}" required>
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-900">Email</label>
                    <input type="email" name="email" 
                           class="w-full border border-gray-300 p-2 rounded-md text-gray-900 focus:ring-2 focus:ring-green-300 focus:outline-none"
                           value="{{ old('email') }}" required>
                </div>

                <div>
                    <label class="block mb-1 font-semibold text-gray-900">Teléfono</label>
                    <input type="text" name="telefono" 
                           class="w-full border border-gray-300 p-2 rounded-md text-gray-900 focus:ring-2 focus:ring-green-300 focus:outline-none"
                           value="{{ old('telefono') }}">
                </div>

                {{-- Botones --}}
                <div class="flex justify-between items-center mt-6">
                    <button type="submit" 
                            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                        Guardar
                    </button>
                    <a href="{{ route('estudiantes.index') }}" 
                       class="text-gray-800 hover:text-gray-900 transition font-semibold">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
