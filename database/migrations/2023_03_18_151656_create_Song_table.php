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
        Schema::create('Song', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Identifiant unique de la chanson');
            $table->text('title')->comment('Titre de la chanson');
            $table->text('artist')->comment('Artiste de la chanson');
            $table->integer('album_id')->comment('Album de la chanson');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Song');
    }
};
