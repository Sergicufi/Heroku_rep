<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['nom' => 'Casa'],
            ['nom' => 'Pis'],
        ];

        DB::table('categorias')->insert($categories);
    }
}
