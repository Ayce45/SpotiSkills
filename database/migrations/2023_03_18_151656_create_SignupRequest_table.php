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
        Schema::create('SignupRequest', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->comment('Identifiant unique de la demande d\'inscription');
            $table->text('email')->nullable()->comment('Adresse email de l\'utilisateur');
            $table->text('password')->nullable()->comment('Mot de passe de l\'utilisateur');
            $table->text('first_name')->nullable()->comment('Prénom de l\'utilisateur');
            $table->text('last_name')->nullable()->comment('Nom de famille de l\'utilisateur');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->nullable()->comment('Statut de la demande d\'inscription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SignupRequest');
    }
};
