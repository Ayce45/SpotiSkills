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
        Schema::create('Album', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Identifiant unique de l\'album.');
            $table->text('title')->nullable()->comment('Titre de l\'album.');
            $table->text('artist')->nullable()->comment('Nom de l\'artiste qui a créé l\'album.');
            $table->date('release_date')->nullable()->comment('Date de sortie de l\'album.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Album');
    }
};
