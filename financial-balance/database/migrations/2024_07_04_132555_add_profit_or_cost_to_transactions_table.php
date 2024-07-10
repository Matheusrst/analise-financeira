<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfitOrCostToTransactionsTable extends Migration
{
    /**
     * Executa a migração.
     *
     * Adiciona a coluna 'profit_or_cost' à tabela 'transactions' para indicar se a transação é de lucro ou custo.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('profit_or_cost', ['profit', 'cost'])->after('amount'); // Enumeração para lucro ou custo, adicionado após o campo 'amount'
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a coluna 'profit_or_cost' da tabela 'transactions'.
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('profit_or_cost'); // Remove a coluna 'profit_or_cost' da tabela 'transactions'
        });
    }
}

