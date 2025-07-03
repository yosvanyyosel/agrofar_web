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
        Schema::create('uso_quimicos', function (Blueprint $table) {
            $table->unsignedInteger('id_tarea');
            $table->string('nombre_quimico', 100);
            $table->decimal('dosis_ha', 10, 2);
            $table->decimal('area_aplicada_ha', 10, 2);
            $table->primary(['id_tarea', 'nombre_quimico']);
            $table->foreign('id_tarea')->references('id_tarea')->on('tareas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nombre_quimico')->references('nombre')->on('quimicos')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uso_quimicos');
    }
};
