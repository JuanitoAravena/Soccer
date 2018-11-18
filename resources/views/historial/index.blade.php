
@extends ('layouts.app')

@section ('titulo', 'Historiales')

@section ('content')
	<a href="/historial/create" class="btn btn-default">Crear Historial</a>
	
	<div class="row">
		<div class="col">
			<ul class="list-group">
				@foreach($historiales as $hist)
					@if($hist->idJugador === $jugadores->idJugador))
						<div class="row">
							<table class="table table-striped">
								<thead>
									<th>Id Partido</th>
									<th>id Jugador</th>
									<th>gol Jugador</th>
									<th>amarilla</th>
									<th>roja</th>
									<th>minutos</th>


									
									
									
									<th>Acción</th>
									
								</thead>
								<tbody>
									@foreach($torneos as $tor)
										<tr>
											<td>{{ $tor['idTorneo'] }}</td>
											<td>{{ $tor['nombreTorneo'] }}</td>
											<td>{{ $tor['edicion'] }}</td>
											<td>{{ $tor['idConfederacion'] }}</td>
											<td>{{ $tor['idAsociacion'] }}</td>
											<td>{{ $tor['idClubCampeon'] }}</td>		


											
											<td>
												<a href="" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a>
												<a href="{{ route('torneo.destroy', $tor->idTorneo)}}" onclick="return confirm('¿Estás seguro que deseas eliminar el Torneo?')" class="btn btn-danger"></a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@endif
				@endforeach
			</ul>
		</div>		
	</div>




@endsection