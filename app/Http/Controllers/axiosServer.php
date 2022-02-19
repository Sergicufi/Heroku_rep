<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Habitatge;
use \App\Models\Favorit;
use \App\Models\Lloguer;
use Auth;

class axiosServer extends Controller
{
    function searchBar(Request $request) {
        $valor = $request->get('search');
        $valor = "%{$valor}%";

        $user_id = Auth::user()->id;

        $habitatge = Habitatge::where('nom', 'like', $valor)
        ->where('user_id', '=', $user_id)
        ->get();
        
        return $habitatge;
    }

    function searchBar2(Request $request) {
        $valor = $request->get('search');
        $valor = "%{$valor}%";

        $user_id = Auth::user()->id;

        $reserva = Habitatge::join('lloguers', 'lloguers.habitatge_id', '=', 'habitatges.id')
                            ->select('habitatges.nom as nom_habitatge', 'habitatges.id as habitatge_id', 'habitatges.descripcio as des_habitatge')
                            ->where('lloguers.user_id', '=', $user_id)
                            ->where('habitatges.nom', 'like', $valor)
                            ->get();
                            
        return $reserva;
    }

    function checkFav(Request $request) {
        $user_id = $request->get('user_id');
        $habitatge_id = $request->get('habitatge_id');
        $type = '';

        $esFav = Favorit::where('user_id', '=', $user_id)
                        ->where('habitatge_id', '=', $habitatge_id)
                        ->get();

        if (count($esFav) !== 0) {
            $type = 'favorite';
        } else {
            $type = 'favorite_border';
        }

        return $type;
    }

    function checkFav2(Request $request) {
        $user_id = $request->get('user_id');
        $habitatge_id = $request->get('habitatge_id');

        $rmFav = Favorit::where('habitatge_id', '=', $habitatge_id)
                        ->where('user_id', '=', $user_id);
        $rmFav->delete();
    }

    function checkFav3(Request $request) {
        $user_id = $request->get('user_id');
        $habitatge_id = $request->get('habitatge_id');

        $Favorit = new Favorit;
        $Favorit->habitatge_id = $habitatge_id;
        $Favorit->user_id = $user_id;
        $Favorit->save();
    }
}