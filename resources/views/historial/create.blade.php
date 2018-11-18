
@extends ('layouts.app')

@section ('titulo', 'Historial Create')

@section ('content')
	<form class="form-group" method="POST" action="/historial">	
		@csrf
		<div class="form-group">
			
			<label for="">gol</label>
			<input type="text" name="golJugador" class="form-control">
			<!--<label for="">amarilla</label>
			<input type="text" name="amarillaJugador" class="form-control">
			<label for="">roja</label>
			<input type="text" name="rojaJugador" class="form-control">
			<label for="">minutos</label>
			<input type="text" name="minutosJugador" class="form-control">

		
			
			
    		<label>id Partido</label>
    			<select name="idPartido" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($partidos as $part)
    					<option value="{{$part['idPartido']}}">{{$part['idPartido']}}</option>
    				@endforeach
    			</select>
			
			<label>id Jugador</label>
    			<select name="idJugador" class="form-control">
    				<option disabled selected value>Seleciona una opción...</option>
    				@foreach ($jugadores as $jug)
    					<option value="{{$jug['idJugador']}}">{{$jug['nombreJugador']}} {{$jug['apellidosJugador']}}</option>
    				@endforeach
    			</select>

-->
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>

@endsection