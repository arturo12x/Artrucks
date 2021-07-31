<form action="{{url('/chofer')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('chofer.form',['modo'=>'Crear'])
</form>
