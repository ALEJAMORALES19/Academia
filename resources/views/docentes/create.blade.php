@extends('layouts.app_2')

@section('titulo', 'Añadir Docente')

@section('contenido')

<form action="/docentes" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
        @foreach ($errors->all() as $alerta)
            {{--<p>{{$alerta}}</p>--}}
    <div class="alert alert-danger" role="alert">
        <ul>
            <li>{{$alerta}}</li>
        </ul>
    </div>
        @endforeach
    @endif
    <br>
        <h2>Aqui puedes añadir un nuevo docente</h2>
        <div class="form-group">
            <label for="nombres">Nombre del docente</label>
            <input id="nombres" class="form-control" type="text" name="nombres">
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos del docente</label>
            <input id="apellidos" class="form-control" type="text" name="apellidos">
        </div>
        <div class="form-group">
            <label for="titulo">Titulo Universitario</label>
            <input id="titulo" class="form-control" type="text" name="titulo">
        </div>
        <div class="form-group">
            <label for="edad">Edad</label>
            <input id="edad" class="form-control" type="number" name="edad">
        </div>
        <div class="form-group">
            <label for="fecha_contrato">Fecha de contrato</label>
            <input id="fecha_contrato" class="form-control" type="date" name="fecha_contrato">
        </div>
        <div class="form-group">
            <label for="foto">Cargue la Foto</label> <br>
            <input id="foto" type="file" name="foto">
        </div>
        <div class="form-group">
            <label for="Doc_Identidad">Cargue su documento de identidad</label><br>
            <input id="Doc_Identidad"  type="file" name="Doc_Identidad">
        </div>
        <button class="btn btn-primary" type="submit">Añadir</button>

</form>









@endsection
