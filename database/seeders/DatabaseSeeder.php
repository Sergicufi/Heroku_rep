<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ServeiSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(TipusCategoriaSeeder::class);
        $this->call(HabitatgeSeeder::class);
        $this->call(HabitatgeServeisSeeder::class);
        $this->call(FavoritSeeder::class);
        $this->call(LloguerSeeder::class);
        $this->call(FotoSeeder::class);
    }
}
