
@extends ('layouts.app')

@section ('titulo', 'Arbitro Edit - ' .' ' .$arbitros->nombreArbitro .' ' .$arbitros->apellidosArbitro)

@section ('content')

	<form class="form-group" method="POST" action="/arbitro/{{$arbitros->idArbitro}}" enctype="multipart/form-data">	
		@method('PUT')
		@csrf
		<div class="form-group">
			<label for="">Nombre</label>
			<input type="text" name="nombreArbitro" class="form-control" value="{{$arbitros->nombreArbitro}}">
			<label for="">Apellidos</label>
			<input type="text" name="apellidosArbitro" class="form-control" value="{{$arbitros->apellidosArbitro}}">
			<label for="">Imagen</label>
			<input type="file" name="imagenArbitro" class="form-control" >
			<label for="">Nacimiento</label>
			<input type="date" name="nacimientoArbitro" class="form-control" value="{{$arbitros->nacimientoArbitro}}">
		
			<label>Tipo</label>
			<select name="tipoArbitro" class="form-control" >
					<option disabled selected value>Seleciona una opción...</option>
					<option value="arbitroCentral">Árbitro central</option>
					<option value="arbitroAsistente1">Árbitro asistente n° 1</option>
					<option value="arbitroAsistente2">Árbitro asistente n° 2</option>
    				
			</select>	

			<label>Grado</label>
			<select name="gradoArbitro" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
					<option value="arbitroFIFA">Árbitro FIFA</option>
					<option value="arbitroNacional">Árbitro Nacional</option>

			</select>	

			<label for="">Edad</label>
			<input type="text" name="edadArbitro" class="form-control" value="{{$arbitros->edadArbitro}}">
			
			
    		<label>País</label>
    			<select name="idPais" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($paises as $ps)
    					<option value="{{$ps['idPais']}}">{{$ps['nombrePais']}}</option>
    				@endforeach
    			</select>
			
			<label>Asociación</label>
    			<select name="idAsociacion" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($asociaciones as $asoc)
    					<option value="{{$asoc['idAsociacion']}}">{{$asoc['nombreAsociacion']}}</option>
    				@endforeach
    			</select>


			<button type="submit" class="btn btn-primary">Editar</button>


		</div>
	</form>
		<a href="../../arbitro"><button class='btn btn-danger'>Atrás</button></a>
@endsection