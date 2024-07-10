<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * Cria a tabela 'liabilities' com os campos necessários.
     */
    public function up(): void
    {
        Schema::create('liabilities', function (Blueprint $table) {
            $table->id();                    // ID único do passivo
            $table->string('description');   // Descrição do passivo como uma string
            $table->decimal('amount', 15, 2);// Valor do passivo com precisão de 15 dígitos e 2 casas decimais
            $table->timestamps();            // Campos padrão para registro de data e hora de criação/atualização
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a tabela 'liabilities'.
     */
    public function down(): void
    {
        Schema::dropIfExists('liabilities'); // Remove a tabela 'liabilities' se ela existir
    }
};
