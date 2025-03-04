<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToPointageMLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pointageML', function (Blueprint $table) {
            $table->softDeletes(); // Ajoute une colonne `deleted_at`
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pointageML', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Supprime la colonne `deleted_at`
        });
    }
}
