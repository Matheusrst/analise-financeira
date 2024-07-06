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
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));
    }

    public function create()
    {
        return view('transaction.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|string|in:revenue,expense',
            'date' => 'required|date',
            'profit_or_cost' => 'required|string|in:profit,cost',
            'price' => 'nullable|numeric',
            'cost_type' => 'nullable|string|in:fixed,variable,operational'
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transação adicionada com sucesso.');
    }

    public function edit(Transaction $transaction)
    {
        return view('transaction.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'desciption' => 'required',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);
        
        $transaction->update($request->all());
        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }

    // Método para o Balanço Patrimonial
    public function balanceSheet()
    {
       $assets = Asset::all();
       $totalAssets = $assets->sum('amount');

       $liabilities = Liability::all();
       $totalLiabilities = $liabilities->sum('amount');

       $equity = Equity::all();
       $totalEquity = $equity->sum('amount');

       return view('financial.balance_Sheet', [
        'assets' => $assets,
        'totalAssets' => $totalAssets,
        'liabilities' => $liabilities,
        'totalLiabilities' => $totalLiabilities,
        'equity' => $equity,
        'totalEquity' => $totalEquity,
       ]);
    }

    // Método para a Demonstração do Fluxo de Caixa
    public function cashFlowStatement()
    {
        $transactions = Transaction::all()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->transaction_date)->format('Y-m');
        });

        $cashFlow = [];
        foreach ($transactions as $month => $monthTransactions) {
            $cashFlow[$month]['inflows'] = $monthTransactions->where('amount', '>', 0)->sum('amount');
            $cashFlow[$month]['outflows'] = $monthTransactions->where('amount', '<', 0)->sum('amount');
            $cashFlow[$month]['net'] = $cashFlow[$month]['inflows'] + $cashFlow[$month]['outflows'];
        }

        return view('financial.cash_flow_statement', compact('cashFlow'));
    }

    public function horizontalAnalysis()
    {
        $transactions = Transaction::all()->groupBy(function($date) {
            return Carbon::parse($date->transaction_date)->format('Y-m');
        });

        $analysis = [];
        $previousMonthNet = null;

        foreach ($transactions as $month => $monthTransactions) {
            $netAmount = $monthTransactions->sum('amount');

            if ($previousMonthNet !== null) {
                $variation = ($netAmount - $previousMonthNet) / $previousMonthNet * 100;
            } else {
                $variation = 0;
            }

            $analysis[$month] = [
                'net' => $netAmount,
                'variation' => $variation
            ];

            $previousMonthNet = $netAmount;
        }

        return view('financial.horizontal_analysis', compact('analysis'));
    }

    public function verticalAnalysis()
    {
        $totalAssets = Transaction::where('amount', '>', 0)->sum('amount');
        $totalLiabilities = Transaction::where('amount', '<', 0)->sum('amount');
        $totalEquity = $totalAssets + $totalLiabilities;
        $total = $totalAssets + abs($totalLiabilities);

        $assetsPercentage = $total != 0 ? ($totalAssets / $total) * 100 : 0;
        $liabilitiesPercentage = $total != 0 ? (abs($totalLiabilities) / $total) * 100 : 0;
        $equityPercentage = $total != 0 ? ($totalEquity / $total) * 100 : 0;

        return view('financial.vertical_analysis', compact(
            'assetsPercentage',
            'liabilitiesPercentage',
            'equityPercentage'
        ));
    }

    public function financialRatios()
    {
        // Calcular os valores necessários para os índices
        $totalAssets = Transaction::where('amount', '>', 0)->sum('amount');
        $totalLiabilities = Transaction::where('amount', '<', 0)->sum('amount');
        $totalRevenue = Transaction::where('amount', '>', 0)->sum('amount');
        $totalExpenses = Transaction::where('amount', '<', 0)->sum('amount');
        
        $liquidityRatio = $totalLiabilities != 0 ? $totalAssets / abs($totalLiabilities) : null;

        $netIncome = $totalRevenue + $totalExpenses; // Expenses are negative
        $netProfitability = $totalRevenue != 0 ? ($netIncome / $totalRevenue) * 100 : null;

        $debtRatio = $totalAssets != 0 ? abs($totalLiabilities) / $totalAssets : null;

        $assetTurnoverRatio = $totalAssets != 0 ? $totalRevenue / $totalAssets : null;

        return view('financial.financial_ratios', compact(
            'liquidityRatio', 
            'netProfitability', 
            'debtRatio', 
            'assetTurnoverRatio'
        ));
    }

    public function comparativeAnalysis()
    {
        $industryData = [
            'liquidity_ratio' => 1.5,
            'net_profitability' => 10.0, 
            'debt_ratio' => 0.5,
            'asset_turnover_ratio' => 1.2
        ];

        $totalAssets = Transaction::where('amount', '>', 0)->sum('amount');
        $totalLiabilities = Transaction::where('amount', '<', 0)->sum('amount');
        $totalRevenue = Transaction::where('amount', '>', 0)->sum('amount');
        $totalExpenses = Transaction::where('amount', '<', 0)->sum('amount');
        
        $liquidityRatio = $totalLiabilities != 0 ? $totalAssets / abs($totalLiabilities) : null;

        $netIncome = $totalRevenue + $totalExpenses;
        $netProfitability = $totalRevenue != 0 ? ($netIncome / $totalRevenue) * 100 : null;

        $debtRatio = $totalAssets != 0 ? abs($totalLiabilities) / $totalAssets : null;

        $assetTurnoverRatio = $totalAssets != 0 ? $totalRevenue / $totalAssets : null;

        return view('financial.comparative_analysis', compact(
            'liquidityRatio', 
            'netProfitability', 
            'debtRatio', 
            'assetTurnoverRatio',
            'industryData'
        ));
    }

    public function financialProjections()
    {
        $historicalRevenue = Transaction::where('profit_or_cost', 'profit')->sum('amount');
        $historicalExpenses = Transaction::where('profit_or_cost', 'cost')->sum('amount');
        $historicalNetIncome = $historicalRevenue + $historicalExpenses;

        $growthRate = 0.05;

        $projections = [];
        for ($year = 1; $year <= 5; $year++) {
            $projectedRevenue = $historicalRevenue * pow(1 + $growthRate, $year);
            $projectedExpenses = $historicalExpenses * pow(1 + $growthRate, $year);
            $projectedNetIncome = $projectedRevenue + $projectedExpenses;

            $projections[] = [
                'year' => now()->year + $year,
                'revenue' => $projectedRevenue,
                'expenses' => $projectedExpenses,
                'net_income' => $projectedNetIncome,
            ];
        }

        return view('financial.financial_projections', compact('projections'));
    }

    public function feedForm()
    {
        return view('transaction.feed');
    }

    public function feed(Request $request)
    {
        $request->validate([
            'transactions' => 'required|array',
            'transactions.*.description' => 'required|string|max:255',
            'transactions.*.amount' => 'required|numeric',
            'transactions.*.type' => 'required|string|in:revenue,expense',
            'transactions.*.date' => 'required|date',
            'transactions.*.profit_or_cost' => 'required|string|in:profit,cost',
            'transactions.*.cost_type' => 'nullable|string|in:fixed,variable,operational'
        ]);

        foreach ($request->transactions as $transactionData) {
            Transaction::create($transactionData);
        }

        return redirect()->route('transaction.index')->with('success', 'Transações adicionadas com sucesso.');
    }
}