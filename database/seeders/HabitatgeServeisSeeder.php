<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class HabitatgeServeisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                           /*['Nom del camp'=> Valor]*/

        
        $habitatgeServeis = [
            ['habitatge_id'=>'1','servei_id'=>'1'],
            ['habitatge_id'=>'1','servei_id'=>'2'],
            ['habitatge_id'=>'1','servei_id'=>'3'],
            ['habitatge_id'=>'1','servei_id'=>'4'],
            ['habitatge_id'=>'1','servei_id'=>'5'],
            ['habitatge_id'=>'1','servei_id'=>'6'],

            ['habitatge_id'=>'2','servei_id'=>'1'],
            ['habitatge_id'=>'2','servei_id'=>'4'],
            ['habitatge_id'=>'2','servei_id'=>'7'],
            ['habitatge_id'=>'2','servei_id'=>'10'],
            ['habitatge_id'=>'2','servei_id'=>'12'],

            ['habitatge_id'=>'3','servei_id'=>'2'],
            ['habitatge_id'=>'3','servei_id'=>'3'],
            ['habitatge_id'=>'3','servei_id'=>'7'],
            ['habitatge_id'=>'3','servei_id'=>'9'],
            ['habitatge_id'=>'3','servei_id'=>'11'],

            ['habitatge_id'=>'4','servei_id'=>'2'],
            ['habitatge_id'=>'4','servei_id'=>'4'],
            ['habitatge_id'=>'4','servei_id'=>'7'],
            ['habitatge_id'=>'4','servei_id'=>'9'],
            ['habitatge_id'=>'4','servei_id'=>'11'],
            ['habitatge_id'=>'4','servei_id'=>'1'],
            ['habitatge_id'=>'4','servei_id'=>'5'],
            ['habitatge_id'=>'4','servei_id'=>'8'],
            ['habitatge_id'=>'4','servei_id'=>'10'],
            ['habitatge_id'=>'4','servei_id'=>'12'],

            ['habitatge_id'=>'5','servei_id'=>'1'],
            ['habitatge_id'=>'5','servei_id'=>'2'],
            ['habitatge_id'=>'5','servei_id'=>'3'],
            ['habitatge_id'=>'5','servei_id'=>'4'],
            ['habitatge_id'=>'5','servei_id'=>'5'],
            ['habitatge_id'=>'5','servei_id'=>'6'],
            ['habitatge_id'=>'5','servei_id'=>'7'],
            ['habitatge_id'=>'5','servei_id'=>'8'],
            ['habitatge_id'=>'5','servei_id'=>'9'],
            ['habitatge_id'=>'5','servei_id'=>'10'],
            ['habitatge_id'=>'5','servei_id'=>'11'],
            ['habitatge_id'=>'5','servei_id'=>'12'],
        ];
        DB::table('habitatge_servei')->insert($habitatgeServeis);
    }
}
