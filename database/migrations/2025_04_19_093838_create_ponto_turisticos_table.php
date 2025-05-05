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
        Schema::create('ponto_turisticos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->bigInteger('province_id');
            $table->string('endereco', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponto_turisticos');
    }
};
