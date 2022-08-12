@extends('layouts.app')

@section('titulo', 'Editar Docente')

@section('contenido')



<form action="/docentes/{{$docente->id}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <br>
        <h2>Formulario para editar la información</h2>
        <div class="form-group">
            <label for="nombre">Edita el nombre del docente</label>
            <input id="nombre" class="form-control" type="text" name="nombre" value="{{$docente->nombres}}">
        </div>
        <div class="form-group">
            <label for="apellidos">Edita el apellido del docente</label>
            <input id="apellidos" class="form-control" type="text" name="apellidos" value="{{$docente->apellidos}}">
        </div>
        <div class="form-group">
            <label for="titulo">Edita el titulo del docente</label>
            <input id="titulo" class="form-control" type="text" name="titulo" value="{{$docente->titulo}}">
        </div>
        <div class="form-group">
            <label for="edad">Edita la edad del docente</label>
            <input id="edad" class="form-control" type="number" name="edad" value="{{$docente->edad}}">
        </div>
        <div class="form-group">
            <label for="fecha_contrato">Edita la fecha del contrato</label>
            <input id="fecha_contrato" class="form-control" type="text" name="fecha_contrato" value="{{$docente->fecha_contrato}}">
        </div>
        <div class="form-group">
            <label for="foto">edite la foto</label> <br>
            <img style="height:100px; width:100px" src="{{ Storage::url($docente->foto )}}" class="card-img-top" alt".."><br><br>
            <input id="foto" type="file" name="foto" value="{{$docente->foto}}">
        </div>
        <div class="form-group">
            <label for="Doc_identidad">edite el pdf</label> <br>
            <iframe  width="150" height="150" src="{{Storage::url($docente->Doc_Identidad)}}"> </iframe><br><br>
            <input id="Doc_Identidad" type="file" name="Doc_Identidad" value="{{$docente->Doc_Identidad}}">
        </div>
        <button class="btn btn-primary" type="submit">Actualizar</button>

</form>

@endsection


