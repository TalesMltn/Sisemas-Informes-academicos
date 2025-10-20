<?php

namespace App\Observers;

use App\Models\Estudiante;
use Illuminate\Support\Facades\File;

class EstudianteObserver
{
    /**
     * Se ejecuta después de crear un registro nuevo.
     */
    public function created(Estudiante $estudiante)
    {
        $query = sprintf(
            "INSERT INTO estudiantes (nombre, correo, telefono, created_at, updated_at) VALUES ('%s', '%s', '%s', '%s', '%s');\n",
            addslashes($estudiante->nombre),
            addslashes($estudiante->correo),
            addslashes($estudiante->telefono),
            $estudiante->created_at,
            $estudiante->updated_at
        );

        File::append(database_path('queries/insert_data.sql'), $query);
    }
}
