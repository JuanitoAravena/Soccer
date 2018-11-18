<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = "Historiales";

    protected $primaryKey=['idPartido', 'idJugador'];

    protected $fillable = ['golJugador', 'amarillaJugador', 'rojaJugador', 'minutosJugador'];

    public $timestamps = false;

    public function jugadores()
    {
        return $this->belongsTo('App\Jugador','idJugador');
    }
    public function partidos()
    {
        return $this->belongsTo('App\Partido','idPartido');
    }

}

