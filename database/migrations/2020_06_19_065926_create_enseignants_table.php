<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');//teacher name
            $table->string('email',100)->unique();//teacher email
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');//password
            $table->string('university');//university where the teacher is registered//teacher principal school where the matricule is define
            $table->string('phone')->nullable();//teacher contact
            $table->string('city',70)->default('unknown');//teacher city
            $table->string('register_num',100)->unique();//teacher matricule
            #$table->boolean('isValid')->default(false);//En attendant confirmation des informations
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignants');
    }
}
