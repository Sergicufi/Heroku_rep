<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use \App\Models\Servei;
use \App\Models\Habitatge;
use \App\Models\HabitatgeServei;
use \App\Models\Categoria;
use \App\Models\Tipuscategoria;
use \App\Models\Favorit;
use \App\Models\Foto;
use \App\Models\Lloguer;
use Auth;

class redirectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() !== null) {
            $user_id = Auth::user()->id;
        }

        $habitatges = @Habitatge::limit(6)
                                ->get();

        $favorits = @Favorit::join('users', 'user_id', '=', 'users.id')
        ->join('habitatges', 'habitatge_id', '=', 'habitatges.id')
        ->select('habitatges.nom as nom', 'favorits.habitatge_id')
        ->where('users.id', '=', $user_id)
        ->get();

        return view('index', 
            ['NomHabitatges' => $habitatges,
             'favorits' => $favorits]);
    
    }

    public function aboutUs()
    {
        return view('aboutUs');
    
    }
    
        /**
     * Creem un mètode que ens retornarà una sèrie d'allotjaments.
     * depenent de la busqueda que faci l'usuari. 
     * Fitrarà per nom, dates i Numero d'hostes.
     *
     * 
     */
    public function search()
    {

    $ubicacio = htmlentities($_GET['ubicacio']);
    $arribada = htmlentities($_GET['arribada']);
    $sortida = htmlentities($_GET['sortida']);
    $persones = htmlentities($_GET['persones']);
    $var = "{$ubicacio}%";

    $var1 = Habitatge::leftjoin('lloguers', 'habitatge_id', '=', 'habitatges.id')
    ->select('lloguers.dataEntrada')
    ->get();

    $var2 = Habitatge::leftjoin('lloguers', 'habitatge_id', '=', 'habitatges.id')
    ->select('lloguers.dataSortida')
    ->get();
    

    if(isset($var1) && isset($var2)){

        $habQuery = Habitatge::leftjoin('lloguers', 'habitatge_id', '=', 'habitatges.id')
        ->select('habitatges.id','habitatges.nom', 'habitatges.descripcio')
        ->where('habitatges.capacitat_max', '>=', $persones)
        ->whereNotBetween('lloguers.dataEntrada', [$arribada, $sortida])
        ->whereNotBetween('lloguers.dataSortida', [$arribada, $sortida])
        ->where(function($query)
        {
            $ubicacio = htmlentities($_GET['ubicacio']);
            $arribada = htmlentities($_GET['arribada']);
            $sortida = htmlentities($_GET['sortida']);
            $persones = htmlentities($_GET['persones']);
            $var = "{$ubicacio}%";
            $query->where('habitatges.provincia', 'like', $var)
            ->orWhere('habitatges.ciutat', 'like', $var)
            ->orWhere('habitatges.nom', 'like', $var);
        })->get();

    } else {
        $habQuery = Habitatge::leftjoin('lloguers', 'habitatge_id', '=', 'habitatges.id')
        ->select('habitatges.id','habitatges.nom', 'habitatges.descripcio')
        ->where('habitatges.capacitat_max', '>=', $persones)
        ->where(function($query)
        {
            $ubicacio = htmlentities($_GET['ubicacio']);
            $arribada = htmlentities($_GET['arribada']);
            $sortida = htmlentities($_GET['sortida']);
            $persones = htmlentities($_GET['persones']);
            $var = "{$ubicacio}%";
            $query->where('habitatges.provincia', 'like', $var)
            ->orWhere('habitatges.ciutat', 'like', $var)
            ->orWhere('habitatges.nom', 'like', $var);
        })->get();
        
    }


    
    return view('search',
    ['ubi' => $ubicacio],
    ['hab' => $habQuery]);
    
    }
    // redirect a pàgina vista allotjament
    public function vistaAllotjament(Request $request)
    {
        $login = false;
        // mirem si l'usuari esta logat
        if (isset(Auth::user()->id)) {
            $idUsuari = Auth::user()->id;
            $login = true;
        }
        $id = $request->get('id');

        $consultaHabitatge = Habitatge::find($id);

        $fotos = Foto::join('habitatges', 'habitatge_id', '=', 'habitatges.id')
                        ->select('fotos.*')
                        ->where('habitatges.id', '=', $id)
                        ->limit(5)
                        ->get();
        
        $consultaServei = HabitatgeServei::join('habitatges', 'habitatge_id', '=', 'habitatges.id')
        ->join('serveis', 'servei_id', '=', 'serveis.id')
        ->join('categorias', 'habitatges.categoria_id', '=', 'categorias.id')
        ->select('serveis.nom as Serveis', 'serveis.icona', 'categorias.nom as Categoria')
        ->where('habitatges.id','=', $id)
        ->get(); 
        // si està logat i és el propietari de l'habitatge, afegirem dos botons: editar i eliminar.
        if($login) {
            if ($consultaHabitatge['user_id'] == $idUsuari) {
            echo "<div class='buttons-container'><a class='editBtn' href='/editAccommodation?id=$id'><em class='material-icons'>edit</em></a>";
            echo "<a class='removeBtn' href='#'><em class='material-icons'>delete</em></a></div>";
            }
        }

        return view('vistaAllotjament',
            ['consultaHabitatge' => $consultaHabitatge],
            ['consultaServei' => $consultaServei],
            ['consultaFoto' => $fotos]);
    }
    // redirect a pàgina per completar una reserva
    public function completarReserva(Request $request)
    {

        $id = $request->get('id');
        $arribada = $request->get('arribada');
        $sortida = $request->get('sortida');
        $dArribada = date_create($arribada);
        $dSortida = date_create($sortida);
        $dies = date_diff($dArribada, $dSortida)->format('%a');

        $consultaHabitatge = @Habitatge::find($id);
        $capacitat_max = $consultaHabitatge['capacitat_max'];

        $request->validate([
            'arribada' => 'required',
            'sortida' => 'required',
            'persones' => 'required|min:1'
        ]);
        
        $consultaServei = @HabitatgeServei::join('habitatges', 'habitatge_id', '=', 'habitatges.id')
        ->join('serveis', 'servei_id', '=', 'serveis.id')
        ->join('categorias', 'habitatges.categoria_id', '=', 'categorias.id')
        ->select('serveis.nom as Serveis', 'serveis.icona', 'categorias.nom as Categoria')
        ->where('habitatges.id','=', $id)
        ->get(); 

        return view('completarReserva',
            ['dies' => $dies],
            ['consultaHabitatge' => $consultaHabitatge],
            ['consultaServei' => $consultaServei]);
    }
    // redirect a la pàgina de habitatges
    public function allotjaments(Request $request)
    {
        $user_id = $request->get('id');

        $allotjaments = @Habitatge::join('users', 'user_id', '=', 'users.id')
        ->select('habitatges.*')
        ->where('users.id', '=', $user_id)
        ->get();

        $fotos = Foto::join('habitatges', 'habitatge_id', '=', 'habitatges.id')
                        // ->where()
                        ->get();

        return view('allotjaments',
            ['allotjaments' => $allotjaments]);
    }
    // redirect a crear nou habitatge
    public function newAccommodation(Request $request)
    {
        $serveis = Servei::get();
        $categories = Categoria::get();
        $tipuscat = Tipuscategoria::get();

        return view('newAccommodation', 
            ['llistaServeis' => $serveis,
             'llistacategories' => $categories,
             'llistatipuscat' => $tipuscat]);
    }
    // redirect a editar un habitatge
    public function editAccommodation(Request $request)
    {
        // id habitatge
        $habitatge_id = $_GET['id'];
        // totes les dades del habitatge segons l'id
        $consultaHabitatge = @Habitatge::find($habitatge_id);
        // obtenim tots els serveis existents
        $serveis = @Servei::get();
        // obtenim totes les categories existents i la actual
        $categoriaTotal = @Categoria::get();
        $tipoAllotjaments = @Habitatge::join('categorias', 'categoria_id', '=', 'categorias.id')
                                      ->select('categorias.nom', 'categorias.id')
                                      ->where('habitatges.id', '=', $habitatge_id)
                                      ->get();
        // obtenim tots els tipus de categories existens i la actual
        $tipusTotal = @Tipuscategoria::get();
        $tipusActual = @Habitatge::join('tipuscategorias', 'tipuscategoria_id', '=', 'tipuscategorias.id')
                                      ->select('tipuscategorias.nom', 'tipuscategorias.id')
                                      ->where('habitatges.id', '=', $habitatge_id)
                                      ->get();

        return view('editAccommodation', 
            ['habitatgeId' => $habitatge_id,
             'categoriaTotal' => $categoriaTotal,
             'categoriaActual' => $tipoAllotjaments,
             'serveis' => $serveis,
             'tipusActual' => $tipusActual,
             'tipusTotal' => $tipusTotal,
             'consultaHabitatge' => $consultaHabitatge]);       

    }
    // eliminar un habitatge
    public function removeAccommodation(Request $request) {
        $user_id = $request->get('user_id');
        $habitatge_id = $request->get('habitatge_id');
        
        // borrar fotos
        $rmFoto = Foto::where('habitatge_id', '=', $habitatge_id);
        $rmFoto->delete();

        // borrar relació a favorits
        $rmFav = Favorit::where('habitatge_id', '=', $habitatge_id);
        $rmFav->delete();

        // borrar possibles lloguers
        $rmLloguer = Lloguer::where('habitatge_id', '=', $habitatge_id);
        $rmLloguer->delete();

        // borrar habitatge
        $rmHabitatge = Habitatge::where('id', '=', $habitatge_id);
        $rmHabitatge->delete();

        return redirect('/Allotjaments?id='.$user_id);
    }
    // redirect a favorits
    public function favorits(Request $request)
    {
        $user_id = $request->get('id');

        // agafem els favorits en relació al usuari
        $favorits = @Favorit::join('users', 'user_id', '=', 'users.id')
        ->join('habitatges', 'habitatge_id', '=', 'habitatges.id')
        ->select('habitatges.nom as nom', 'favorits.habitatge_id')
        ->where('users.id', '=', $user_id)
        ->get();

        return view('favorits',
            ['favorits' => $favorits]);        
    
    }
    // redirect a pàgina de reserves
    public function reserva(Request $request)
    {
        $user_id = $request->get('id');

        // agafem les reserves de l'usuari
        $reserva = Lloguer::join('users', 'user_id', '=', 'users.id')
        ->join('habitatges', 'habitatge_id', '=', 'habitatges.id')
        ->select('lloguers.*', 'habitatges.nom as nom_habitatge', 'habitatges.descripcio as des_habitatge')
        ->where('users.id', '=', $user_id)
        ->get();

        return view('reserva', 
        ['reserva' => $reserva]);

    }
}


