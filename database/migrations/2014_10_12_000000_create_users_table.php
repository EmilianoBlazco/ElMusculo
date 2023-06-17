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
            $table->integer('estado_cuenta')->default(true);
            $table->integer('tipo_usuario');
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni');
            $table->date('fecha_nacimiento');
            $table->boolean('actividad_fisica')->default(false);
            $table->double('peso');
            $table->double('altura');
            $table->longText('condicion_medica')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('fecha_inicio');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('genero', function (Blueprint $table) {
            $table->id();
            $table->string('generos');
            $table->timestamps();
        });

        Schema::create('dias_entrenamiento', function (Blueprint $table) {
            $table->id();
            $table->string('dias');
            $table->timestamps();
        });

        Schema::create('dias_entrenamiento_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dias_entrenamiento_id')->constrained('dias_entrenamiento');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('genero_id')->constrained('genero');
        });

        Schema::create('objetivo', function (Blueprint $table) {
            $table->id();
            $table->string('objetivos');
            $table->timestamps();
        });

        Schema::create('objetivo_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('objetivo_id')->constrained('objetivo');
            $table->foreignId('user_id')->constrained('users');
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
