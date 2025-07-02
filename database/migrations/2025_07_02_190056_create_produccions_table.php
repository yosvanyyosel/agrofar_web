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
        Schema::create('produccions', function (Blueprint $table) {
            $table->string('id_produccion', 20)->primary();
            $table->string('area_id', 20);
            $table->string('cultivo', 20);
            $table->string('variedad', 100);
            $table->string('estado', 20)->default('en curso');
            $table->foreign('area_id')->references('id_area')->on('areas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccions');
    }
};
