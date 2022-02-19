<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class FavoritSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favorit = [
            ["habitatge_id" => "1", "user_id" => "1"],
            ["habitatge_id" => "1", "user_id" => "2"],
            ["habitatge_id" => "1", "user_id" => "3"],

            ["habitatge_id" => "2", "user_id" => "1"],
            ["habitatge_id" => "2", "user_id" => "3"],

            ["habitatge_id" => "3", "user_id" => "2"],
            ["habitatge_id" => "3", "user_id" => "3"],
        ];

        DB::table('favorits')->insert($favorit);
    }
}
