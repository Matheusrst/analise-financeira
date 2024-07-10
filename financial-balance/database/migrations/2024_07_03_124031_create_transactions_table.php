<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * Cria a tabela 'transactions' com os campos necessários.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();                    // ID único da transação
            $table->string('description');   // Descrição da transação
            $table->decimal('amount', 15, 2);// Valor da transação com precisão decimal
            $table->date('date');            // Data da transação
            $table->timestamps();            // Campos padrão para registro de data e hora de criação/atualização
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a tabela 'transactions'.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
