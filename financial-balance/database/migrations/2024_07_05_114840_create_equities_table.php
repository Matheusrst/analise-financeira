<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * Cria a tabela 'equities' com os campos necessários.
     */
    public function up(): void
    {
        Schema::create('equities', function (Blueprint $table) {
            $table->id();                    // ID único da entrada de patrimônio líquido
            $table->decimal('amount', 15, 2);// Valor do patrimônio líquido com precisão de 15 dígitos e 2 casas decimais
            $table->timestamps();            // Campos padrão para registro de data e hora de criação/atualização
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a tabela 'equities'.
     */
    public function down(): void
    {
        Schema::dropIfExists('equities'); // Remove a tabela 'equities' se ela existir
    }
};

