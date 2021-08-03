@extends('layouts.app')

@section('content')


<div class="container">

  
  <div class="card">
    <div class="row no-gutters">
      <div class="col">

        <img src="{{isset($chofer[0])?asset('storage').'/'.$chofer[0]:asset('resources/admin.jpeg') }}" class="bd-placeholder-img" width="100%" height="250"  alt="...">
        
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 st>
            Bienvenido:
            <small class="text-muted">{{Auth::user()->name}}</small>
          </h3>

          <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea fuga nisi veritatis incidunt quibusdam commodi corrupti dolores illo itaque nesciunt, tenetur totam nam suscipit, minus nemo nobis doloremque consequatur magni.Recusandae ab nulla sit minus voluptatum et quibusdam rerum, sint suscipit cupiditate molestiae dignissimos accusamus ullam nemo quae consectetur, ipsa voluptates deleniti. Officia sapiente amet quia adipisci vitae natus dignissimos?</p>
          <p class="card-text"><small class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias voluptate aliquam expedita perspiciatis harum minima soluta maxime labore saepe magni error, doloribus similique laborum obcaecati iste recusandae omnis ipsam tenetur.</small></p>
        </div>
      </div>
    </div>
  </div>
  <hr >


<div class="row">
  <div class="col">
<LEGEND>Opciones</LEGEND>
  </div>

</div>



  <div class="row">


    @if(auth()->user()->id==1)

    <div class="col">

      <div class="card h-100">
        <img src="{{asset('resources/chofer.jpg')}}" class="card-img-top" style="height:200px" alt="...">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">CHOFERES</h5>
          <p class="card-text">Listado de los datos de los choferes</p>
          <a href="{{url('/chofer')}}" class="btn btn-outline-danger">Ir a los choferes</a>
        </div>
      </div>
    </div>
    @endif
    
    <div class="col">
      <div class="card h-100" >
        <img  style="height:200px" src="{{asset('resources/camionVerde.jpg')}}" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">CAMIONES</h5>
          <p class="card-text">Catalogo de las unidades del chofer.</p>
          <a href="#" class="btn btn-outline-danger">Ir a los camiones</a>
        </div>
      </div>
    </div>



    <div class="col-6">
      <div class="card h-100" >
        <img style="height:200px" src="{{asset('resources/ruta.png')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">RUTAS</h5>
          <p class="card-text">Control de puntos de partida y destino.</p>
          <br>
          <a href="#"  class="btn btn-outline-danger">Ir a las rutas</a>
        </div>
      </div>
    </div>
   
  </div>



</div>


@endsection