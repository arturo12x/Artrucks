

<form action="{{url('/camion').'/'.$camion->id}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('camion.form',['modo'=>'Editar'])
</form>