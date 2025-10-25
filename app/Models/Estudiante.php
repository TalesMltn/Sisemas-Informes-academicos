<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

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
