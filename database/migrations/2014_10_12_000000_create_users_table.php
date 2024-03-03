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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('Principal', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('entradilla');
            $table->string('cuerpo');
            $table->string('imagen');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('SobreMi', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('texto');
            $table->string('imagen');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('Servicios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('entradilla');
            $table->string('resumen');
            $table->string('imagen');
            $table->number('seccion');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('Eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->date('fecha');
            $table->string('resumen');
            $table->string('imagen');
            $table->rememberToken();
            $table->timestamps();
        });                                                     

        Schema::create('Contacto', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
