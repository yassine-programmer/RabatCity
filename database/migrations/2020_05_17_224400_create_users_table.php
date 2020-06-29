<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('image')->default(Storage::disk('azure')->url('/photos/shares/default_avatar.png'));
            $table->string('Nom')->nullable();
            $table->string('Prenom')->nullable();
            $table->date('Date_naissance')->nullable();
            $table->string('sexe')->nullable();
            $table->string('CIN')->nullable()->nullable();
            $table->string('Adresse')->nullable();
            $table->integer('Tel')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->integer('confirmation_code')->nullable();
            $table->boolean('Admin_notify')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
