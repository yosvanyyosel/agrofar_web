<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('habilidad_trabajadors', function (Blueprint $table) {
            $table->string('id_trabajador', 11);
            $table->string('tipo_labor', 20);
            $table->primary(['id_trabajador', 'tipo_labor']);
            $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajadores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipo_labor')->references('id_labor')->on('labors')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habilidad_trabajadors');
    }
};
