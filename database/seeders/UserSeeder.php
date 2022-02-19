<?php

namespace Database\Seeders;

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            ['name' => 'Alex', 'email' => 'agomez@cendrassos.net', 'password' => bcrypt('12345678')],
            ['name' => 'Sergi', 'email' => 'scufi@cendrassos.net', 'password' => bcrypt('12345678')],
            ['name' => 'Juanka', 'email' => 'jburria@cendrassos.net', 'password' => bcrypt('12345678')],
        ];

        DB::table('users')->insert($users);
    }
}
