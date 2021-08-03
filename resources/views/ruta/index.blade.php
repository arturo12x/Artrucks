@extends('layouts.app')
@section('content')
<div class="container">

    <legend>Mis rutas</legend>
    <hr>
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" btn-lg btn-block"> <span
                aria-hidden="true">&times;</span></button>
    </div>
    @endif




    <a href="{{url('ruta/create')}}" class="btn btn-success">Registrar nueva ruta</a>
    <br>
    <br>
    <table class="table table-light table-striped">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Chofer</th>
                <th>Camion</th>
                <th>Km -inicio</th>
                <th>Litros- inicio</th>
                <th>Km - fin</th>
                <th>Litros - fin</th>
                <th>Punto de salida</th>
                <th>Destino</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach($rutas as $ruta)
            <tr>
                <td>{{$ruta->id}}</td>
                <td>{{$ruta->nombre}}</td>
                <td>{{$ruta->camionId .' '.  $ruta->camionApodo }}</td>
                <td>{{$ruta->kilometros_inicio}}</td>
                <td>{{$ruta->litros_inicio}}</td>
                <td>{{$ruta->kilometros_fin}}</td>
                <td>{{$ruta->litros_fin}}</td>
                <td>{{$ruta->municipio_inicio.', '.$ruta->estado_inicio}}</td>
                <td>{{$ruta->municipio_fin.', '.$ruta->estado_fin}}</td>
                <td>
                    <a class="btn btn-warning" href=""><i class="fas fa-pen"></i></a>
                    <form action="{{url('/chofer'.'/'.$ruta->id)}}" method="POST" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}



                        <button class="btn btn-danger" type="submit"
                            onclick="return confirm('¿Esta seguro que desea eliminar el registro?')" value="borrar"><i
                                class="fas fa-trash-alt"></i></button>
                    </form>


                </td>
            </tr>
            @endforeach
        </tbody>


    </table>

</div>
@endsection