<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('alumnos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 32);
        $table->string('telefono', 16)->nullable();
        $table->integer('edad')->nullable();
        $table->string('password', 64);
        $table->string('email', 64)->unique();
        $table->string('genero', 1);
        $table->timestamps(); // Fecha y hora de creacion y actualizacion del registro
    });
}
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
