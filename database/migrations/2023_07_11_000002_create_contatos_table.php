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
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('eh_cliente')->default('1'); // 1 = Cliente - 2 = Fornecedor - 3 = Transportador
            $table->string('nome')->unique();
            $table->string('url')->unique();
            $table->string('nome_fantasia')->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('cnpj', 20)->nullable();
            $table->string('ativo', 1)->default('1'); // 1 = sim - 0 = não
            $table->string('fone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email')->unique();
            $table->string('cep', 20);
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('complemento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
