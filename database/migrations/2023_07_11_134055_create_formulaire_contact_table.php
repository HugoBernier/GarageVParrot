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
        Schema::create('formulaire_contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->nullable();
            $table->string('nom');
            $table->string('adresse_email');
            $table->string('phone');
            $table->longText('message');
            $table->foreignID('settledBy')->nullable();
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
        Schema::dropIfExists('formulaire_contact');
    }
};
