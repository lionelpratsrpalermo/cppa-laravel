<?php

namespace App\Legacy;

use Illuminate\Support\Facades\DB;
use Html2Text\Html2Text;

class Player
{
    function allPlayers()
    {
        $players = DB::table('jugador')
            ->select('id', 'apellido', 'nombre')->get();
        return $players;
    }
}
