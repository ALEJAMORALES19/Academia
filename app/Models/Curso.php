<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //añado permisos para la manipulacion campos de tabla
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'duracion'];
    use HasFactory;
}
