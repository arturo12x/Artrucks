@extends('layouts.app')
@section('content')
<div class="container">


    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button"  class="close" data-dismiss="alert" 
aria-label="Close" btn-lg btn-block"> <span aria-hidden="true">&times;</span></button>
</div>
    @endif




<a href="{{url('chofer/create')}}" class="btn btn-success">Registrar nuevo chofer</a>
<br>
<br>
<table class="table table-light table-striped">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($chofers as $chofer)
        <tr>
            <td>{{$chofer->id}}</td>
            <td>
            
        <img class="img-thumbnail img-fluid" width="100" src="{{asset('storage').'/'.$chofer->foto}}" alt="">
            {{--PARA QUE FUNCIONE LO DEL STORAGE HAY QUE EJECUTAR PRIMER PHP ARTISAN STORAGE:LINK!---}}
            </td>

            <td>{{$chofer->nombre}}</td>
            <td>{{$chofer->apellidoPaterno}}</td>
            <td>{{$chofer->apellidoMaterno}}</td>
            <td>{{$chofer->fechaNacimiento}}</td>
            <td>{{$chofer->correo}}</td>
            <td>
                <a href="{{url('/chofer').'/'.$chofer->id.'/edit'}}" class="btn btn-warning">
            <i class="fas fa-pen"></i>
                </a>
            
               
                <form action="{{ url('/chofer').'/'.$chofer->id}}" method="post" class="d-inline">
                @csrf {{-- EL CSRF ES UNA LLAVE O UN TOKEN OBLIGATORIO DE USAR EN LARAVEL ES POR SEGURIDAD PARA QUE UN FORMULARIO NO PUEDA SUPLANTAR!--}}

                {{method_field('DELETE')}} {{--ESTO ES PORQUE EL DELETE CUANDO SE CONSULTA EL PHP ARTISAN R:L NOS DICE QUE PARA ELIMINAR LOS DATOS REQUIEREN SER ENVIADOS POR EL METODO DELETE!--}}

                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Esta seguro que desea eliminar el registro?')" value="borrar"> <i class="fas fa-trash-alt"></i></button
            </form>
                </td>
        </tr>
        @endforeach
    </tbody>


</table>
{!! $chofers->links() !!}
</div>
@endsection