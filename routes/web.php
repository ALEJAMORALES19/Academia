<?php

use App\Http\Controllers\ControladorPrecios;
use App\Http\Controllers\HeladeriaController;
use App\Http\Controllers\Micontrolador;
//Primero se invoca la clase con su ruta
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('cursos.bienvenido');
});

Route::get('/cursos/nosotros', function () {
    return view('cursos.nosotros');
});

Route::get('miruta', function () {
    return 'Estoy en laravel';
});
//Los parametros van entre llaves
Route::get('/minombre/{nombre}', function ($nombre) {
    return 'Hola, soy ' . $nombre;
});

//Ruta llamada suma. El resultado sera: la suma de a + b es:

Route::get('/suma/{a}/{b}', function($a, $b){
    $sum = $a + $b;
    return 'La suma es a + b: ' . $sum;
});


//Menciona la clase y el metodo como un array
//Debo usar la palabra reservada class
//El metodo
Route::get('/rutamulti/{a}/{b}',[Micontrolador::class,'multipli']);

Route::get('/heladeria/{a}', [HeladeriaController::class,'totalHelado']);

Route::get('/precio/{precio}', [ControladorPrecios::class,'valor']);

Route::get('/iva/{nombre}/{precio}', [ControladorPrecios::class,'getIva']);

Route::resource('cursos', CursoController::class);







