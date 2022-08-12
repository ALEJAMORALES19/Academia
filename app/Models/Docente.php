<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
     //añado permisos para la manipulacion campos de tabla
     protected $fillable = ['nombres', 'apellidos', 'titulo', 'edad', 'fecha_contrato', 'foto', 'Doc_Identidad'];
     use HasFactory;
}
