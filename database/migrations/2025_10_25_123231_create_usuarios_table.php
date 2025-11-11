<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido')->nullable(); // 👈 COLUMNA FALTANTE
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->text('direccion')->nullable();
            $table->enum('genero', ['masculino', 'femenino', 'otro'])->nullable();
            $table->enum('estado', ['activo', 'inactivo', 'pendiente'])->default('activo');
            $table->string('avatar')->nullable();
            $table->integer('nivel')->default(1);
            $table->integer('experiencia')->default(0);
            $table->integer('monedas')->default(0);
            $table->integer('partidas_jugadas')->default(0);
            $table->integer('victorias')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
