<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Pais;
use App\Club;
use App\Jugador;


class JugadorController extends Controller
{


//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugador::all();
        $paises=Pais::all();
        $clubes=Club::all();

        return view('jugador.index', ['paises' => $paises, 'jugadores' => $jugadores, 'clubes' => $clubes]);

    }
//-------------------------------------------------------------------------------------------------------------------


//------Función que retorna las variables para la vista create-------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubes=Club::all();
        $paises=Pais::all();

        return view('jugador.create', ['clubes' => $clubes->toArray(), 'paises' => $paises->toArray()]);
    }
//------------------------------------------------------------------------------------------------------------------


//----------------Función para guardar un nuevo dato-----------------------------------------------------------------

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jugador = new Jugador();
        $jugador->nombreJugador = $request->input('nombreJugador');
        $jugador->apellidosJugador = $request->input('apellidosJugador');
        $jugador->nacimientoJugador = $request->input('nacimientoJugador');
        $jugador->edadJugador = $request->input('edadJugador');
        $jugador->posicionJugador = $request->input('posicionJugador');
        $jugador->alturaJugador = $request->input('alturaJugador');
        $jugador->pesoJugador = $request->input('pesoJugador');
        $jugador->pieJugador = $request->input('pieJugador');
        $jugador->idClub = $request->input('idClub');
        $jugador->golesJugador = $request->input('golesJugador');
        $jugador->amarillasJugador = $request->input('amarillasJugador');
        $jugador->rojasJugador = $request->input('rojasJugador');
        $jugador->minutostotalesJugador = $request->input('minutostotalesJugador');        
        $jugador->imagenJugador = $request->input('imagenJugador');        
        $jugador->idPais = $request->input('idPais');        
        
        $jugador->save();

        return Redirect::to('jugador');

    }
//-------------------------------------------------------------------------------------------------------------------

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



//---------------------------------Funcion que retorna las variables para el edit--------------------------------    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugadores = Jugador::findOrFail($id);
        $clubes=Club::all();
        $paises=Pais::all();
        
        return view('jugador.edit', ['paises' => $paises, 'jugadores' => $jugadores, 'clubes' => $clubes]);
    }
//-------------------------------------------------------------------------------------------------------------------



//---------------------Funcion actualizar un dato-------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jugador = Jugador::findOrFail($id);
        
        $jugador->nombreJugador = $request->input('nombreJugador');
        $jugador->apellidosJugador = $request->input('apellidosJugador');
        $jugador->nacimientoJugador = $request->input('nacimientoJugador');
        $jugador->edadJugador = $request->input('edadJugador');
        $jugador->posicionJugador = $request->input('posicionJugador');
        $jugador->alturaJugador = $request->input('alturaJugador');
        $jugador->pesoJugador = $request->input('pesoJugador');
        $jugador->pieJugador = $request->input('pieJugador');
        $jugador->idClub = $request->input('idClub');
        $jugador->golesJugador = $request->input('golesJugador');
        $jugador->amarillasJugador = $request->input('amarillasJugador');
        $jugador->rojasJugador = $request->input('rojasJugador');
        $jugador->minutostotalesJugador = $request->input('minutostotalesJugador');        
        $jugador->imagenJugador = $request->input('imagenJugador');        
        $jugador->idPais = $request->input('idPais');        
  
        $jugador->update();

        return Redirect::to('jugador');
    }
//-------------------------------------------------------------------------------------------------------------------


//-------------------Funcion para eliminar (borrado fisico)------------------------------------------------------- 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugadores = Jugador::find($id);
        $jugadores->delete();

        return Redirect::to('jugador');
    }
}
