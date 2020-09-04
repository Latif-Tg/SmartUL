<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('title',100)->unique();//faculty or school name 
            $table->string('email',100)->unique();//faculty email
            $table->string('password');
            $table->boolean('isRoot')->default(false);//faculty is or is'nt root
            $table->string('adresse');//faculty adress
            $table->string('university');//university of faculty

            #$table->boolean('isValid')->default(false);//define the validity of the account
            $table->string('register_fac',100)->unique()->nullable();//register number given after account create

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
