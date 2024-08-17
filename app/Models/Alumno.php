<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'Alumnos';
    protected $fillable = ['nombre', 'apellido', 'ci', 'edad', 'estadoInscripcion', 'diciplina_id'];

    public function docmaterias()
    {
        return $this->hasMany(Docmateria::class);
    }

    public function diciplinas()
    {
        return $this->belongsTo(Disiplina::class);
    }

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class);
    }
}
