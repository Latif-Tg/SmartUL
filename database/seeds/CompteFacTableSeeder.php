<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompteFacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('faculties')->insert([
            'title' => 'Centre Informatique et de Calcul',
            'email' => 'cic@gmail.com',
            'password' => '$2y$10$.xoHi2U6YwCOdIOKDZgTtu0gnhsnP8wI2op6X9uybPo6mj5p6Jo.S',
            'isRoot' => 0,
            'adresse' => 'togo-lome',
            'university' =>'univ-lome',
            'register_fac' => 'cic2020'
        ]);

    }
}
