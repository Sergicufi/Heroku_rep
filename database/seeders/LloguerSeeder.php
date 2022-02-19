<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class LloguerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lloguers = [
            ['id' => '1', 'habitatge_id' => '1', 'user_id' => '1', 'preu' => 70, 'dataEntrada' => '2022-02-16', 'dataSortida' => '2022-02-18'],
            ['id' => '2', 'habitatge_id' => '4', 'user_id' => '2', 'preu' => 80, 'dataEntrada' => '2022-02-20', 'dataSortida' => '2022-02-25'],
            ['id' => '3', 'habitatge_id' => '5', 'user_id' => '3', 'preu' => 30, 'dataEntrada' => '2022-02-15', 'dataSortida' => '2022-02-21'],
            ['id' => '4', 'habitatge_id' => '2', 'user_id' => '2', 'preu' => 100, 'dataEntrada' => '2022-02-25', 'dataSortida' => '2022-03-01'],
            ['id' => '5', 'habitatge_id' => '3', 'user_id' => '1', 'preu' => 65, 'dataEntrada' => '2022-03-15', 'dataSortida' => '2022-03-21'],
            ['id' => '6', 'habitatge_id' => '6', 'user_id' => '3', 'preu' => 50, 'dataEntrada' => '2022-03-16', 'dataSortida' => '2022-03-17'],
        ];

        DB::table('lloguers')->insert($lloguers);
    }
}
