<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('prueba ', 'TestController@prueba');


//--------------Rutas de Club---------------//
Route::resource('club','ClubController');
Route::get('club/{idClub}/destroy',[
	'uses'	=>	'ClubController@destroy',
	'as'	=>	'club.destroy'
]);

//--------------Rutas de Pais---------------//

Route::resource('pais','PaisController');
Route::get('pais/{idPais}/destroy',[
	'uses'	=>	'PaisController@destroy',
	'as'	=>	'pais.destroy'
]);


//--------------Rutas de Asociacion---------------//

Route::resource('asociacion','AsociacionController');
Route::get('asociacion/{idAsociacion}/destroy',[
	'uses'	=>	'AsociacionController@destroy',
	'as'	=>	'asociacion.destroy'
]);

//--------------Rutas de Confederacion---------------//

Route::resource('confederacion','ConfederacionController');
Route::get('confederacion/{idConfederacion}/destroy',[
	'uses'	=>	'ConfederacionController@destroy',
	'as'	=>	'confederacion.destroy'
]);

//--------------Rutas de Federacion---------------//

Route::resource('federacion','FederacionController');
Route::get('federacion/{idFederacion}/destroy',[
	'uses'	=>	'FederacionController@destroy',
	'as'	=>	'federacion.destroy'
]);

//--------------Rutas de Estadio---------------//

Route::resource('estadio','EstadioController');
Route::get('estadio/{idEstadio}/destroy',[
	'uses'	=>	'EstadioController@destroy',
	'as'	=>	'estadio.destroy'
]);


//--------------Rutas de Ciudad---------------//
Route::resource('ciudad','CiudadController');
Route::get('ciudad/{idCiudad}/destroy',[
	'uses'	=>	'CiudadController@destroy',
	'as'	=>	'ciudad.destroy'
]);


//--------------Rutas de Arbitro---------------//
Route::resource('arbitro','ArbitroController');
Route::get('arbitro/{idArbitro}/destroy',[
	'uses'	=>	'ArbitroController@destroy',
	'as'	=>	'arbitro.destroy'
]);


//--------------Rutas de Jugador---------------//
Route::resource('jugador','JugadorController');
Route::get('jugador/{idJugador}/destroy',[
	'uses'	=>	'JugadorController@destroy',
	'as'	=>	'jugador.destroy'
]);


//--------------Rutas de DT---------------//
Route::resource('directortecnico','DirectorTecnicoController');
Route::get('directortecnico/{idDirectorTecnico}/destroy',[
	'uses'	=>	'DirectorTecnicoController@destroy',
	'as'	=>	'directortecnico.destroy'
]);


//--------------Rutas de Partido---------------//
Route::resource('partido','PartidoController');
Route::get('partido/{idPartido}/destroy',[
	'uses'	=>	'PartidoController@destroy',
	'as'	=>	'partido.destroy'
]);
Route::get('partido/{idPartido}/show',[
	'uses'	=>	'PartidoController@show',
	'as'	=>	'partido.show'
]);


//--------------Rutas de Torneo---------------//
Route::resource('torneo','TorneoController');
Route::get('torneo/{idTorneo}/destroy',[
	'uses'	=>	'TorneoController@destroy',
	'as'	=>	'torneo.destroy'
]);


//--------------Rutas de Historial---------------//
//***********************************************//
Route::resource('historial','HistorialController');
Route::get('historial/{idHistorial}/destroy',[
	'uses'	=>	'HistorialController@destroy',
	'as'	=>	'historial.destroy'
]);


//--------------Rutas de User---------------//
Route::resource('user','UserController');
Route::get('user/{idPais}/destroy',[
	'uses'	=>	'UserController@destroy',
	'as'	=>	'user.destroy'
]);




















/*Route::get('continentes', [
	'as' =>  'continentes',
	'uses' => 'UserController@index'
]);

Route::group(['prefix'=>'continente'], function(){

	Route::get('view/{idContinente}', [
		'uses' => 'TestController@view',
		'as' => 'continenteView'	
	]);
});
Route::get('/name/{name}/lastname/{lastname?}', function($name, $lastname = 'Aravena'){
	return 'Hola soy ' .$name .$lastname;
});
Route::get('/mi_primer_ruta', function(){
	return 'Hello world.';
} );
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');