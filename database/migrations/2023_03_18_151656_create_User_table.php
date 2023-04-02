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
        Schema::create('User', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Identifiant unique de l\'utilisateur');
            $table->text('email')->nullable()->comment('Adresse email de l\'utilisateur');
            $table->text('password')->nullable()->comment('Mot de passe de l\'utilisateur');
            $table->text('first_name')->nullable()->comment('Prénom de l\'utilisateur');
            $table->text('last_name')->nullable()->comment('Nom de famille de l\'utilisateur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User');
    }
};
