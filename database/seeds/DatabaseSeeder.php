<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call([DomaineTableSeeder::class,DocumentTableSeeder::class,TypeTableSeeder::class,CompteTableSeeder::class,CompteFacTableSeeder::class]);
    }
}
