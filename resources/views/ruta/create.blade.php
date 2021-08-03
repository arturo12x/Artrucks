

<form action="{{url('/chofer')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('ruta.form',['modo'=>'Agregar'])


</form>
