@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center" 
     style="background-image: url('{{ asset('image/rreportes.jpg') }}');">

    {{-- Capa translúcida para mejorar contraste --}}
    <div class="flex min-h-screen bg-gray-100/85">

    {{-- Sidebar --}}
    <aside class="w-64 bg-blue-900 text-white flex flex-col">
        <div class="p-6 border-b border-blue-700 flex items-center gap-3">
            <img src="{{ asset('image/logoc.png') }}" alt="Logo Universidad Continental" class="w-9 h-8">
            <h1 class="text-lg font-semibold">Reporte y Estadísticas</h1>
        </div>

        <nav class="flex-1 p-6 space-y-4">
            <a href="#" class="flex items-center gap-2 text-blue-100 hover:text-white">
                <i class="fas fa-upload"></i> Carga de datos
            </a>
            <a href="#" class="flex items-center gap-2 text-gray-400 cursor-not-allowed pointer-events-none">
                <i class="fas fa-clock"></i> Historial
            </a>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-10">
        <div class="bg-white rounded-xl shadow p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Desempeño de Estudiantes</h2>

            <div class="border border-gray-200 rounded-xl p-6 mb-6">
                {{-- Subida de archivo --}}
                {{-- <form action="{{ route('subir.excel') }}" method="POST" enctype="multipart/form-data" class="space-y-4"> --}}
                <form
                    @csrf

                    <div class="w-full">
                        <input type="file" name="archivo_excel" accept=".xlsx,.xls"
                            class="block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200">

                        <div class="flex flex-col sm:flex-row justify-center gap-3 mt-4 w-full">
                            <!-- Botón subir -->
                            <button type="submit"
                                class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-md border w-full sm:w-1/2">
                                <i class="fas fa-cloud-upload-alt text-blue-600"></i>
                                Subir archivo Excel
                            </button>

                            <!-- Botón ver columnas -->
                            <button type="button" id="btnColumnas"
                                class="flex items-center justify-center gap-2 bg-blue-100 hover:bg-blue-200 px-4 py-2 rounded-md border border-blue-400 text-blue-700 w-full sm:w-1/2">
                                <i class="fas fa-table"></i>
                                Ver columnas esperadas
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Mensajes del controlador -->
                @if (session('success'))
                    <div class="mt-3 p-3 bg-green-100 text-green-800 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mt-3 p-3 bg-red-100 text-red-800 rounded-md">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Barra de progreso --}}
                <div class="mt-8 mb-4">
                    <div class="w-full bg-gray-200 rounded-full h-3 mb-2">
                        <div class="bg-green-500 h-3 rounded-full" style="width: 65%;"></div>
                    </div>
                    <p class="text-center text-xl font-semibold text-gray-700">65%</p>
                </div>

                {{-- Registros --}}
                <div class="flex items-center justify-center gap-6 mb-2">
                    <div class="flex items-center gap-2 text-green-600 font-semibold">
                        <i class="fas fa-check-circle"></i>
                        1,200 Registros válidos
                    </div>
                    <div class="flex items-center gap-2 text-red-600 font-semibold">
                        <i class="fas fa-times-circle"></i>
                        300 Registros inválidos
                    </div>
                </div>

                <p class="text-center text-gray-700">
                    Estado: <span class="font-bold text-green-700">Completada</span>
                </p>
            </div>
        </div>
    </main>
</div>

<!-- Modal estilo Excel -->
<div id="modalColumnas"
    class="hidden fixed inset-0 bg-gray-900/60 flex items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl p-6 w-11/12 sm:w-3/4 border-t-4 border-green-600" id="modalContenido">
        <h3 class="text-2xl font-semibold mb-5 text-green-700 flex items-center gap-3">
            <i class="fas fa-file-excel text-green-600 text-2xl"></i>
            Formato de columnas (Archivo Excel)
        </h3>

        <!-- Tabla de columnas esperadas -->
        <div class="overflow-x-auto rounded-xl border border-green-300 shadow-inner">
            <table class="min-w-full text-sm border-collapse">
                <thead class="bg-green-100">
                    <tr>
                        <th class="px-4 py-2 text-left font-semibold text-green-800 border-b border-green-300">Columna</th>
                        <th class="px-4 py-2 text-left font-semibold text-green-800 border-b border-green-300">Tipo de dato</th>
                        <th class="px-4 py-2 text-left font-semibold text-green-800 border-b border-green-300">Ejemplo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 border-b border-green-200 text-gray-800">DNI</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">Texto</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">"70854213"</td>
                    </tr>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 border-b border-green-200 text-gray-800">Nombre</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">Texto</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">"Juan"</td>
                    </tr>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 border-b border-green-200 text-gray-800">Apellidos</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">Texto</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">"Pérez García"</td>
                    </tr>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 border-b border-green-200 text-gray-800">Nota C1</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">Texto</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">"15"</td>
                    </tr>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 border-b border-green-200 text-gray-800">Nota Parcial</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">Texto</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">"14"</td>
                    </tr>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 border-b border-green-200 text-gray-800">Nota C2</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">Texto</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">"16"</td>
                    </tr>
                    <tr class="hover:bg-green-50 transition">
                        <td class="px-4 py-2 border-b border-green-200 text-gray-800">Nota Final</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">Texto</td>
                        <td class="px-4 py-2 border-b border-green-200 text-gray-700">"15"</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Advertencia -->
        <div class="mt-4 flex items-center gap-3 bg-yellow-50 border-l-4 border-yellow-400 p-3 rounded-md">
            <i class="fas fa-exclamation-triangle text-yellow-500"></i>
            <p class="text-sm text-yellow-700">
                <strong>Todas las columnas son obligatorias.</strong> Si falta alguna columna, el archivo Excel no será procesado.
            </p>
        </div>

        <!-- Ejemplo visual tipo Excel -->
        <div class="mt-6 border border-green-300 rounded-lg overflow-x-auto">
            <table class="min-w-full text-xs">
                <thead class="bg-green-200 text-green-800 font-semibold">
                    <tr>
                        <th class="px-3 py-2 border border-green-300">DNI</th>
                        <th class="px-3 py-2 border border-green-300">Nombre</th>
                        <th class="px-3 py-2 border border-green-300">Apellidos</th>
                        <th class="px-3 py-2 border border-green-300">Nota C1</th>
                        <th class="px-3 py-2 border border-green-300">Nota Parcial</th>
                        <th class="px-3 py-2 border border-green-300">Nota C2</th>
                        <th class="px-3 py-2 border border-green-300">Nota Final</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-green-50 hover:bg-green-100 transition">
                        <td class="px-3 py-2 border border-green-200 text-gray-700">70854213</td>
                        <td class="px-3 py-2 border border-green-200 text-gray-700">Juan</td>
                        <td class="px-3 py-2 border border-green-200 text-gray-700">Pérez García</td>
                        <td class="px-3 py-2 border border-green-200 text-gray-700">15</td>
                        <td class="px-3 py-2 border border-green-200 text-gray-700">14</td>
                        <td class="px-3 py-2 border border-green-200 text-gray-700">16</td>
                        <td class="px-3 py-2 border border-green-200 text-gray-700">15</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="mt-4 text-sm text-gray-600 flex items-center gap-2">
            <i class="fas fa-info-circle text-green-500"></i>
            Todos los valores deben estar en formato <strong>Texto</strong> dentro del archivo Excel (.xlsx o .xls).
        </p>

        <!-- Botón cerrar -->
        <div class="mt-6 flex justify-end">
            <button id="cerrarModal"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg shadow transition">
                <i class="fas fa-times-circle mr-2"></i> Cerrar
            </button>
        </div>
    </div>
</div>

<!-- Script: cerrar al hacer clic fuera -->
<script>
    const modal = document.getElementById('modalColumnas');
    const modalContenido = document.getElementById('modalContenido');
    const btnCerrar = document.getElementById('cerrarModal');
    const btnAbrir = document.getElementById('btnColumnas');

    btnAbrir.addEventListener('click', () => modal.classList.remove('hidden'));
    btnCerrar.addEventListener('click', () => modal.classList.add('hidden'));
    modal.addEventListener('click', e => {
        if (!modalContenido.contains(e.target)) modal.classList.add('hidden');
    });
</script>

@endsection
