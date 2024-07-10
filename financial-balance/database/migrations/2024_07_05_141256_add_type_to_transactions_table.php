<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * Adiciona a coluna 'type' à tabela 'transactions'.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('type')->after('amount'); // Adiciona a coluna 'type' após a coluna 'amount'
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a coluna 'type' da tabela 'transactions'.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('type'); // Remove a coluna 'type' da tabela 'transactions'
        });
    }
};

