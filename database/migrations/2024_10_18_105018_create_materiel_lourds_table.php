<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielLourdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Materiel_lourd', function (Blueprint $table) {
            $table->bigIncrements('idML');
            $table->string('matricule');
            $table->string('typeml');
            $table->integer('capacite');

            // creation cle etrangere
            $table->unsignedBigInteger('idConcess');
            $table->foreign('idConcess')->references('idConcess')->on('concessionaires')->onDelete('cascade');

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
        Schema::dropIfExists('Materiel_lourd');
    }
}

