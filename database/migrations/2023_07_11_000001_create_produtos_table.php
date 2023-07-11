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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('produto')->unique();
            $table->string('url')->unique();
            $table->string('eh_produto', 1); // 1 = sim - 0 = não
            $table->string('eh_insumo', 1); // 1 = sim - 0 = não
            $table->decimal('preco', 10, 2)->default(0.00);
            $table->string('image')->nullable();
            $table->string('ativo', 1)->default('1'); // 1 = sim - 0 = não
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('unidade_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
