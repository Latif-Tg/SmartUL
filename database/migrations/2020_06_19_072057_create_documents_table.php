<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->smallIncrements('id');//id document
            $table->string('title');//doc title
            $table->string('author');//author
            $table->text('summary')->nullable();//summary of the doc
            $table->string('keyword');//keyword for search
            $table->string('directors')->nullable();//master or directors of redaction
            $table->integer('views')->default(0);//number of views
            $table->integer('year')->nullable();//year of publication
            $table->string('doc_path');//document path

            $table->smallInteger('type');//doc type
            $table->smallInteger('domaine');//doc domain
            $table->smallInteger('idPublisher');//id of the publisher
            $table->string("publisherRole");//role of the publisher (teacher or school)

            $table->boolean('isPrivate')->default(false);//doc is buying
            $table->boolean('isEnable')->default(true);//doc is enable or disable, if content is legal or non legal

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
        Schema::dropIfExists('documents');
    }
}
