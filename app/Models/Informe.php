<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Un informe pertenece a un estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
