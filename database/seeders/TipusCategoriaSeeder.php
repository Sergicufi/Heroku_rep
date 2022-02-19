<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class TipusCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipusCat = [
            ['nom' => 'Habitació'],
            ['nom' => 'Allotjament Sencer'],
            ['nom' => 'Planta'],
        ];

        DB::table('tipuscategorias')->insert($tipusCat);
    }
}
