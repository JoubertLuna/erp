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
        Schema::create('tipo_movimentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_movimento')->unique();
            $table->string('url')->unique();
            $table->string('ent_sai', 1);
            $table->string('movimenta_estoque', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_movimentos');
    }
};
