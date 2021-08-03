@extends('layouts.app')
@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <legend>{{$modo}} ruta</legend>
        </div>
        <div class="card-body">
            <form action="{{url('/ruta/create')}}" method="GET">
            <div class="form-group">
                <label for="camion_id">Vehículos</label>
                <select class="form-control" name="camion_id" id="camion_id">
                    <option selected value="">--Seleccione el vehículo de su ruta--</option>
                    @foreach($camiones as $camion)
                    <option value="{{ $camion->id }}" {{request()->camion_id == $camion->id ? 'selected' : '' }}>{{ $camion->id .' '.$camion->apodo}}</option>

                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="litros_inicio">Litros de inicio</label>
                        <input type="number" class="form-control" name="litros_inicio" id="litros_inicio"
                            placeholder="Ingrese los litros con los que la unidad inicia">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="kilometros_inicio">Kilómetros de inicio</label>
                        <input type="number" class="form-control" name="kilometros_inicio" id="kilometros_inicio"
                            placeholder="Ingrese los Kilometros con los que la unidad inicia">
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col">
                    <div class="form-group">
                        <label for="estado_inicio_id">Estados</label>
                   
                       
                            <select class="form-control" name="estado_inicio_id" id="estado_inicio_id"
                                onchange="this.form.submit()">
                                <option selected value="">--Seleccione el estado de incio de su ruta--</option>
                                @foreach($estados as $estado)
                                <option value="{{ $estado->id }}" {{request()->estado_inicio_id == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>

                                @endforeach
                            </select>
                      

                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="municipio_inicio_id">Municipios</label>
                        <select class="form-control" name="municipio_inicio_id" id="municipio_inicio_id">
                            <option selected value="">--Seleccione el municipio de incio de su ruta--</option>
                            @isset($municipios_inicio)
                            @foreach($municipios_inicio as $municipio)
                            <option value="{{$municipio->id}}"  {{request()->municipio_inicio_id == $municipio->id ? 'selected' : '' }} >{{$municipio->nombre}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

            </div>

            <hr>
            <h6 class="card-subtitle mb-2 text-muted">Llenar esta sección únicamente si ya finalizó la ruta.</h6>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="litros_fin">Litros fin</label>
                        <input type="number" class="form-control" name="litros_fin" id="litros_fin"
                            placeholder="Ingrese los litros con los que la unidad finaliza">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="kilometros_fin">Kilómetros fin</label>
                        <input type="number" class="form-control" name="kilometros_fin" id="kilometros_fin"
                            placeholder="Ingrese los Kilometros con los que la unidad finaliza">
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    <div class="form-group">
                        <label for="estado_fin_id">Estados</label>
                      
                        <select class="form-control" name="estado_fin_id" id="estado_fin_id"  onchange="this.form.submit()">
                            <option selected value="">Seleccione el estado del fin de su ruta</option>
                            @foreach($estados as $estado)
                            <option value="{{ $estado->id }}" {{request()->estado_fin_id == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>

                            @endforeach
                        </select>
                        
                      
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="municipio_fin_id">Municipios</label>
                        <select class="form-control" name="municipio_fin_id" id="municipio_fin_id">
                            <option selected value="">Seleccione el municipio del fin de su ruta</option>
                            @isset($municipios_fin)
                            @foreach($municipios_fin as $municipio)
                            <option value="{{$municipio->id}}"  {{request()->municipio_fin_id == $municipio->id ? 'selected' : '' }} >{{$municipio->nombre}}</option>
                            @endforeach
                            @endif
                        </select>
                    </form>
                    </div>
                </div>

            </div>


        </div>
        <div class="card-footer">
            <a href="{{url('ruta')}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>




</div>


@endsection