
@extends ('layouts.app')

@section ('titulo', 'Usuario Create')

@section ('content')
	<form class="form-group" method="POST" action="/user">	
		@csrf
		<div class="form-group">

			
			<label for="">Nombre Usuario</label>
			<input type="text" name="name" class="form-control">
			<label for="">Correo</label>
			<input type="text" name="email" class="form-control">
			<label for="">Contraseña</label>
			<input type="password" name="password" class="form-control">
			<label for="">Tipo</label>
			<select name="tipoUsuario" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="usuario">Usuario</option>
					<option value="secretaria">Secretaria</option>
					<option value="administrador">Administrador</option>
					


			</select>	

				

			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>

@endsection