<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * Adiciona a coluna 'cost_type' à tabela 'transactions', permitindo valores nulos.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('cost_type')->nullable()->after('type'); // Adiciona a coluna 'cost_type' após a coluna 'type', permitindo valores nulos
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a coluna 'cost_type' da tabela 'transactions'.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('cost_type'); // Remove a coluna 'cost_type' da tabela 'transactions'
        });
    }
};

