
<h1> {{$modo . ' chofer'}} </h1>

<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" value="{{ isset($chofer->nombre)?$chofer->nombre:''}}"><br>

<label for="apellidoPaterno">Apellido Paterno</label>
<input type="text" name="apellidoPaterno" id="apellidoPaterno" value="{{isset($chofer->apellidoPaterno)?$chofer->apellidoPaterno:''}}"><br>


<label for="apellidoMaterno">Apellido Materno</label>
<input type="text" name="apellidoMaterno" id="apellidoMaterno"  value="{{isset($chofer->apellidoMaterno)?$chofer->apellidoMaterno:''}}"><br>

<label for="fechaNacimiento">Fecha de nacimiento</label>
<input type="date" name="fechaNacimiento" id="fechaNacimiento"  value="{{isset($chofer->fechaNacimento)?$chofer->fechaNacimento:''}}"><br>

<label for="correo">Correo</label>
<input type="email" name="correo" id="correo"  value="{{isset($chofer->correo)?$chofer->correo:''}}"><br>

<label for="foto">Fotografía</label>
@if(isset($chofer->foto))
<img width="100" src="{{asset('storage').'/'.$chofer->foto}}" alt="">
@endif
<input type="file" name="foto" id="foto"><br>

<input type="submit" value="{{$modo}}">

<a href="{{url('chofer/')}}">Regresar</a>