
@extends ('layouts.app')

@section ('titulo', 'Partidos')

@section ('content')
		<div class="row">
			<h1>INFO</h1>
			<div class="col">
				@foreach($partidos as $part)
					


								<p> Competición {{ $part['nombreTorneo'] }}</p>
								
								<p> Fecha {{ $part['fechaPartido'] }}</p>
								<p> Hora {{ $part['horaPartido'] }}</p>

								<p> Estadio {{ $part['idEstadio'] }}</p>
								<p> Estado {{ $part['estadoPartido'] }}</p>
					
				@endforeach

			</div>
		</div>

@endsection