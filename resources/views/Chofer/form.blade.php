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
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre"
                            value="{{ isset($chofer->name)?$chofer->name:old('name') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento"
                            value="{{isset($chofer->fechaNacimento)?date("d-m-Y", strtotime($chofer->fechaNacimento)):old('fechaNacimento')}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input class="form-control" type="email" name="email" id="email"
                            value="{{isset($chofer->email)?$chofer->email:old('email')}}">
                    </div>
                </div>
             
            </div>

                    <div class="form-group">
                        @if(isset($chofer->foto))
                        <img class="img-thumbnail img-fluid" width="100" src="{{asset('storage').'/'.$chofer->foto}}"
                            alt="">
                        @endif
                        <input class="form-control" type="file" name="foto" id="foto">
                    </div>
                
            
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{url('chofer/')}}">Regresar</a>
            <input class="btn btn-success" type="submit" value="{{$modo}}">
          
        </div>
    </div>
</div>
@endsection