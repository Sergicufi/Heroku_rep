<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Habitatge;
use \App\Models\Foto;
use \App\Models\HabitatgeServei;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

class ValidationFormController extends Controller
{
    // crear un nou habitatge
    public function newAccommodation(Request $request) {

        // realitzem validacions
        $request->validate([
            'nom' => 'required|min:5|max:20',
            'tipo' => 'required',
            'espai' => 'required',
            'imatges' => 'required',
            'descripcio' => 'required|min:30|max:500',
            'hostes' => 'required|numeric|min:1',
            'm2' => 'numeric|min:5|required',
            'preu' => 'required|numeric|min:1',
            'provincia' => 'required|min:3',
            'poblacio' => 'required|min:2',
            'codipostal' => 'required|min:4',
            'adreça' => 'required|min:3'
        ]);

        // agafem variables
        $user_id = $request->get('user_id');
        $nom = $request->get('nom');
        $tipo = $request->get('tipo');
        $espai = $request->get('espai');
        $imatges = $request->file('imatges');
        $descripcio = $request->get('descripcio');
        $serveis = $request->get('checkbox-list');
        $hostes = $request->get('hostes');
        $m2 = $request->get('m2');
        $preu = $request->get('preu');
        $provincia = $request->get('provincia');
        $poblacio = $request->get('poblacio');
        $codipostal = $request->get('codipostal');
        $adreça = $request->get('adreça');

        // inserim les dades del l'habitatge a la corresponguent taula
        $nouHabitatge = new Habitatge;
        $nouHabitatge->nom = $nom;
        $nouHabitatge->user_id = $user_id;
        $nouHabitatge->categoria_id = $tipo;
        $nouHabitatge->tipuscategoria_id = $espai;
        $nouHabitatge->m2 = $m2;
        $nouHabitatge->capacitat_max = $hostes;
        $nouHabitatge->provincia = $provincia;
        $nouHabitatge->ciutat = $poblacio;
        $nouHabitatge->codiPostal = $codipostal;
        $nouHabitatge->adreça = $adreça;
        $nouHabitatge->descripcio = $descripcio;
        $nouHabitatge->preu = $preu;
        $nouHabitatge->save();

        // agafem l'id del nou habitatge inserit
        $habitatge_id = $nouHabitatge->id;

        // inserim i vinculem les fotos amb l'habitatge
        $nomImatges = array();
        if ($request->hasFile('imatges')) {
            foreach ($request->file('imatges') as $arxiu) {
                $arxiu->move("./img/allotjaments", $nom . "_" . $arxiu->getClientOriginalName());
                $novaFoto = new Foto;
                $novaFoto->habitatge_id = $habitatge_id;
                $novaFoto->nom = $nom . "_" . $arxiu->getClientOriginalName();
                $novaFoto->ruta = "./img/allotjaments/";
                $novaFoto->save();
            }
        }

        // inserim i vinculem els serveis amb l'habitatge
        foreach($serveis as $servei) {
            $nouServei = new HabitatgeServei;
            $nouServei->habitatge_id = $habitatge_id;
            $nouServei->servei_id = $servei;
            $nouServei->save();       
        }

        return redirect('/Allotjaments?id='.$user_id);
    }
    // editar un habitatge
    function editAccommodation(Request $request) {

        // fem validacions
        $request->validate([
            'nom' => 'required|min:5|max:20',
            'tipo' => 'required',
            'espai' => 'required',
            'descripcio' => 'required|min:30|max:500',
            'hostes' => 'required|numeric|min:1',
            'm2' => 'numeric|min:5|required',
            'preu' => 'required|numeric|min:1',
            'provincia' => 'required|min:3',
            'poblacio' => 'required|min:2',
            'codipostal' => 'required|min:4',
            'adreça' => 'required|min:3'
        ]);

        // agafem variables
        $habitatge_id = $request->get('habitatge_id');
        $user_id = $request->get('user_id');
        $nom = $request->get('nom');
        $tipo = $request->get('tipo');
        $espai = $request->get('espai');
        $imatges = $request->file('imatges');
        $descripcio = $request->get('descripcio');
        $serveis = $request->get('checkbox-list');
        $hostes = $request->get('hostes');
        $m2 = $request->get('m2');
        $preu = $request->get('preu');
        $provincia = $request->get('provincia');
        $poblacio = $request->get('poblacio');
        $codipostal = $request->get('codipostal');
        $adreça = $request->get('adreça');
        $eliminar = $request->get('rmImgBtn');

        // Eliminarem totes les imatges
        if ($eliminar) {
            $rmFoto = Foto::where('habitatge_id', '=', $habitatge_id);
            $rmFoto->delete();
        }

        // Publiquem les noves imatges
        $nomImatges = array();
        if ($request->hasFile('imatges')) {
            foreach ($request->file('imatges') as $arxiu) {
                $arxiu->move("./img/allotjaments", $nom . "_" . $arxiu->getClientOriginalName());
                $novaFoto = new Foto;
                $novaFoto->habitatge_id = $habitatge_id;
                $novaFoto->nom = $nom . "_" . $arxiu->getClientOriginalName();
                $novaFoto->ruta = "./img/allotjaments/";
                $novaFoto->save();
            }
        }

        // borrem tots els serveis registrats
        $rmServei = HabitatgeServei::where('habitatge_id', '=', $habitatge_id);
        $rmServei->delete();

        // inserim nous serveis
        foreach($serveis as $servei) {
            $nouServei = new HabitatgeServei;
            $nouServei->habitatge_id = $habitatge_id;
            $nouServei->servei_id = $servei;
            $nouServei->save();       
        }

        // editem les dades del l'habitatge a la corresponguent taula
        $res = DB::table('habitatges')
                 ->where('id', '=', $habitatge_id)
                 ->update(['nom' => $nom,
                           'categoria_id' => $tipo,
                           'tipuscategoria_id' => $espai,
                           'm2' => $m2,
                           'capacitat_max' => $hostes,
                           'provincia' => $provincia,
                           'ciutat' => $poblacio,
                           'codiPostal' => $codipostal,
                           'adreça' => $adreça,
                           'descripcio' => $descripcio,
                           'preu' => $preu
                        ]);

        return redirect('/Allotjaments?id='.$user_id);
    }
}
