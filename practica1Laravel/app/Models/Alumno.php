<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumno';
    protected $fillable = [
        'nombre', 'telefono', 'edad', 'password', 'email', 'sexo',
    ];

    //IMPORTANTE: PARA QUITAR LOS DOS CAMPOS DE UPDATED Y CREATED
    public $timestamps = false;
}
