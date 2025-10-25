<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Estudiante;

class InformeController extends Controller
{
    // 🟩 Listar todos los informes
    public function index()
    {
        $informes = Informe::with('estudiante')->get();
        return view('informes.index', compact('informes'));
    }

    // 🟩 Mostrar formulario de creación
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('informes.create', compact('estudiantes'));
    }

    // 🟩 Guardar nuevo informe
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'estudiante_id' => 'required|integer|exists:estudiantes,id',
        ]);

        Informe::create($request->all());

        return redirect()->route('informes.index')
                         ->with('success', 'Informe creado correctamente.');
    }

    // 🟩 Mostrar un informe específico
    public function show($id)
    {
        $informe = Informe::with('estudiante')->findOrFail($id);
        return view('informes.show', compact('informe'));
    }

    // 🟩 Mostrar formulario de edición
    public function edit($id)
    {
        $informe = Informe::findOrFail($id);
        $estudiantes = Estudiante::all();
        return view('informes.edit', compact('informe', 'estudiantes'));
    }

    // 🟩 Actualizar un informe
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'estudiante_id' => 'required|integer|exists:estudiantes,id',
        ]);

        $informe = Informe::findOrFail($id);
        $informe->update($request->all());

        return redirect()->route('informes.index')
                         ->with('success', 'Informe actualizado correctamente.');
    }

    // 🟩 Eliminar un informe
    public function destroy($id)
    {
        $informe = Informe::findOrFail($id);
        $informe->delete();

        return redirect()->route('informes.index')
                         ->with('success', 'Informe eliminado correctamente.');
    }
}
