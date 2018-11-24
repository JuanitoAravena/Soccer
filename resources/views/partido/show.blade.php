
@extends ('layouts.app')

@section ('titulo', 'Partidos' .$partidos->idPartido)

@section ('content')
		<div class="row border justify-content-center">
			@foreach($clubes as $club)
				@if (strcmp($partidos->clubLocalPartido, $club->idClub) === 0)

					<div class="col-4">
		

						<p><td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:90px !important; height:90px !important"></td> {{ $club['nombreClub'] }}</p>
					</div>
				@endif
			@endforeach
					<div class="col-2 align-self-center">
						<p> <h3>{{ $partidos['golesLocalPartido'] }} - {{ $partidos['golesVisitaPartido'] }}</h3></p>
					</div>
			@foreach($clubes as $club)	
				@if($partidos->clubVisitaPartido === $club->idClub)
					<div class="col-4">
						<p>{{ $club['nombreClub'] }} <td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:90px !important; height:90px !important"></td></p>
						
					</div>
				@endif
			@endforeach
		
		</div>

		<div class="row border justify-content-center">
			<h1>INFO</h1>
			<div class="col">
				@foreach($torneos as $tor)
					@foreach($estadios as $est)
						@if (strcmp($partidos->idTorneo, $tor->idTorneo) === 0)
							@if (strcmp($partidos->idEstadio, $est->idEstadio) === 0)


								<p> Competición {{ $tor['nombreTorneo'] }}</p>
								
								<p> Fecha {{ $partidos['fechaPartido'] }}</p>
								<p> Hora {{ $partidos['horaPartido'] }}</p>

								<p> Estadio {{ $est['nombreEstadio'] }}</p>
								<p> Estado {{ $partidos['estadoPartido'] }}</p>
						@endif
						@endif
					@endforeach
				@endforeach

			</div>
		</div>



	@if(($partidos->estadoPartido != 'Suspendido')) <!-- Valida para que crear plantilla de jugadores del partido-->
		<div class="row">
			<div class="col">
				<!----------- SOLO LE MUESTRA ESTA PARTE A LOS USUARIOS DE TIPO user ---------------->
				@if(auth()->user()->authorizeRolesLogin('user')) 
					<!--<form class="form-group" method="POST" action="/historial/{{$partidos->idPartido}}/create" enctype="multipart/form-data">	
						
    					<select name="idPartido" class="form-control">
    				<option disabled selected value>{{$partidos['idPartido']}}</option>
    				
    			</select>-->
							<a href="{{ route('historial.create', $partidos->idPartido)}}" class="btn btn-default">Crear Historial</a>

							<!--<button type="submit" class="btn btn-primary">Crear Plantillas</button>-->


						

                	</form>

				@endif
				<!------------------------------------------------------------------------------------>

			</div>
		</div>		


	@endif
	
	@if(($partidos->estadoPartido != 'Suspendido')) <!-- Valida para que no se muestren jugadores si se suspendió el partido o no se ha jugado-->
		<div class="row border justify-content-center">

			<h1>Plantillas</h1>
			</div>
			<div class="col">
				<div class="row">

					<!------------Plantilla Local------------------------>

					<div class="col-5">
						@foreach($historiales as $hist)
						@foreach($clubes as $club)
							@if($partidos->clubLocalPartido === $club->idClub)
								@foreach($jugadores as $jug)
									@if($club->idClub === $jug->idClub)
									
										@foreach($jugador_partido as $jp)
										<p align="left">{{ $jp->camisetaJugador }}
 {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</p>
 										@endforeach
										
									@endif
								@endforeach
							@endif
						@endforeach
						@endforeach

					</div>
					<!----------------------------------------------------->

									
					<!-----------Plantilla Visita--------------------------->
					<div class="col-5 " align="right">
						@foreach($clubes as $club)
							@if($partidos->clubVisitaPartido === $club->idClub)
								@foreach($jugadores as $jug)
									@if($club->idClub === $jug->idClub)
									<p align="right">{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</p>
									@endif
								@endforeach
							@endif
						@endforeach
					</div>
					<!----------------------------------------------------->

				</div>
			</div>
	@endif
		
	

@endsection