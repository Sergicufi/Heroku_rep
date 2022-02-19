<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotos = [
            ['habitatge_id' => 1, 'nom' => 'casa1', 'ruta' => './img/allotjaments/'],
            ['habitatge_id' => 2, 'nom' => 'casa1', 'ruta' => './img/allotjaments/'],
            ['habitatge_id' => 3, 'nom' => 'casa1', 'ruta' => './img/allotjaments/'],
            ['habitatge_id' => 4, 'nom' => 'casa1', 'ruta' => './img/allotjaments/'],
            ['habitatge_id' => 5, 'nom' => 'casa1', 'ruta' => './img/allotjaments/'],
            ['habitatge_id' => 6, 'nom' => 'casa1', 'ruta' => './img/allotjaments/'],
        ];

        DB::table('fotos')->insert($fotos);
    }
}
