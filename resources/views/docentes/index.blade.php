@extends('layouts.app')

@section('titulo', 'Lista Docentes')

@section('contenido')

<h2> Listado de Docentes </h2><br>
<a href="/docentes/create" class="m-5 btn btn-success">Añadir nuevo docente</a>


{{--foreach sirve para iterar array. es decir ciclos en listas--}}
<div class="row">

@foreach ($docentes as $item)
    <div class="col-sm">
        <div class="card text-center m-3" style="width: 18rem; margin:20px">
            <img width="150px" height="200px" src="{{ Storage::url($item->foto)}}" class="card-img-top" alt"..">
            <div class="card-body">
            <h5 class="card-title">{{$item->nombres}} {{$item->apellidos}}</h5>
            <h6 class="card-text">Titulo Universitario: {{$item->titulo}}</h6><br>
            <a href="/docentes/{{$item->id}}" class="btn btn-primary">Ver Información</a>
            </div>
        </div>
    </div>{{--cierre de la columna--}}
@endforeach
</div>


@endsection
