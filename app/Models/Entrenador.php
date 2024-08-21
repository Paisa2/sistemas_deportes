<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;
    protected  $table = 'entrenadores';
    protected $fillable = ['nombre', 'apellido', 'ci', 'sexo', 'image'];

    public function docmaterias()
    {
        return $this->hasMany(Docmateria::class);
    }
}
