vista index

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<a href="{{url('chofer/create')}}">Registrar nuevo chofer</a>

<table class="table table-light">
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
            
        <img src="{{asset('storage').'/'.$chofer->foto}}" alt="">
            {{--PARA QUE FUNCIONE LO DEL STORAGE HAY QUE EJECUTAR PRIMER PHP ARTISAN STORAGE:LINK!---}}
            </td>

            <td>{{$chofer->nombre}}</td>
            <td>{{$chofer->apellidoPaterno}}</td>
            <td>{{$chofer->apellidoMaterno}}</td>
            <td>{{$chofer->fechaNacimiento}}</td>
            <td>{{$chofer->correo}}</td>
            <td>
                <a href="{{url('/chofer').'/'.$chofer->id.'/edit'}}">Editar</a>
            
                
                <form action="{{ url('/chofer').'/'.$chofer->id}}" method="post">
                @csrf {{-- EL CSRF ES UNA LLAVE O UN TOKEN OBLIGATORIO DE USAR EN LARAVEL ES POR SEGURIDAD PARA QUE UN FORMULARIO NO PUEDA SUPLANTAR!--}}

                {{method_field('DELETE')}} {{--ESTO ES PORQUE EL DELETE CUANDO SE CONSULTA EL PHP ARTISAN R:L NOS DICE QUE PARA ELIMINAR LOS DATOS REQUIEREN SER ENVIADOS POR EL METODO DELETE!--}}

                <input type="submit" onclick="return confirm('¿Esta seguro que desea eliminar el registro?')" value="borrar">
            </form>
                </td>
        </tr>
        @endforeach
    </tbody>


</table>