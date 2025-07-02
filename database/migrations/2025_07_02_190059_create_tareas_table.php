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
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id_tarea');
            $table->string('id_trabajador', 11);
            $table->string('id_labor', 20);
            $table->string('id_produccion', 20);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajadores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_labor')->references('id_labor')->on('labors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_produccion')->references('id_produccion')->on('produccions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
