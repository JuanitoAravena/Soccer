<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use App\Asociacion;
use App\Pais;
use App\Arbitro;

class ArbitroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    public function index()
    {
        $arbitros = Arbitro::all();
        $asociaciones=Asociacion::all();
        $paises=Pais::all();
        
        return view('arbitro.index', ['paises' => $paises, 'asociaciones' => $asociaciones, 'arbitros' => $arbitros]);
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
        $asociaciones=Asociacion::all();
        $paises=Pais::all();

        return view('arbitro.create', ['paises' => $paises->toArray(), 'asociaciones' => $asociaciones->toArray()]);
    }
//-------------------------------------------------------------------------------------------------------------------


//----------------Función para guardar un nuevo dato-----------------------------------------------------------------
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arbitro = new Arbitro();
        $arbitro->idAsociacion = $request->input('idAsociacion');
        $arbitro->nombreArbitro = $request->input('nombreArbitro');
        $arbitro->apellidosArbitro = $request->input('apellidosArbitro');
        $arbitro->tipoArbitro = $request->input('tipoArbitro');
        $arbitro->nacimientoArbitro = $request->input('nacimientoArbitro');
        $arbitro->idPais = $request->input('idPais');        
        $arbitro->imagenArbitro = $request->input('imagenArbitro');
        $arbitro->edadArbitro = $request->input('edadArbitro');
        $arbitro->gradoArbitro = $request->input('gradoArbitro');
        
        $arbitro->save();

        return Redirect::to('arbitro');
    }
//-------------------------------------------------------------------------------------------------------------------


//-----------------------
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


//---------------------------------Funcion que retorna las variables para el edit--------------------------------    
    public function edit($id)
    {
        $arbitros = Arbitro::findOrFail($id);
        $asociaciones=Asociacion::all();
        $paises=Pais::all();
        
        return view('arbitro.edit', ['paises' => $paises, 'asociaciones' => $asociaciones, 'arbitros' => $arbitros]);
     
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
       
        $arbitro = Arbitro::findOrFail($id);
        
        $arbitro->idAsociacion = $request->input('idAsociacion');
        $arbitro->nombreArbitro = $request->input('nombreArbitro');
        $arbitro->apellidosArbitro = $request->input('apellidosArbitro');
        $arbitro->tipoArbitro = $request->input('tipoArbitro');
        $arbitro->nacimientoArbitro = $request->input('nacimientoArbitro');
        $arbitro->idPais = $request->input('idPais');        
        $arbitro->imagenArbitro = $request->input('imagenArbitro');
        $arbitro->edadArbitro = $request->input('edadArbitro');
        $arbitro->gradoArbitro = $request->input('gradoArbitro');
        $arbitro->update();

        return Redirect::to('arbitro');

       
       // dd($arbitros);
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
        $arbitros = Arbitro::find($id);
        $arbitros->delete();

        return Redirect::to('arbitro');
    }
}
