<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('Categorie_id');
            $table->string('Categorie_intitule')->unique();
            $table->string('Categorie_image');
            $table->string('Categorie_description');
            $table->integer('Cat_id')->nullable()->references('Categorie_id')->on('Categorie_id');
            $table->integer('Theme_id')->references('Theme_id')->on('themes');
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
        Schema::dropIfExists('categories');
    }
}
