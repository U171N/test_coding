<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            //Admin
            [
                'username' =>'instruktur1',
                'name'=>'Instruktur Satu',
                'email' =>'instruktur@mail.com',
                'password' =>Hash::make('12345678'),
                'peran'=>'instruktur',

            ]


        ]);
    }
}
