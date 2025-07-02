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
        Schema::create('uso_maquinarias', function (Blueprint $table) {
            $table->string('id_maquinaria', 20);
            $table->integer('id_tarea');
            $table->decimal('combustible_consumido', 10, 0);
            $table->primary(['id_maquinaria', 'id_tarea']);
            $table->foreign('id_maquinaria')->references('id_maquinaria')->on('maquinarias')->onUpdate('cascade');
            $table->foreign('id_tarea')->references('id_tarea')->on('tareas')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uso_maquinarias');
    }
};
