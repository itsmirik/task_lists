<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Desk;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*User::create([
            'id'       => 1,
            'name'     => 'Mirsaid',
            'email'    => 'akhmedovmirik@gmail.com',
            'password' => Hash::make('123123') //123123
        ]);

        User::create([
            'id'       => 2,
            'name'     => 'Developer',
            'email'    => 'developer@gmail.com',
            'password' => Hash::make('123123') //123123
        ]);*/

//        Desk::factory(10)->create();
//        Card::factory(20)->create();
        // \App\Models\User::factory(10)->create();
    }
}
