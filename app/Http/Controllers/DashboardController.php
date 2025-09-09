<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Informe;

class DashboardController extends Controller
{
    public function index()
    {
        // Ejemplo: pasar cantidad de estudiantes e informes al dashboard
        $totalEstudiantes = Estudiante::count();
        $totalInformes = Informe::count();

        return view('dashboard', compact('totalEstudiantes', 'totalInformes'));
    }
}
