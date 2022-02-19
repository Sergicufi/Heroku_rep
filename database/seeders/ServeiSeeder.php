<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ServeiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $serveis = [
            ['nom' => 'Wi-Fi', 'icona'=>'wifi'],
            ['nom' => 'Lavabo','icona'=>'wc'],
            ['nom' => 'Cuina','icona'=>'kitchen'],
            ['nom' => 'Microones','icona'=>'microwave'],
            ['nom' => 'Calefacció','icona'=>'hvac'],
            ['nom' => 'Rentadora','icona'=>'local_laundry_service'],
            ['nom' => 'Secadora','icona'=>'dry_cleaning'],
            ['nom' => 'Detector de fum','icona'=>'smoke_free'],
            ['nom' => 'Instruments de bany bàsics (paper higènic, tovalloles, etc)','icona'=>'bathroom'],
            ['nom' => 'Garatge','icona'=>'garage'],
            ['nom' => 'Entrada privada','icona'=>'security'],
            ['nom' => "L'anfitrió dona la benvinguda",'icona'=>'emoji_people'],
        ];

        DB::table('serveis')->insert($serveis);
    }
}
