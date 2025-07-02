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
        Schema::create('quimicos', function (Blueprint $table) {
            $table->string('nombre', 100)->primary();
            $table->string('tipo', 30);
            $table->string('unidad_medida', 20);
            $table->decimal('cantidad_disponible', 10, 2);
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('dosis_maxima_ha', 10, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quimicos');
    }
};
