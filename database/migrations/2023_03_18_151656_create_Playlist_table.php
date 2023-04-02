<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Playlist', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Identifiant unique de la playlist');
            $table->text('title')->comment('Titre de la playlist');
            $table->text('author')->comment('Auteur de la playlist');
            $table->json('songs')->comment('Liste des chansons de la playlist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Playlist');
    }
};
