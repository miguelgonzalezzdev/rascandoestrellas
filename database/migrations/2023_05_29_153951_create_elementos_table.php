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
        Schema::create('elementos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_elemento')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->string('autor')->nullable();
            $table->string('productor')->nullable();
            $table->string('genero1')->nullable();
            $table->string('genero2')->nullable();
            $table->string('genero3')->nullable();
            $table->string('genero4')->nullable();
            $table->string('genero5')->nullable();
            $table->year('fecha_lanzamiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos');
    }
};
