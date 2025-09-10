@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-cover bg-center p-6 rounded-lg" 
     style="background-image: url('{{ asset('image/deskl.png') }}');">

    <h1 class="text-2xl font-bold mb-6 text-white drop-shadow-lg">Dashboard</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-white/80 backdrop-blur p-6 rounded shadow text-center rounded-lg">
            <h2 class="text-lg font-semibold">Estudiantes</h2>
            <p class="text-2xl font-bold">{{ $totalEstudiantes }}</p>
        </div>
        <div class="bg-white/80 backdrop-blur p-6 rounded shadow text-center rounded-lg">
            <h2 class="text-lg font-semibold">Informes</h2>
            <p class="text-2xl font-bold">{{ $totalInformes }}</p>
        </div>
    </div>
</div>
@endsection
