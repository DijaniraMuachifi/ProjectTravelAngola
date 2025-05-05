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
        Schema::create('rotas', function (Blueprint $table) {
            $table->id();
            #Orgine
            $table->bigInteger('origem_id');
            #Distino
            $table->bigInteger('destino_id');
            #Distance
            $table->float('distancia');
            #Duration
            $table->float('duracao');

         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotas');
    }
};
