<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * Adiciona a coluna 'payment_date' à tabela 'transactions', permitindo valores nulos.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->date('payment_date')->nullable(); // Adiciona a coluna 'payment_date' na tabela 'transactions', permitindo valores nulos
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a coluna 'payment_date' da tabela 'transactions'.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('payment_date'); // Remove a coluna 'payment_date' da tabela 'transactions'
        });
    }
};