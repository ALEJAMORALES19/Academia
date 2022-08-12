<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeDocenteRequest;
use App\Models\Docente;
use Illuminate\Http\Request;

class docenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::all();

        return view('docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeDocenteRequest $request)
    {
            $validacionDatos = $request->validate([
            //'nombres'=>'required|max:50',
            //'apellidos'=>'required|max:40',
            //'//titulo'=>'required|max:50',
            //'Edad'=>'required|size:2',
            //'fecha_contrato'=>'nullable|date',
            //'foto'=>'required|file|max:5120',
            //'Doc_Identidad'=>'required'

            ]);
            if($request->hasFile('foto')){
                $archivo = $request->file('foto');
            }
            if($request->hasFile('Doc_Identidad')){
                $archivo = $request->file('Doc_Identidad');
            }
        $docente = new Docente();

        $docente->nombres = $request->input('nombres');
        $docente->apellidos = $request->input('apellidos');
        $docente->titulo = $request->input('titulo');
        $docente->edad = $request->input('edad');
        $docente->fecha_contrato = $request->input('fecha_contrato');
        if($request->hasFile('foto')){
            $docente->foto = $request->file('foto')->store('public/Docente');
        }
        if($request->hasFile('Doc_Identidad')){
            $docente->Doc_Identidad = $request->file('Doc_Identidad')->store('public/Docente');
        }


        $docente->save();//con el comando sae se registra
        //la info en la base de datos.
        return view('docentes.store_docente');

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
        $docente = Docente::find($id);
        return view('docentes.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);
        return view('docentes.edit', compact('docente'));
        //return view('docentes.edit', compact('docente'));
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
        $docente = Docente::find($id);
        //return $request;
        //return $cursito;
        //$cursito->fill($request->all());
        $docente->fill($request->except('foto'));
        if($request->hasFile('foto')){
            $docente->foto = $request->file('foto')->store('public/Docente');
        }
        $docente->fill($request->except('Doc_Identidad'));
        if($request->hasFile('Doc_Identidad')){
            $docente->Doc_Identidad = $request->file('Doc_Identidad')->store('public/Docente');
        }

        $docente->save();
        return view('docentes.update_docente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);

        $urlFotoBD = $docente->foto;
        //return $urlImagenBD;
        $nombreFoto = str_replace('public/','\storage\\',$urlFotoBD);
        //return $nombreImagen;
        $rutaCompleta = public_path() .$nombreFoto;
        //return $rutaCompleta;
        unlink($rutaCompleta);
        $docente->delete();
        return view('docentes.delete_docente');

    }
}
