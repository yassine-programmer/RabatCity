<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_activites', function (Blueprint $table) {
            $table->Increments('Theme_id');
            $table->string('Theme_intitule');
            $table->string('Theme_image');
            $table->integer('Activite_id')->unsigned();
            $table->foreign('Activite_id')->references('Activite_id')->on('activites');
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
        Schema::dropIfExists('theme_activites');
    }
}
