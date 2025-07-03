<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('resultados_produccions', function (Blueprint $table) {
            $table->string('id_produccion', 20)->primary();
            $table->decimal('cantidad_producida', 10, 2);
            $table->string('unidad_medida', 10);
            $table->date('fecha_cosecha')->default(DB::raw('CURRENT_DATE'));
            $table->string('destino', 100);
            $table->foreign('id_produccion')->references('id_produccion')->on('produccions')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultado_produccions');
    }
};
