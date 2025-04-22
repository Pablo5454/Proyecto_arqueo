<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('arqueologos', function (Blueprint $table) {
            // Primero quitamos la restricción de clave foránea
            $table->dropForeign('arqueologos_yacimiento_id_foreign');

            // Luego eliminamos la columna
            $table->dropColumn('yacimiento_id');
        });
    }

    public function down()
    {
        Schema::table('arqueologos', function (Blueprint $table) {
            $table->unsignedBigInteger('yacimiento_id')->nullable();

            // Restaurar la relación si hiciste un rollback
            $table->foreign('yacimiento_id')->references('id')->on('yacimientos');
        });
    }
};
