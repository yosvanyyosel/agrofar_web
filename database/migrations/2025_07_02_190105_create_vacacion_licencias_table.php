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
        Schema::create('vacacion_licencias', function (Blueprint $table) {
            $table->string('id_trabajador', 11);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('tipo_ausencia', 20);
            $table->string('motivo', 50)->nullable();
            $table->primary(['id_trabajador', 'fecha_inicio']);
            $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajadores')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacacion_licencias');
    }
};
