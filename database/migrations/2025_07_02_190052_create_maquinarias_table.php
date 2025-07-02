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
    Schema::create('maquinarias', function (Blueprint $table) {
        $table->string('id_maquinaria', 20)->primary();
        $table->string('tipo', 100);
        $table->decimal('consumo_promedio', 10, 0);
        $table->string('estado', 50);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinarias');
    }
};
