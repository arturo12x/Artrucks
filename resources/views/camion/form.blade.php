@extends('layouts.app')
@section('content')

<div class="container">


    <div class="card">
        <div class="card-header">
            <legend>{{$modo}} camion</legend>
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
                <label for="apodo">Apodo del camion</label>
                <input type="text" class="form-control" id="apodo" name="apodo"
                    value="{{isset($camion->apodo)?$camion->apodo:old('apodo')}}" placeholder="Ingrese el apodo" required>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <select class="form-control" id="marca" name="marca">
<option value="" >--Seleccione una marca de camion--</option>
                    <option value="Kenworth" {{isset($camion->marca) && $camion->marca=='Kenworth'?'Selected':''}}>
                        Kenworth</option>
                    <option value="Isuzu" {{isset($camion->marca) && $camion->marca=='Isuzu'?'Selected':''}}>Isuzu
                    </option>
                    <option value="Freightliner"
                        {{isset($camion->marca) && $camion->marca=='Freightliner'?'Selected':''}}>Freightliner</option>
                    <option value="Dina" {{isset($camion->marca) && $camion->marca=='Dina'?'Selected':''}}>Dina</option>
                    <option value="Volvo" {{isset($camion->marca) && $camion->marca=='Volvo'?'Selected':''}}>Volvo
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="modelo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo">
                    <option value="" >--Seleccione un tipo de camion--</option>
                    <option value="Articulado" {{isset($camion->tipo) && $camion->tipo=='Articulado'?'Selected':''}}>
                        Articulado</option>
                    <option value="Rigido" {{isset($camion->tipo) && $camion->tipo=='Rigido'?'Selected':''}}>Rigido
                    </option>
                    <option value="Frigorifico" {{isset($camion->tipo) && $camion->tipo=='Frigorifico'?'Selected':''}}>
                        Frigorifico</option>
                    <option value="Cerrado" {{isset($camion->tipo) && $camion->tipo=='Cerrado'?'Selected':''}}>
                        Cerrado</option>
                    <option value="Portacoches" {{isset($camion->tipo) && $camion->tipo=='Portacoches'?'Selected':''}}>
                        Portacoches</option>
                </select>
            </div>


            <div class="form-group">
                <label for="anio">Año</label>
                <input type="number" class="form-control" id="anio" name="anio"
                    value="{{isset($camion->anio)?$camion->anio:old('anio')}}" placeholder="Ingrese el año" required>
            </div>

            <div class="form-group">
                <label for="placas">Placas</label>
                <input type="text" class="form-control" id="placas" name="placas"
                    value="{{isset($camion->placas)?$camion->placas:old('placas')}}" placeholder="Ingrese las placas" required>
            </div>

            <div class="form-group">
                <label for="kilometraje">Kilometraje</label>
                <input type="number" class="form-control" id="kilometraje" name="kilometraje"
                    value="{{isset($camion->kilometraje)?$camion->kilometraje:old('kilometraje')}}" placeholder="Ingrese el kilometraje" required>
            </div>

        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{url('/camion')}}">Regresar</a>
            <input class="btn btn-success" type="submit" value="{{$modo}}">
        </div>
    </div>


</div>


@endsection