@extends('layouts.app')

@section('titulo', 'Detalle Docentes')

@section('contenido')

<div>

    <div class="text-center">
    <h2>Información del docente</h2>
    <br>
    <img style="height:200px; width:200px" src="{{ Storage::url($docente->foto )}}" class="card-img-top" alt"..">
    <p class="card-text"> <h6>Nombres y Apellidos: </h6>{{$docente->nombres}}  {{$docente->apellidos}}</p>
    <p class="card-text">Titulo Universitario: {{$docente->titulo}}</p>
    <p class="card-text">Edad: {{$docente->edad}}</p>
    <p class="card-text">Fecha de contrato: {{$docente->fecha_contrato}}</p>
    <p>Documento de identidad:</p><br>
    <iframe  width="300" height="300"src="{{Storage::url($docente->Doc_Identidad)}}"> </iframe>

    <br><br><br>
    <a href="/docentes/{{$docente->id}}/edit" class="btn btn-primary">Editar</a>
    <br><br>

    <form class="form-group" action="/docentes/{{$docente->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">--Eliminar--</button>
    </form>
    </div>
</div>
@endsection

