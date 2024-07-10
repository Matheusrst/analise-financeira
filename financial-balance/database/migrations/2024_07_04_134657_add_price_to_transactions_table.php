<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToTransactionsTable extends Migration
{
    /**
     * Executa a migração.
     *
     * Adiciona a coluna 'price' à tabela 'transactions' para armazenar o preço da transação.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->decimal('price', 15, 2)->after('profit_or_cost'); // Adiciona um campo decimal 'price' com precisão de 15 dígitos e 2 casas decimais, após o campo 'profit_or_cost'
        });
    }

    /**
     * Reverte a migração.
     *
     * Remove a coluna 'price' da tabela 'transactions'.
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('price'); // Remove a coluna 'price' da tabela 'transactions'
        });
    }
}
