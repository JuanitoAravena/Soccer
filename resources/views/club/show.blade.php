
@extends ('layouts.app')

@section ('titulo', 'Clubes' .$clubes->idClub)

@section ('content')
		
		<div class="row">
			<div class="col">
				<p> 
					<h1 class="float-sm-left">{{ $clubes['nombreClub'] }}</h1>
					<img src="{{asset('images/club/' .$clubes->imagenClub)}}" class="img-responsive float-sm-right" style="width:90px !important; height:90px !important">
				</p>
			</div>
		</div>
		<div class="col">
			<p></p>
			<p> Fundación {{ $clubes['fundacionClub'] }}</p>
			

			<p> Sede {{ $clubes['sedeClub'] }}, 
				@foreach($ciudades as $ciu)
					@if($clubes->idCiudad === $ciu->idCiudad)
						{{ $ciu['nombreCiudad'] }},
					@endif
				@endforeach
				@foreach($paises as $pais)
					@if($clubes->idPais === $pais->idPais)
						{{ $pais['nombrePais'] }}
					@endif
				@endforeach
			</p>


			
			<p> Contacto {{ $clubes['correoClub'] }} // {{ $clubes['telefonoClub'] }} </p>
		</div>

		<div class="row">
			<div class="col">
				<p><h3 class="float-sm-left">Estadio</h3></p>
			</div>
		</div>
		
		<div class="col">
			@foreach($estadios as $est)
				@if($clubes->idEstadio === $est->idEstadio)
					<p>Nombre {{ $est['nombreEstadio'] }}</p>
					@foreach($ciudades as $ciu)
						@if($est->idCiudad === $ciu->idCiudad)
							<p>Ciudad {{ $ciu['nombreCiudad'] }}</p></p>
						@endif
					@endforeach
					@foreach($paises as $pais)
						@if($est->idPais === $pais->idPais)
							<p>País {{ $pais['nombrePais'] }}</p>
						@endif
					@endforeach
					<p>Inauguración {{ $est['inauguracionEstadio'] }}</p>
					<p>Capacidad {{ $est['capacidadEstadio'] }}</p>
				@endif
			@endforeach
		</div>
		
		<div class="row">
			<div class="col">
				<p><h3 class="float-sm-left">Plantilla</h3></p>


			</div>




		</div>

		

@endsection