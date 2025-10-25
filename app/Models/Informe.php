<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante; //  Importación necesaria

class Informe extends Model
{
    use HasFactory;

    protected $table = 'informes';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha',
        'estudiante_id',
    ];

    //  Relación: un informe pertenece a un estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    // ===========================================
    //  MÉTODOS CON PROCEDIMIENTOS ALMACENADOS
    // ===========================================

    /**
     * Listar todos los informes
     */
    public static function listarTodos()
    {
        return DB::select('CALL sp_listar_informes()');
    }

    /**
     * Listar informes por estudiante
     */
    public static function listarPorEstudiante($idEstudiante)
    {
        return DB::select('CALL sp_listar_informes_por_estudiante(?)', [$idEstudiante]);
    }

    /**
     * Insertar un nuevo informe
     */
    public static function insertar($titulo, $descripcion, $fecha, $idEstudiante)
    {
        DB::statement('CALL sp_insertar_informe(?, ?, ?, ?)', [
            $titulo,
            $descripcion,
            $fecha,
            $idEstudiante
        ]);
    }

    /**
     * Actualizar un informe existente
     */
    public static function actualizar($id, $titulo, $descripcion, $fecha, $idEstudiante)
    {
        DB::statement('CALL sp_actualizar_informe(?, ?, ?, ?, ?)', [
            $id,
            $titulo,
            $descripcion,
            $fecha,
            $idEstudiante
        ]);
    }

    /**
     * Eliminar un informe por su ID
     */
    public static function eliminar($id)
    {
        DB::statement('CALL sp_eliminar_informe(?)', [$id]);
    }
}
