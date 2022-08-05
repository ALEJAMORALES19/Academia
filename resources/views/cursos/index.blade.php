@extends('layouts.app')

@section('titulo', 'Lista Cursos')

@section('contenido')

    <h2> Listado de Cursos </h2>


    {{--foreach sirve para iterar array. es decir ciclos en listas--}}
    <div class="row">
    @foreach ($cursito as $item)
        <div class="col-sm">
            <div class="card text-center m-3" style="width: 18rem; margin:20px">
                <img style="height: 150 px" src="{{ Storage::url($item->imagen )}}" class="card-img-top" alt"..">
                <div class="card-body">
                <h5 class="card-title">{{$item->nombre}}</h5>

                {{--  Control K C  Comentarios
                <p class="card-text">{{$item->descripcion}}</p>
                <p class="card-text">{{$item->duracion}}</p> --}}
                <a href="/cursos/{{$item->id}}" class="btn btn-primary">Ver Detalle</a>
                </div>
            </div>
        </div>{{--cierre de la columna--}}



    @endforeach
    </div> {{--cierre de la fila row--}}
    {{--Las doble llave sirve para interpolar.
        Interpolar es traer una variable de otro lenguaje
        al lenguaje que se esta usando actualmente--}}


@endsection
