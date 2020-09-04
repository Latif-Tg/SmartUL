<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert(
        [
            [
                'title' => 'Mémoire'
            ],[
                'title' => 'Thèse'
            ],[
                'title' => 'Revue scientifique'
            ],[
                'title' => 'Recherche'
            ],[
                'title' => 'Collecte'
            ]
        ]
    );
    }
}
