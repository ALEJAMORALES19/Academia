@extends('layouts.app')

@section('titulo', 'Detalle Docentes')

@section('contenido')

<div>

    <div class="text-center">
    <h2>Información del docente</h2>
    <br>
    <img style="height:200px; width:200px" src="{{ Storage::url($docente->foto )}}" class="card-img-top" alt"..">
    <p class="card-text"> <h6>Nombres y Apellidos: </h6>{{$docente->nombres}}  {{$docente->apellidos}}</p>
    <p class="card-text"><h6>Titulo Universitario: </h6>{{$docente->titulo}}</p>
    <p class="card-text"><h6>Edad: </h6>{{$docente->edad}}</p>
    <p class="card-text"><h6>Fecha de contrato: </h6>{{$docente->fecha_contrato}}</p>
    <h6>Documento de identidad:</h6><br>
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

