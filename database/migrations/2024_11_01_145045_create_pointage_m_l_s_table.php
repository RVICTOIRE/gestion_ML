<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointageMLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointageML', function (Blueprint $table) {
            $table->id('idPointage');
            $table->date('Date');
            $table->boolean('Fonctionnel')->default(false);
            $table->integer('Rotation')->default(0);

            // creation cle etrangere
            $table->unsignedBigInteger('idML');
            $table->foreign('idML')->references('idML')->on('materiel_lourd')->onDelete('cascade');

            $table->unsignedBigInteger('idCommune');
            $table->foreign('idCommune')->references('id')->on('communeOuAxe')->onDelete('cascade');

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
        Schema::dropIfExists('pointageML');
    }
}
