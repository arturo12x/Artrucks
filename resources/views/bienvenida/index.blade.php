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
                  BIENVENIDO:
                    <small class="text-muted">{{Auth::user()->name}}</small>
                  </h3>
                  
              <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>

</div>
          

@endsection