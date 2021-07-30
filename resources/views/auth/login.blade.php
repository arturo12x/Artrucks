@include('layouts.app')



	<link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
|
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h2 class="mensaje">Iniciar Sesión</h2>
			</div>
			<div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail"  required autocomplete="email" autofocus>
						
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					</div>
			
<div class="card-footer">
    <div class="form-group">
        <button type="submit" class="btn btn-primary float-right btn_iniciar">
     <i class="fa fa-sign-in"></i>
        </button>
        

    </div>
</div>

				</form>
			</div>
	
		</div>
	</div>
</div>
</body>
</html>