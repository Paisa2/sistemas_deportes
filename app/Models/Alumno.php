<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'Alumnos';
    protected $fillable = ['nombre', 'apellido', 'matricula', 'ci', 'edad', 'estadoInscripcion', 'materia_id'];

    public function docmaterias()
    {
        return $this->hasMany(Docmateria::class);
    }
}
