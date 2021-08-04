@extends('layouts.app')
@section('content')

<div class="container">



<legend>Mis camiones</legend>
<hr>
    <a href="{{url('/camion/create')}}" class="btn btn-success">Agregar camión</a>
    <br><br>

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{Session::get('mensaje')}}
    <button type="button"  class="close" data-dismiss="alert" 
aria-label="Close" btn-lg btn-block"> <span aria-hidden="true">&times;</span></button>
</div>
    @endif

<table  class="table table-light table-striped">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>         
             <th>Apodo</th>
             <th>Tipo</th>
            <th>Marca</th>
            <th>Año</th>
            <th>Placas</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($camiones as $camion)
<td>{{isset($camion->id)?$camion->id:''}}</td>
<td>{{isset($camion->apodo)?$camion->apodo:''}}</td>
<td>{{isset($camion->tipo)?$camion->tipo:''}}</td>
<td>{{isset($camion->marca)?$camion->marca:''}}</td>
<td>{{isset($camion->anio)?$camion->anio:''}}</td>
<td>{{isset($camion->placas)?$camion->placas:''}}</td>
<td>
    <a class="btn btn-warning" href="{{url('/camion').'/'.$camion->id.'/edit'}}"><i class="fas fa-pen"></i></a>

<form action="{{url('/camion').'/'.$camion->id}}" method="POST" class="d-inline">
    @csrf
    {{method_field('DELETE')}}
    <button class="btn btn-danger"  onclick="return confirm('¿Esta seguro que desea eliminar el registro?')" ><i class="fas fa-trash-alt"></i></button>
</form>
</td>
            
    

</tr>
     @endforeach
        </tbody>
</table>

@endsection