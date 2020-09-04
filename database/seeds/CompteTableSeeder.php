<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('enseignants')->insert([
            'name' => 'Professeur',
            'email' => 'professeur@gmail.com',
            'email_verified_at' => NULL,
            'password' => '$2y$10$7E7z1nTSg/yGjWK/T/cNn.F.TuufOE1PXT9rzi0.65B5/82IU2fme',
            'university' => 'univ-lome',
            'phone' => '91515569',
            'register_num' => 'prof2020',
        ]);
    }
}
