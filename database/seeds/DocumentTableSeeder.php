<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('documents')->insert(
            [
                [
                    'title' => 'Mécanique nucléaire',
                    'author' =>  'Abdou',
                    'summary' =>  NULL,
                    'keyword' =>  'Mécanique des fluides_Mémoire_Mécanique_Abdou',
                    'directors' =>  'shab',
                    'views' =>  0,
                    'year' =>  2000,
                    'doc_path' => 'documents/1595945164.pdf',
                    'type' =>  1,
                    'domaine' => 1,
                    'idPublisher' => 1,
                    'publisherRole' => 'faculty', 
                    'isPrivate' => 0,
                    'isEnable' => 1
                ],[
                    'title' => 'Mécanique des fluides',
                    'author' =>  'lat55',
                    'summary' =>  NULL,
                    'keyword' =>   'Mécanique des fluides_Thèses_Mécanique_lat55',
                    'directors' =>  'shab',
                    'views' =>  0,
                    'year' =>  2019,
                    'doc_path' =>  'documents/1595945210.pdf',
                    'type' =>   2,
                    'domaine' =>  1,
                    'idPublisher' =>  1,
                    'publisherRole' =>  'faculty',
                    'isPrivate' =>  0,
                    'isEnable' =>  1 
                ],[
                    'title' =>  'Mathematique applicative',
                    'author' =>  'lat55',
                    'summary' =>   NULL,
                    'keyword' =>  'Mathematique applicative_Mémoire_Math_lat55',
                    'directors' =>  'shab',
                    'views' =>   0,
                    'year' =>  2015,
                    'doc_path' =>  'documents/1595945281.pdf',
                    'type' =>  1,
                    'domaine' => 3, 
                    'idPublisher' => 1, 
                    'publisherRole' =>   'faculty',
                    'isPrivate' =>  0,
                    'isEnable' =>  1
                ],[
                    'title' =>  'Molécules de l\'espace',
                    'author' =>  'abdoul',
                    'summary' =>   NULL,
                    'keyword' =>  'Molécules de l\'espace_Recherche_Physique_abdoul',
                    'directors' =>  NULL,
                    'views' =>  0,
                    'year' =>  2020,
                    'doc_path' =>  'documents/1595945484.pdf',
                    'type' =>  4,
                    'domaine' =>  2,
                    'idPublisher' =>  1,
                    'publisherRole' =>   'pro',
                    'isPrivate' =>  0,
                    'isEnable' =>  1
                ],[
                    'title' =>  'Physique quantique',
                    'author' =>  'shelly',
                    'summary' =>   NULL,
                    'keyword' =>  'Physique quantique_Revue scientifique_Physique_shelly',
                    'directors' =>  NULL,
                    'views' =>  0,
                    'year' =>  2020,
                    'doc_path' =>  'documents/1595945534.pdf',
                    'type' =>  3,
                    'domaine' =>  2,
                    'idPublisher' =>  1,
                    'publisherRole' =>   'pro',
                    'isPrivate' =>  1,
                    'isEnable' =>  1
                ],[
                    'title' =>  'Esprit d\'un criminel',
                    'author' =>  'wtf55',
                    'summary' =>   'If you need to work with thousands of database records, consider using the chunk method. This method retrieves a small chunk of the results at a time and feeds each chunk into a Closure for processing. This method is very useful for writing Artisan commands that process thousands of records. For example, let\'s work with the entire users table in chunks of 100 records at a time',
                    'keyword' =>  'Esprit d\'un criminel_Recherche_Sociologie_wtf55',
                    'directors' =>  NULL,
                    'views' =>  0,
                    'year' =>  2020,
                    'doc_path' =>  'documents/1595946043.pdf',
                    'type' =>  4,
                    'domaine' =>  5,
                    'idPublisher' =>  1,
                    'publisherRole' =>   'pro',
                    'isPrivate' =>  0,
                    'isEnable' =>  1
                ]
            ]
        );
    }
}