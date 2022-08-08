<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*traemos toda la informacion de la tabala Cursos
        a traves del modelo y elmetodo all()*/
        $cursito = Curso::all();
        //se adjunta cursito a la vista para poderlo usar
        return view('cursos.index', compact('cursito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCursoRequest $request)
    {
        $validacionDatos = $request->validate([
            // 'nombre'=>'required|max:10',
            // 'descripcion'=>'required|max:100',
            // 'duracion'=>'required|numeric|digits_between:1,8',
            // 'imagen'=>'required|image',

        ]);
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
        }
        //se devuelve la peticion hecha al servidor
        //return $request->all();
        $cursito = new Curso(); // lo que hicimos fue crear una instancia de la clase Curso
        $cursito->nombre = $request->input('nombre');
        $cursito->descripcion = $request->input('descripcion');
        if($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }
        $cursito->duracion = $request->input('duracion');


        $cursito->save();//con el comando sae se registra
        //la info en la base de datos.
        return 'Guardado Exitosamente';
        //return $request->input('nombre');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursito = Curso::find($id);
        return view('cursos.show', compact('cursito'));
        //return 'El id de este curso es ' .$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursito = Curso::find($id);
        return view('cursos.edit', compact('cursito'));
        //return view('cursos.edit');
        //return view('cursos.edit', compact('cursito'));
        //return 'El id del curso que desea actualizar es: ' .$id;
        //return 'La información que usted quiere actualizar, se veria asi en formato array: ' .$cursito;
        // $cursito = Curso::find($id);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cursito = Curso::find($id);
        //return $request;
        //return $cursito;
        //$cursito->fill($request->all());
        $cursito->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }
        $cursito->save();
        return 'La actualizacion fue exitosa';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursito = Curso::find($id);

        $urlImagenBD = $cursito->imagen;
        //return $urlImagenBD;
        $nombreImagen = str_replace('public/','\storage\\',$urlImagenBD);
        //return $nombreImagen;
        $rutaCompleta = public_path() .$nombreImagen;
        //return $rutaCompleta;
        unlink($rutaCompleta);
        $cursito->delete();
        return 'Eliminado';

    }

}
