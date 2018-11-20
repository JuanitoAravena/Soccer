<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Partido;
use App\Club;
use App\Asociacion;
use App\Estadio;
use App\Ciudad;
use App\Pais;
use App\Torneo;
use App\Arbitro;



class PartidoController extends Controller
{
//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::all();
        $clubes=Club::all();
        $torneos=Torneo::all();
        
        //Ordenar los partidos por dia
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $year = $hoy['year'];
        $fecha = "$year"."-"."$mes"."-"."$dia";
        





        return view('partido.index',  ['partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'fecha' =>$fecha]);


    }
//-------------------------------------------------------------------------------------------------------------------


//------Función que retorna las variables para la vista create-------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();

        return view('partido.create', ['asociaciones' => $asociaciones->toArray(), 'ciudades' => $ciudades->toArray(), 'clubes' => $clubes->toArray(), 'estadios' => $estadios->toArray(), 'paises' => $paises->toArray(), 'torneos' => $torneos->toArray(), 'arbitros' => $arbitros->toArray()]);
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
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partido = new Partido();
        $partido->clubLocalPartido = $request->input('clubLocalPartido');
        $partido->clubVisitaPartido = $request->input('clubVisitaPartido');
        $partido->fechaPartido = $request->input('fechaPartido');
        $partido->horaPartido = $request->input('horaPartido');
        $partido->jornadaPartido = $request->input('jornadaPartido');
        $partido->idEstadio = $request->input('idEstadio');
        $partido->idArbitroCentral = $request->input('idArbitroCentral');
        $partido->idTorneo = $request->input('idTorneo');        
        $partido->TipoPartido = $request->input('TipoPartido');
        $partido->golesVisitaPartido = $request->input('golesVisitaPartido');
        $partido->golesLocalPartido = $request->input('golesLocalPartido');
        $partido->estadoPartido = $request->input('estadoPartido');
        $partido->idArbitroAsistente1 = $request->input('idArbitroAsistente1');
        $partido->idArbitroAsistente2 = $request->input('idArbitroAsistente2');
        $partido->idCuartoArbitro = $request->input('idCuartoArbitro');


        
        $partido->save();

        return Redirect::to('partido');
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

        $partidos = Partido::findOrFail($id);
       
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();

        return view('partido.show',['partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'id' => $id, 'estadios' => $estadios]);
                
    }



//---------------------------------Funcion que retorna las variables para el edit--------------------------------    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partidos = Partido::findOrFail($id);
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();
        
        return view('partido.edit', ['partidos' => $partidos,'asociaciones' => $asociaciones, 'ciudades' => $ciudades, 'clubes' => $clubes, 'estadios' => $estadios, 'paises' => $paises, 'torneos' => $torneos, 'arbitros' => $arbitros]);
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
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partido = Partido::findOrFail($id);
        
        $partido->clubLocalPartido = $request->input('clubLocalPartido');
        $partido->clubVisitaPartido = $request->input('clubVisitaPartido');
        $partido->fechaPartido = $request->input('fechaPartido');
        $partido->horaPartido = $request->input('horaPartido');
        $partido->jornadaPartido = $request->input('jornadaPartido');
        $partido->idEstadio = $request->input('idEstadio');
        $partido->idArbitroCentral = $request->input('idArbitroCentral');
        $partido->idTorneo = $request->input('idTorneo');        
        $partido->TipoPartido = $request->input('TipoPartido');
        $partido->golesVisitaPartido = $request->input('golesVisitaPartido');
        $partido->golesLocalPartido = $request->input('golesLocalPartido');
        $partido->estadoPartido = $request->input('estadoPartido');
        $partido->idArbitroAsistente1 = $request->input('idArbitroAsistente1');
        $partido->idArbitroAsistente2 = $request->input('idArbitroAsistente2');
        $partido->idCuartoArbitro = $request->input('idCuartoArbitro');
  
        $partido->update();

        return Redirect::to('partido');
    }
//-------------------------------------------------------------------------------------------------------------------


//-------------------Funcion para eliminar (borrado fisico)------------------------------------------------------- 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partidos = Partido::find($id);
        $partidos->delete();

        return Redirect::to('partido');
    }
}
