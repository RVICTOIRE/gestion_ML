<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToConcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concessionaires', function (Blueprint $table) {
           $table->string('Ninea')->nullable();
           $table->date('Date_debut')->nullable();
           $table->date('Date_fin')->nullable();
           $table->string('Situation')->nullable();
           $table->string('Nom_contact')->nullable();
           $table->integer('Num_contact')->nullable();
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concessionaires', function (Blueprint $table) {
            $table->dropColumn(['Ninea', 'Date_debut', 'Date_fin' , 'Situation', 'Nom_contact', 'Num_contact']);
        });
    }
}
