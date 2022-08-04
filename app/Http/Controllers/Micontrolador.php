<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Micontrolador extends Controller
{
    Public function multipli($a, $b){
        return 'La multiplicacion da: ' .$a * $b;
    }
}
