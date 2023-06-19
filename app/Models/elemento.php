<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class elemento extends Model
{
    use HasFactory;

    //informacion que se va a llenar en la bbdd de elementos
    protected $fillable = [
        'tipo_elemento',
        'titulo',
        'autor',
        'productor',
        'genero1',
        'genero2',
        'genero3',
        'genero4',
        'genero5',
        'fecha_lanzamiento',
        'descripcion',
        'imagen',
    ];
}
