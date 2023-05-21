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
        Schema::create('grupos_musculares',function (Blueprint $table) {
            $table->id();
            $table->string('nombre_gm');
            $table->timestamps();
        });

        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('ejercicios_grupos_musculares',function (BLueprint $table) {
            $table->id();
            $table->foreignId('ejercicios_id')->constrained('ejercicios');
            $table->foreignId('grupos_musculares_id')->constrained('grupos_musculares');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
