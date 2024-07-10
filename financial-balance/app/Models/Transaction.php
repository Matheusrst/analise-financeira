<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Eloquent para transações financeiras.
 */
class Transaction extends Model
{
    use HasFactory;

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'description',     // Descrição da transação
        'amount',          // Valor da transação
        'type',            // Tipo da transação (revenue, expense)
        'date',            // Data da transação
        'profit_or_cost',  // Lucro ou custo (profit, cost)
        'price',           // Preço da transação
        'cost_type',       // Tipo de custo (se aplicável)
    ];
}
