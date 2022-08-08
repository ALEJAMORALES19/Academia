@extends('layouts.app')

@section('titulo', 'Detalle curso')

@section('contenido')

<div>
    <div class="text-center">
    <img style="height:250px; width:250px" src="{{ Storage::url($cursito->imagen )}}" class="card-img-top" alt"..">
    <p class="card-text">{{$cursito->descripcion}}</p>
    <p class="card-text">{{$cursito->duracion}}</p>
    <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-primary">Editar</a>
    <br><br>

{{--Para este caso no se necesita escribir destroy en la ruta como si escribimos edit en la ruta para
obtener el formulario de edicion. Aqui creamos un formulario simplemente para poder incluir el boton de eliminar--}}

    <form class="form-group" action="/cursos/{{$cursito->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">--Eliminar--</button>
    </form>
    </div>
</div>
@endsection

