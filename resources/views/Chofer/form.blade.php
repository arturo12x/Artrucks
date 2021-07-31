@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <legend> {{$modo . ' chofer'}} </legend>
        </div>
        <div class="card-body">

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
<ul>
    @foreach($errors->all() as $error)
  <li> {{$error}}</li>
    @endforeach
</ul>
</div>
@endif
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre"
                    value="{{ isset($chofer->nombre)?$chofer->nombre:old('nombre') }}">
            </div>
            <div class="form-group">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input class="form-control" type="text" name="apellidoPaterno" id="apellidoPaterno"
                    value="{{isset($chofer->apellidoPaterno)?$chofer->apellidoPaterno:old('apellidoPaterno')}}">
            </div>
            <div class="form-group">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input class="form-control" type="text" name="apellidoMaterno" id="apellidoMaterno"
                    value="{{isset($chofer->apellidoMaterno)?$chofer->apellidoMaterno:old('apellidoMaterno')}}">
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento"
                    value="{{isset($chofer->fechaNacimento)?date("d-m-Y", strtotime($chofer->fechaNacimento)):old('fechaNacimento')}}">
               
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input class="form-control" type="email" name="email" id="email"
                    value="{{isset($chofer->email)?$chofer->email:old('email')}}">
            </div>
            <div class="form-group">
                @if(isset($chofer->foto))
                <img class="img-thumbnail img-fluid" width="100" src="{{asset('storage').'/'.$chofer->foto}}" alt="">
                @endif
                <input class="form-control" type="file" name="foto" id="foto">
            </div>

        </div>
        <div class="card-footer">
            <input class="btn btn-success" type="submit" value="{{$modo}}">
            <a class="btn btn-primary" href="{{url('chofer/')}}">Regresar</a>
        </div>
    </div>
</div>
@endsection