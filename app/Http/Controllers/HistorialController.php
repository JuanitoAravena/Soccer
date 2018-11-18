<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Historial;
use App\Jugador;
use App\Partido;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial::all();
        $jugadores=Jugador::all();
        $partidos=Partido::all();
        
        return view('historial.index',  ['historiales' => $historiales,'partidos' => $partidos, 'jugadores' => $jugadores]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jugadores=Jugador::all();
        $partidos=Partido::all();

        return view('historial.create', ['partidos' => $partidos, 'jugadores' => $jugadores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $historial = new Historial();
        $historial->idPartido = $request->input('idPartido');
        $historial->idJugador = $request->input('idJugador');
        $historial->golJugador = $request->input('golJugador');   
        $historial->amarillaJugador = $request->input('amarillaJugador');     
        $historial->rojaJugador = $request->input('rojaJugador');
        $historial->minutosJugador = $request->input('minutosJugador');

        
        $historial->save();

        return Redirect::to('historial');
    }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
