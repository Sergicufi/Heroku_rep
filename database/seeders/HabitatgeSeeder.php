<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class HabitatgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $habitatges = [
            ['user_id' => '1', 'categoria_id' => '1', 'tipuscategoria_id' => 1, 'nom' => 'Casa de Mar', 'm2' => 60, 'capacitat_max' => 10, 'provincia' => 'Barcelona', 'ciutat' => 'Castelldefels', 'codiPostal' => '17136', 'adreça' => 'Major, 4', 'descripcio' => 'Casa gran arran de mar amb unes vistes magnifiques', 'preu' => 200],
            ['user_id' => '2', 'categoria_id' => '1',  'tipuscategoria_id' => 1, 'nom' => 'Casa de Can Palau', 'm2' => 70, 'capacitat_max' => 5, 'provincia' => 'Girona', 'ciutat' => 'Bellcaire', 'codiPostal' => '17130', 'adreça' => 'De La Font, 7', 'descripcio' => 'Petita casa a la pradera en una zona tranquila.', 'preu' => 110],
            ['user_id' => '3', 'categoria_id' => '1',  'tipuscategoria_id' => 1, 'nom' => 'Dúplex Madrid', 'm2' => 80, 'capacitat_max' => 2, 'provincia' => 'Madrid', 'ciutat' => 'Leganes', 'codiPostal' => '17140', 'adreça' => 'Principal, 25', 'descripcio' => "Duplex a Leganés, a prop de l'estadi de Butarque. ", 'preu' => 100],
            ['user_id' => '1', 'categoria_id' => '2',  'tipuscategoria_id' => 1, 'nom' => 'Piset petit a Girona', 'm2' => 90, 'capacitat_max' => 15, 'provincia' => 'Girona', 'ciutat' => 'Girona', 'codiPostal' => '17128', 'adreça' => 'Ovelleria, 9', 'descripcio' => 'Pis per a estudiants universitaris, aprop de la zona de Montilivi.', 'preu' => 130],
            ['user_id' => '2', 'categoria_id' => '2',  'tipuscategoria_id' => 1, 'nom' => 'Cortijo a Badajoz', 'm2' => 100, 'capacitat_max' => 4, 'provincia' => 'Badajoz', 'ciutat' => 'Badajoz', 'codiPostal' => '17126', 'adreça' => 'Rei, 4', 'descripcio' => 'Casa amb jardí a les afores de Badajoz.', 'preu' => 140],
            ['user_id' => '2', 'categoria_id' => '2',  'tipuscategoria_id' => 1, 'nom' => 'Casa aprop del mar a Tarragona', 'm2' => 120, 'capacitat_max' => 6, 'provincia' => 'Tarragona', 'ciutat' => 'Tarragona', 'codiPostal' => '17160', 'adreça' => 'Pelai sisè, 15', 'descripcio' => 'Petita casa arran de mar a Tarragona amb platjes aprop', 'preu' => 90],
        ];

        DB::table('habitatges')->insert($habitatges);
    }
}
