<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class ReporteEstadisticaController extends Controller
{
    /**
     * Mostrar listado de informes.
     */
    public function index()
    {
        // $reportes = Informe::with('estudiante')->get();
        // return view('reportes.index', compact('reportes'));
        return view('estadisticas.index');
    }

    // /**
    //  * Mostrar formulario para crear informe.
    //  */
    // public function create()
    // {
    //     $estudiantes = Estudiante::all();
    //     return view('informes.create', compact('estudiantes'));
    // }

    // /**
    //  * Guardar nuevo informe.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'estudiante_id' => 'required|exists:estudiantes,id',
    //         'titulo'        => 'required|string|max:255',
    //         'descripcion'   => 'required|string',
    //         'fecha'         => 'required|date',
    //     ]);

    //     Informe::create($request->all());

    //     return redirect()->route('informes.index')->with('success', 'Informe creado correctamente.');
    // }

    // /**
    //  * Mostrar detalle de un informe.
    //  */
    // public function show(Informe $informe)
    // {
    //     return view('informes.show', compact('informe'));
    // }

    // /**
    //  * Formulario para editar informe.
    //  */
    // public function edit(Informe $informe)
    // {
    //     $estudiantes = Estudiante::all();
    //     return view('informes.edit', compact('informe', 'estudiantes'));
    // }

    // /**
    //  * Actualizar informe.
    //  */
    // public function update(Request $request, Informe $informe)
    // {
    //     $request->validate([
    //         'estudiante_id' => 'required|exists:estudiantes,id',
    //         'titulo'        => 'required|string|max:255',
    //         'descripcion'   => 'required|string',
    //         'fecha'         => 'required|date',
    //     ]);

    //     $informe->update($request->all());

    //     return redirect()->route('informes.index')->with('success', 'Informe actualizado correctamente.');
    // }

    // /**
    //  * Eliminar informe.
    //  */
    // public function destroy(Informe $informe)
    // {
    //     $informe->delete();

    //     return redirect()->route('informes.index')->with('success', 'Informe eliminado correctamente.');
    // }
}
