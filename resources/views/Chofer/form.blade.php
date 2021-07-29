@extends('layouts.app')
@section('content')
<div class="container">

    <h1> {{$modo . ' chofer'}} </h1>

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input class="form-control" type="text" name="nombre" id="nombre"
            value="{{ isset($chofer->nombre)?$chofer->nombre:''}}">
    </div>

    <div class="form-group">
        <label for="apellidoPaterno">Apellido Paterno</label>
        <input class="form-control" type="text" name="apellidoPaterno" id="apellidoPaterno"
            value="{{isset($chofer->apellidoPaterno)?$chofer->apellidoPaterno:''}}">
    </div>

    <div class="form-group">
        <label for="apellidoMaterno">Apellido Materno</label>
        <input class="form-control" type="text" name="apellidoMaterno" id="apellidoMaterno"
            value="{{isset($chofer->apellidoMaterno)?$chofer->apellidoMaterno:''}}">
    </div>

    <div class="form-group">
        <label for="fechaNacimiento">Fecha de nacimiento</label>
        <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento"
            value="{{isset($chofer->fechaNacimento)?$chofer->fechaNacimento:''}}">
    </div>

    <div class="form-group">
        <label for="correo">Correo</label>
        <input class="form-control" type="email" name="correo" id="correo"
            value="{{isset($chofer->correo)?$chofer->correo:''}}">
    </div>


    <div class="form-group">

      
        @if(isset($chofer->foto))
        <img class="img-thumbnail img-fluid" width="100" src="{{asset('storage').'/'.$chofer->foto}}" alt="">
        @endif
        <input class="form-control" type="file" name="foto" id="foto">
    </div>

    <input class="btn btn-success" type="submit" value="{{$modo}}">

    <a class="btn btn-primary" href="{{url('chofer/')}}">Regresar</a>
</div>


@endsection