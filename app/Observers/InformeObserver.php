<?php

namespace App\Observers;

use App\Models\Informe;
use Illuminate\Support\Facades\File;

class InformeObserver
{
    /**
     * Evento que se ejecuta cuando se crea un nuevo informe.
     */
    public function created(Informe $informe): void
    {
        $filePath = database_path('queries/insert_data.sql');

        // Crear la carpeta si no existe
        if (!File::exists(dirname($filePath))) {
            File::makeDirectory(dirname($filePath), 0755, true);
        }

        // Generar la query tipo INSERT
        $query = sprintf(
            "INSERT INTO informes (titulo, descripcion, fecha, estudiante_id, created_at, updated_at) VALUES ('%s', '%s', '%s', %d, NOW(), NOW());\n",
            addslashes($informe->titulo),
            addslashes($informe->descripcion),
            $informe->fecha,
            $informe->estudiante_id
        );

        // Guardar la query en el archivo .sql
        File::append($filePath, $query);
    }
}
