<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomaineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('domaines')->insert(
            [
                [
                    'title' => 'Mécanique'
                ],[
                    'title' => 'Physique'
                ],[
                    'title' => 'Mathématique'
                ],[
                    'title' => 'Informatique'
                ],[
                    'title' => 'Sociologie'
                ]
            ]
        );
    }
}
