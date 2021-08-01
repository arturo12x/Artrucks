<form action="{{url('/chofer').'/'.$chofer->id}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('chofer.form',['modo'=>'Editar']);


</form>