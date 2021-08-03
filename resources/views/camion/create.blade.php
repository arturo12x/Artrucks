
    <form action="{{url('/camion')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('camion.form',['modo'=>'Agregar'])
    
    
    </form>
    