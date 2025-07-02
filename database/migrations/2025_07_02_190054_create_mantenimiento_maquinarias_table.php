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
        Schema::create('mantenimiento_maquinarias', function (Blueprint $table) {
            $table->string('id_maquinaria', 20);
            $table->date('inicio');
            $table->date('fin');
            $table->integer('costo');
            $table->primary(['id_maquinaria', 'inicio']);
            $table->foreign('id_maquinaria')->references('id_maquinaria')->on('maquinarias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento_maquinarias');
    }
};
