<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    // Nombre de la tabla (Laravel lo infiere, pero lo ponemos explícito por claridad)
    protected $table = 'estudiantes';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
    ];

    // Un estudiante puede tener muchos informes
    public function informes()
    {
        return $this->hasMany(Informe::class);
    }
}
