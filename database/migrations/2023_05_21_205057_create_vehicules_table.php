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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('prix');
            $table->string('image');
            $table->text('annee')->nullable();
            $table->text('carburant')->nullable();
            $table->text('kilometrage')->nullable();
            $table->text('vitesse')->nullable();
            $table->text('modele')->nullable();
            $table->text('marque')->nullable();
            $table->text('porte')->nullable();
            $table->text('place')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('vehicules');
    }
};
