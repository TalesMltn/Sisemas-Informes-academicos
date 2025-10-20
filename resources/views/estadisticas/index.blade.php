@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center" 
     style="background-image: url('{{ asset('image/estadisticass.png') }}');">

    {{-- Capa translúcida para mejorar contraste --}}
    <div class="min-h-screen bg-gray-100/85 p-6 flex items-start justify-center">

        <div class="bg-white/95 p-6 rounded-xl shadow-lg w-full max-w-7xl backdrop-blur-sm">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Pantalla de Validación</h1>

    <!-- Botones de filtro -->
    <div class="flex flex-wrap gap-3 mb-6">
      <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Ver solo Estudiantes Graves</button>
      <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">Ver solo Estudiantes Satisfactorios</button>
      <button class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-600 rounded">Descargar reporte de errores</button>
    </div>

    <!-- Contenedor general -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Tabla -->
      <div class="md:col-span-2 bg-white border rounded-lg overflow-hidden shadow">
        <table class="min-w-full border-collapse">
          <thead class="bg-gray-100 border-b">
            <tr>
              <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
              <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nombre</th>
              <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
              <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Fecha de Carga</th>
              <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Estado</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-2">1</td>
              <td class="px-4 py-2">user_123</td>
              <td class="px-4 py-2">juan.perez@example.com</td>
              <td class="px-4 py-2">2023-10-26</td>
              <td class="px-4 py-2 text-green-600 text-lg">✔️</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-2">2</td>
              <td class="px-4 py-2">usen_123</td>
              <td class="px-4 py-2">juan.perez@example.com</td>
              <td class="px-4 py-2">2023-10-26</td>
              <td class="px-4 py-2 text-red-500 text-lg">❌</td>
            </tr>
            <tr class="border-b hover:bg-gray-50 bg-red-50">
              <td class="px-4 py-2">5</td>
              <td class="px-4 py-2">Juan_123</td>
              <td class="px-4 py-2">juan.perez@example.com</td>
              <td class="px-4 py-2">2023-10-26</td>
              <td class="px-4 py-2 text-red-500 text-lg">❌</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
              <td class="px-4 py-2">6</td>
              <td class="px-4 py-2">user_126</td>
              <td class="px-4 py-2">juan.perez@example.com</td>
              <td class="px-4 py-2">2023-10-26</td>
              <td class="px-4 py-2 text-green-600 text-lg">✔️</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Estadísticas -->
      <div class="bg-white border rounded-lg shadow p-4">
        <h2 class="text-lg font-semibold mb-4">Estadísticas</h2>

        <div class="flex flex-col items-center">
          <!-- Gráfico circular -->
          <div class="relative w-32 h-32 mb-4">
            <svg class="w-full h-full" viewBox="0 0 36 36">
              <circle class="text-red-400" stroke-width="3.8" stroke="currentColor" fill="none"
                      cx="18" cy="18" r="15.9155" stroke-dasharray="20,80" />
              <circle class="text-green-500" stroke-width="3.8" stroke="currentColor" fill="none"
                      cx="18" cy="18" r="15.9155" stroke-dasharray="80,20" stroke-dashoffset="20" />
            </svg>
            <div class="absolute inset-0 flex items-center justify-center text-sm font-bold">
              <span>80% <span class="text-green-500">✔</span><br>20% <span class="text-red-500">✖</span></span>
            </div>
          </div>

          <!-- Barras -->
          <div class="w-full mt-2">
            <div class="flex justify-between text-sm font-semibold mb-1">
              <span>Válidos</span><span>80%</span>
            </div>
            <div class="h-2 bg-gray-200 rounded">
              <div class="h-2 bg-green-500 rounded" style="width:80%"></div>
            </div>

            <div class="flex justify-between text-sm font-semibold mb-1 mt-3">
              <span>Inválidos</span><span>20%</span>
            </div>
            <div class="h-2 bg-gray-200 rounded">
              <div class="h-2 bg-red-500 rounded" style="width:20%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
