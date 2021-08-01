@extends('layouts.app')

@section('content')

<div class="container">

  
  <div class="card">
    <div class="row no-gutters">
      <div class="col">
        <img class="bd-placeholder-img" width="100%" height="250" src="{{asset('resources/fondo_login.jpg')}}" alt="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 st>
            Bienvenido:
            <small class="text-muted">{{Auth::user()->name}}</small>
          </h3>

          <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content
            is a little longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
  <hr>


<div class="row">
  <div class="col">
<LEGEND>Opciones</LEGEND>
  </div>

</div>



  <div class="row">


    @if(auth()->user()->id==1)

    <div class="col">
      <div class="card">
        <img src="{{asset('resources/chofer.jpg')}}" class="card-img-top" style="height:200px" alt="...">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">CHOFERES</h5>
          <p class="card-text">Vea un listado de las unidades, asi como agregar o actualizar dartos de los camiones</p>
          <a href="{{url('/chofer')}}" class="btn btn-primary self-center">Go somewhere</a>
        </div>
      </div>
    </div>
    @endif
    
    <div class="col">
      <div class="card">
        <img  style="height:200px" src="{{asset('resources/camionVerde.jpg')}}" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">CAMIONES</h5>
          <p class="card-text">Vea un listado de las unidades, asi como agregar o actualizar dartos de los camiones.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card" ">
        <img src=" ..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">CAMIONES</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" ">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title font-weight-bold">CAMIONES</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
            content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>

  </div>



</div>


@endsection