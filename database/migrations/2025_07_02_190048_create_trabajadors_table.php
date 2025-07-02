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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->string('id_trabajador', 11)->primary();
            $table->string('nombre', 100);
            $table->string('apellidos', 100);
            $table->date('fecha_nacimiento');
            $table->string('escolaridad', 100);
            $table->string('cargo', 100)->nullable();
            $table->decimal('salario_mensual', 10, 0);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadors');
    }
};
