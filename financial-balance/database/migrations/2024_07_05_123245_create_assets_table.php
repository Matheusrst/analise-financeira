<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * Cria a tabela 'assets' com os campos necessários.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();                    // ID único do ativo
            $table->string('description');   // Descrição do ativo como uma string
            $table->decimal('amount', 15, 2);// Valor do ativo com precisão de 15 dígitos e 2 casas decimais
            $table->timestamps();            // Campos padrão para registro de data e hora de criação/atualização
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a tabela 'assets'.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets'); // Remove a tabela 'assets' se ela existir
    }
};
