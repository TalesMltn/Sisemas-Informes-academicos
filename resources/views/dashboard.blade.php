@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-lg font-semibold">Estudiantes</h2>
        <p class="text-2xl">{{ $totalEstudiantes }}</p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center">
        <h2 class="text-lg font-semibold">Informes</h2>
        <p class="text-2xl">{{ $totalInformes }}</p>
    </div>
</div>
@endsection
