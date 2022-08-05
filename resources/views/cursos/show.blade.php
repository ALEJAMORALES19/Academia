@extends('layouts.app')

@section('titulo', 'Detalle curso')

@section('contenido')

<div>
    <div class="text-center">
    <img style="height:300px; width:250px" src="{{ Storage::url($cursito->imagen )}}" class="card-img-top" alt"..">
    <p class="card-text">{{$cursito->descripcion}}</p>
    <p class="card-text">{{$cursito->duracion}}</p>
    <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-primary">Editar</a>
    </div>
</div>
@endsection

