<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Equity;
use App\Models\Liability;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
/**
 * Exibe uma lista de todas as transações.
 *
 * @return \Illuminate\View\View
 */
public function index()
{
    $transactions = Transaction::all();
    return view('transaction.index', compact('transactions'));
}

/**
 * Exibe o formulário para criação de uma nova transação.
 *
 * @return \Illuminate\View\View
 */
public function create()
{
    return view('transaction.create');
}


/**
 * Armazena uma nova transação no banco de dados.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
public function store(Request $request)
{
    // Valida os dados recebidos do formulário de criação de transação
    $request->validate([
        'description' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'type' => 'required|string|in:revenue,expense',
        'date' => 'required|date',
        'profit_or_cost' => 'required|string|in:profit,cost',
        'price' => 'nullable|numeric',
        'cost_type' => 'nullable|string|in:fixed,variable,operational'
    ]);

    // Cria uma nova instância de Transação com os dados validados e salva no banco de dados
    Transaction::create($request->all());

    // Redireciona de volta para a lista de transações com uma mensagem de sucesso
    return redirect()->route('transactions.index')->with('success', 'Transação adicionada com sucesso.');
}

/**
 * Exibe o formulário para edição de uma transação específica.
 *
 * @param  Transaction  $transaction
 * @return \Illuminate\View\View
 */
public function edit(Transaction $transaction)
{
    // Retorna a view de edição com os dados da transação passada como parâmetro
    return view('transaction.edit', compact('transaction'));
}

/**
 * Atualiza uma transação específica no banco de dados.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  Transaction  $transaction
 * @return \Illuminate\Http\RedirectResponse
 */
public function update(Request $request, Transaction $transaction)
{
    // Valida os dados recebidos do formulário de edição de transação
    $request->validate([
        'description' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'type' => 'required|string|in:revenue,expense',
        'date' => 'required|date',
        'profit_or_cost' => 'required|string|in:profit,cost',
        'price' => 'nullable|numeric',
        'cost_type' => 'nullable|string|in:fixed,variable,operational'
    ]);

    // Atualiza os dados da transação com os novos dados validados
    $transaction->update($request->all());

    // Redireciona de volta para a lista de transações com uma mensagem de sucesso
    return redirect()->route('transactions.index')->with('success', 'Transação atualizada com sucesso.');
}

/**
 * Remove uma transação específica do banco de dados.
 *
 * @param  Transaction  $transaction
 * @return \Illuminate\Http\RedirectResponse
 */
public function destroy(Transaction $transaction)
{
    // Exclui a transação do banco de dados
    $transaction->delete();

    // Redireciona de volta para a lista de transações com uma mensagem de sucesso
    return redirect()->route('transactions.index')->with('success', 'Transação excluída com sucesso.');
}

/**
 * Exibe o balanço patrimonial da empresa, incluindo ativos, passivos e patrimônio líquido.
 *
 * @return \Illuminate\View\View
 */
public function balanceSheet()
{
    // Obtém todos os ativos e calcula o total de ativos
    $assets = Asset::all();
    $totalAssets = $assets->sum('amount');

    // Obtém todos os passivos e calcula o total de passivos
    $liabilities = Liability::all();
    $totalLiabilities = $liabilities->sum('amount');

    // Obtém todo o patrimônio líquido e calcula o total de patrimônio líquido
    $equity = Equity::all();
    $totalEquity = $equity->sum('amount');

    // Retorna a view do balanço patrimonial com os dados calculados
    return view('financial.balance_Sheet', [
        'assets' => $assets,
        'totalAssets' => $totalAssets,
        'liabilities' => $liabilities,
        'totalLiabilities' => $totalLiabilities,
        'equity' => $equity,
        'totalEquity' => $totalEquity,
    ]);
}

/**
 * Exibe o demonstrativo de fluxo de caixa da empresa, agrupando as transações por mês e calculando
 * os fluxos de entrada, saída e líquido para cada mês.
 *
 * @return \Illuminate\View\View
 */
public function cashFlowStatement()
{
    // Obtém todas as transações e as agrupa por mês usando Carbon para formatação da data
    $transactions = Transaction::all()->groupBy(function($date) {
        return \Carbon\Carbon::parse($date->transaction_date)->format('Y-m');
    });

    $cashFlow = [];

    // Itera sobre cada grupo de transações por mês
    foreach ($transactions as $month => $monthTransactions) {
        // Calcula os valores de entrada, saída e líquido para o mês atual
        $cashFlow[$month]['inflows'] = $monthTransactions->where('amount', '>', 0)->sum('amount');
        $cashFlow[$month]['outflows'] = $monthTransactions->where('amount', '<', 0)->sum('amount');
        $cashFlow[$month]['net'] = $cashFlow[$month]['inflows'] + $cashFlow[$month]['outflows'];
    }

    // Retorna a view do demonstrativo de fluxo de caixa com os dados calculados
    return view('financial.cash_flow_statement', compact('cashFlow'));
}

/**
 * realiza a análise horizontal das transações
 *
 * @return void
 */
public function horizontalAnalysis()
{
    // Recupera todas as transações e agrupa-as pela data da transação (mês)
    $transactions = Transaction::all()->groupBy(function($date) {
        return Carbon::parse($date->transaction_date)->format('Y-m');
    });

    $analysis = [];
    $previousMonthNet = null;

    // Itera através de cada mês de transações para análise
    foreach ($transactions as $month => $monthTransactions) {
        // Calcula o montante líquido para o mês atual
        $netAmount = $monthTransactions->sum('amount');

        // Calcula a variação mês a mês, se houver montante líquido do mês anterior
        if ($previousMonthNet !== null) {
            $variation = ($netAmount - $previousMonthNet) / $previousMonthNet * 100;
        } else {
            $variation = 0; // Mês inicial, variação é 0
        }

        // Armazena os resultados da análise para o mês atual
        $analysis[$month] = [
            'net' => $netAmount,
            'variation' => $variation
        ];

        // Atualiza o montante líquido do mês anterior para a próxima iteração
        $previousMonthNet = $netAmount;
    }

    // Passa os resultados da análise para a view 'financial.horizontal_analysis'
    return view('financial.horizontal_analysis', compact('analysis'));
}

/**
 * Realiza análise vertical das transações financeiras.
 *
 * @return \Illuminate\Contracts\View\View
 */
public function verticalAnalysis()
{
    // Calcula totais de ativos, passivos e patrimônio líquido
    $totalAssets = Transaction::where('amount', '>', 0)->sum('amount');
    $totalLiabilities = Transaction::where('amount', '<', 0)->sum('amount');
    $totalEquity = $totalAssets + $totalLiabilities;
    $total = $totalAssets + abs($totalLiabilities);

    // Calcula percentuais de ativos, passivos e patrimônio líquido em relação ao total
    $assetsPercentage = $total != 0 ? ($totalAssets / $total) * 100 : 0;
    $liabilitiesPercentage = $total != 0 ? (abs($totalLiabilities) / $total) * 100 : 0;
    $equityPercentage = $total != 0 ? ($totalEquity / $total) * 100 : 0;

    // Retorna a view 'financial.vertical_analysis' com os percentuais calculados
    return view('financial.vertical_analysis', compact(
        'assetsPercentage',
        'liabilitiesPercentage',
        'equityPercentage'
    ));
}

/**
 * Calcula índices financeiros com base nas transações e passa para a view.
 *
 * @return \Illuminate\Contracts\View\View
 */
public function financialRatios()
{
    // Calcular valores necessários para os índices
    $totalAssets = Transaction::where('amount', '>', 0)->sum('amount');
    $totalLiabilities = Transaction::where('amount', '<', 0)->sum('amount');
    $totalRevenue = Transaction::where('amount', '>', 0)->sum('amount');
    $totalExpenses = Transaction::where('amount', '<', 0)->sum('amount');
    
    // Calcular índices financeiros
    $liquidityRatio = $totalLiabilities != 0 ? $totalAssets / abs($totalLiabilities) : null;
    $netIncome = $totalRevenue + $totalExpenses;
    $netProfitability = $totalRevenue != 0 ? ($netIncome / $totalRevenue) * 100 : null;
    $debtRatio = $totalAssets != 0 ? abs($totalLiabilities) / $totalAssets : null;
    $assetTurnoverRatio = $totalAssets != 0 ? $totalRevenue / $totalAssets : null;

    // Retornar para a view 'financial.financial_ratios'
    return view('financial.financial_ratios', compact(
        'liquidityRatio', 
        'netProfitability', 
        'debtRatio', 
        'assetTurnoverRatio'
    ));
}

/**
 * Realiza análise comparativa dos índices financeiros.
 *
 * @return \Illuminate\Contracts\View\View
 */
public function comparativeAnalysis()
{
    // Dados da indústria para comparação
    $industryData = [
        'liquidity_ratio' => 1.5,
        'net_profitability' => 10.0, 
        'debt_ratio' => 0.5,
        'asset_turnover_ratio' => 1.2
    ];

    // Calcular valores necessários para os índices
    $totalAssets = Transaction::where('amount', '>', 0)->sum('amount');
    $totalLiabilities = Transaction::where('amount', '<', 0)->sum('amount');
    $totalRevenue = Transaction::where('amount', '>', 0)->sum('amount');
    $totalExpenses = Transaction::where('amount', '<', 0)->sum('amount');
    
    // Calcular índices financeiros
    $liquidityRatio = $totalLiabilities != 0 ? $totalAssets / abs($totalLiabilities) : null;
    $netIncome = $totalRevenue + $totalExpenses;
    $netProfitability = $totalRevenue != 0 ? ($netIncome / $totalRevenue) * 100 : null;
    $debtRatio = $totalAssets != 0 ? abs($totalLiabilities) / $totalAssets : null;
    $assetTurnoverRatio = $totalAssets != 0 ? $totalRevenue / $totalAssets : null;

    // Retornar para a view 'financial.comparative_analysis'
    return view('financial.comparative_analysis', compact(
        'liquidityRatio', 
        'netProfitability', 
        'debtRatio', 
        'assetTurnoverRatio',
        'industryData'
    ));
}

/**
 * Calcula projeções financeiras com base no histórico de transações.
 *
 * @return \Illuminate\Contracts\View\View
 */
public function financialProjections()
{
    // Calcular receita histórica, despesas históricas e lucro líquido histórico
    $historicalRevenue = Transaction::where('profit_or_cost', 'profit')->sum('amount');
    $historicalExpenses = Transaction::where('profit_or_cost', 'cost')->sum('amount');
    $historicalNetIncome = $historicalRevenue + $historicalExpenses;

    // Taxa de crescimento anual fixa para as projeções
    $growthRate = 0.05;

    // Array para armazenar as projeções de cada ano
    $projections = [];
    for ($year = 1; $year <= 5; $year++) {
        // Calcular receita projetada, despesas projetadas e lucro líquido projetado para cada ano futuro
        $projectedRevenue = $historicalRevenue * pow(1 + $growthRate, $year);
        $projectedExpenses = $historicalExpenses * pow(1 + $growthRate, $year);
        $projectedNetIncome = $projectedRevenue + $projectedExpenses;

        // Adicionar os resultados das projeções ao array
        $projections[] = [
            'year' => now()->year + $year,
            'revenue' => $projectedRevenue,
            'expenses' => $projectedExpenses,
            'net_income' => $projectedNetIncome,
        ];
    }

    // Retornar para a view 'financial.financial_projections' com as projeções calculadas
    return view('financial.financial_projections', compact('projections'));
}

/**
 * Exibe o formulário para adicionar transações.
 *
 * @return \Illuminate\Contracts\View\View
 */
public function feedForm()
{
    return view('transaction.feed');
}

/**
 * Processa os dados do formulário e adiciona novas transações.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse
 */
public function feed(Request $request)
{
    // Validação dos dados recebidos do formulário
    $request->validate([
        'transactions' => 'required|array',
        'transactions.*.description' => 'required|string|max:255',
        'transactions.*.amount' => 'required|numeric',
        'transactions.*.type' => 'required|string|in:revenue,expense',
        'transactions.*.date' => 'required|date',
        'transactions.*.profit_or_cost' => 'required|string|in:profit,cost',
        'transactions.*.cost_type' => 'nullable|string|in:fixed,variable,operational'
    ]);

    // Itera sobre cada transação recebida e cria no banco de dados
    foreach ($request->transactions as $transactionData) {
        Transaction::create($transactionData);
    }

    // Redireciona de volta para a página principal de transações com mensagem de sucesso
    return redirect()->route('transaction.index')->with('success', 'Transações adicionadas com sucesso.');
}
}