
@extends ('layouts.app')

@section ('titulo', 'Jugador' .$jugadores->idJugador)

@section ('content')

	
		<div class="row">
			<div class="col">
				<h1>Ficha</h1>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<img src="{{asset('images/jugador/' .$jugadores->imagenJugador)}}" class="img-responsive float-sm-right align-self-start" style="width:15% !important">
				<p><b>Nombre</b> 	{{$jugadores->nombreJugador}}</p>
				<p><b>Apellidos</b> {{$jugadores->apellidosJugador}}</p>
				@foreach($paises as $pais)
					@if($jugadores->idPais === $pais->idPais)
						<p><b>Nacionalidad</b> 		{{$pais->nombrePais}}</p>
					@endif
				@endforeach
				<p><b>Edad</b> 		{{$jugadores->edadJugador}}</p>
				<p><b>Fecha de Nacimiento</b> 	{{$jugadores->nacimientoJugador}}</p>

				<p><b>Posición</b> 	{{$jugadores->posicionJugador}}</p>
				<p><b>Altura</b> 	{{$jugadores->alturaJugador}} cm.</p>
				<p><b>Peso</b> 		{{$jugadores->pesoJugador}} kg.</p>
				<p><b>Pie</b> 		{{$jugadores->pieJugador}}</p>


			</div>
		</div>

		<div class="row">
			<div class="col">
				<h1>Trayectoria</h1>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<h1>Trayectoria</h1>
			</div>
		</div>

		<div class="row">
			<div class="col">
				@foreach($trayectorias as $tra)
					@if($tra->idJugador === $jugadores->idJugador)
						<table class="table table-striped">
							<thead>
								<td>Año</td>
								<td>Torneo</td>
								<td>Club</td>
								<td>Número de camiseta</td>
							</thead>
							<tbody>
								@foreach($torneos as $tor)
									@if($tra->idTorneo === $tor->idTorneo)
										<td>{{$tor->edicion}}</td>
										<td>{{$tor->nombreTorneo}}</td>
									@endif
								@endforeach
								@foreach($clubes as $club)
									@if($tra->idClub === $club->idClub)
										<td>{{$club->nombreClub}}</td>
									@endif
								@endforeach
								<td>{{$tra->camisetaJugador}}</td>
							</tbody>
						</table>

					@endif
				@endforeach
			</div>
		</div>




















	

@endsection