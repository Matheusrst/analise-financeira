<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Equity;
use App\Models\Liability;
use App\Models\Asset;
use Carbon\Carbon;

class FinancialAnalysisController extends Controller
{
/**
 * Calcula o Retorno sobre o Investimento (ROI).
 *
 * @return \Illuminate\Http\JsonResponse
 */
    public function calculateROI()
    {
        $transactions = Transaction::all();

        $totalProfit = $transactions->where('profit_or_cost', 'profit')->sum('amount');

        $totalInvested = $transactions->where('profit_or_cost', 'cost')->sum('amount');
        

        if ($totalInvested == 0) {
            return response()->json(['error' => 'não é possivel calcular o ROI com investimento em zero'], 400);
        }

        $roi = ($totalProfit / $totalInvested) * 100;

        return response()->json(['ROI' => $roi], 200);
    }

/**
 * Calcula o Retorno sobre o Patrimônio Líquido (ROE).
 *
 * @return \Illuminate\Http\JsonResponse
 */
    public function calculateROE()
    {
        $equity = Equity::latest()->first();

        if (!$equity || $equity->amount == 0){
            return response()->json(['error' => 'não é possivel calcular o ROE sem patrimonio liquido valido'], 400);
        }

        $transactions = Transaction::all();
        $netProfit = $transactions->where('profit_or_cost', 'profit')->sum('amount') - $transactions->where('profit_or_cost', 'cost')->sum('amount');

        $roe = ($netProfit / $equity->amount) * 100;

        return response()->json(['ROE' => $roe], 200);
    }

/**
 * Calcula o Fluxo de Caixa Livre.
 *
 * @return \Illuminate\Http\JsonResponse
 */
    public function calculateCashFlow()
    {
        $transactions = Transaction::all();

        $totalOperationalIncome = $transactions->where('profit_or_cost', 'profit')->sum('amount');

        $totalOperationalExpense = $transactions->where('profit_or_cost', 'cost')->sum('amount');

        $totalCapex = $transactions->where('description', 'capex')->sum('amount');

        $freecashFlow = $totalOperationalIncome - $totalOperationalExpense - $totalCapex;

        return response()->json(['FreeCashFlow' => $freecashFlow], 200);
    }

/**
 * Exibe a view para criar um novo ativo.
 *
 * @return \Illuminate\View\View
 */
    public function createAsset()
    {
        return view('financial.create_asset');
    }

/**
 * Armazena um novo ativo no banco de dados.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\RedirectResponse
 */
    public function storeAsset(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Asset::create([
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()->route('financial.balance_sheet')->with('success', 'Ativo adicionado com sucesso.');
    }


/**
 * Exibe a view para criar um novo passivo.
 *
 * @return \Illuminate\View\View
 */
    public function createLiability()
    {
        return view('financial.create_liability');
    }

/**
 * Armazena um novo passivo no banco de dados.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\RedirectResponse
 */
    public function storeLiability(Request $request)
    {
        $request->validate([
            'description' =>'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Liability::create([
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()->route('financial.balance_sheet')->with('sucess', 'passivo adicionado com sucesso');
    }

/**
 * Exibe a view para criar um novo patrimônio líquido.
 *
 * @return \Illuminate\View\View
 */
    public function createEquity()
    {
        return view('financial.create_equity');
    }

/**
 * Armazena um novo patrimônio líquido no banco de dados.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\RedirectResponse
 */
    public function storeEquity(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Equity::create([
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return  redirect()->route('financial.balance_sheet')->with('success', 'patrimonio liquido adicionado com sucesso');
    }

/**
 * Exibe a demonstração do resultado do exercício (DRE).
 *
 * @return \Illuminate\View\View
 */
    public function incomeStatement()
    {
        $revenues = Transaction::where('type', 'revenue')->sum('amount');
        
        $expenses = Transaction::where('type', 'expense')->sum('amount');
        
        $netIncome = $revenues - $expenses;
        
        return view('financial.income_statement', compact('revenues', 'expenses', 'netIncome'));
    }

/**
 * Exibe os custos fixos e variáveis.
 *
 * @return \Illuminate\View\View
 */
    public function fixedAndVariableCosts()
    {
        $fixedCosts = Transaction::where('type', 'expense')->where('cost_type', 'fixed')->sum('amount');

        $variableCosts = Transaction::where('type', 'expense')->where('cost_type', 'variable')->sum('amount');

        return view('financial.fixed_and_variable_costs', compact('fixedCosts', 'variableCosts'));
    }

/**
 * Exibe os custos operacionais.
 *
 * @return \Illuminate\View\View
 */
    public function operationalCosts()
    {
        $operationalCosts = Transaction::where('type', 'expense')->where('cost_type', 'operational')->sum('amount');

        return view('financial.operational_costs', compact('operationalCosts'));
    }

/**
 * Calcula o preço de venda com base no custo e na margem desejada.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\View\View
 */
    public function calculateSellingPrice(Request $request)
    {
        $request->validate([
            'cost' => 'required|numeric',
            'desired_margin' => 'required|numeric|between:0,100',
        ]);

        $cost = $request->input('cost');
        $desiredMargin = $request->input('desired_margin');
        $sellingPrice = $cost / (1 - $desiredMargin / 100);

        return view('financial.selling_price', compact('cost', 'desiredMargin', 'sellingPrice'));
    }

 /**
 * Calcula as receitas mensal, trimestral, semestral e anual.
 *
 * @return \Illuminate\View\View
 */
    public function calculateRevenue()
    {
        $now = Carbon::now();

        $monthlyRevenue = Transaction::where('type', 'revenue')
            ->whereYear('date', $now->year)
            ->whereMonth('date', $now->month)
            ->sum('amount');

        $quarterlyRevenue = Transaction::where('type', 'revenue')
            ->whereYear('date', $now->year)
            ->whereIn('date', [
                $now->copy()->startOfQuarter()->toDateString(),
                $now->copy()->endOfQuarter()->toDateString(),
            ])
            ->sum('amount');

        $semiAnnualRevenue = Transaction::where('type', 'revenue')
            ->whereYear('date', $now->year)
            ->where(function ($query) use ($now) {
                $query->whereBetween('date', [$now->copy()->startOfYear()->toDateString(), $now->copy()->addMonths(6)->toDateString()])
                    ->orWhereBetween('date', [$now->copy()->addMonths(6)->toDateString(), $now->copy()->endOfYear()->toDateString()]);
            })
            ->sum('amount');

        $annualRevenue = Transaction::where('type', 'revenue')
            ->whereYear('date', $now->year)
            ->sum('amount');

        return view('financial.revenue', compact('monthlyRevenue', 'quarterlyRevenue', 'semiAnnualRevenue', 'annualRevenue'));
    }

/**
 * Exibe o histórico de transações.
 *
 * @return \Illuminate\View\View
 */
    public function transactionHistory()
    {
        $transactions = Transaction::orderBy('date', 'asc')->get();

        $monthlyTransactions = Transaction::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(amount) as total_amount')
            ->groupBy('year', 'month')
            ->orderByRaw('year asc, month asc')
            ->get();

        return view('financial.transaction_history', compact('transactions', 'monthlyTransactions'));
    }

/**
 * Exibe a demanda dos consumidores por produtos.
 *
 * @return \Illuminate\View\View
 */
    public function consumerDemand()
    {
        $transactions = Transaction::orderBy('date', 'asc')->get();

        $productDemand = Transaction::selectRaw('description as product, COUNT(*) as purchase_count, SUM(amount) as total_revenue')
            ->groupBy('product')
            ->orderBy('purchase_count', 'desc')
            ->get();

        return view('financial.consumer_demand', compact('transactions', 'productDemand'));
    }

/**
 * Calcula o índice de liquidez corrente.
 *
 * @return \Illuminate\View\View
 */
    public function calculateCurrentRatio()
    {
        $currentAssets = Transaction::where('type', 'asset')->where('description', 'current')->sum('amount');
        $currentLiabilities = Transaction::where('type', 'liability')->where('description', 'current')->sum('amount');

        if ($currentLiabilities == 0) {
            $currentRatio = 'Infinito (passivos circulantes são zero)';
        } else {
            $currentRatio = $currentAssets / $currentLiabilities;
        }

        return view('financial.current_ratio', compact('currentAssets', 'currentLiabilities', 'currentRatio'));
    }

/**
 * Calcula o índice de liquidez seca.
 *
 * @return \Illuminate\View\View
 */
    public function calculateQuickRatio()
    {
        $quickAssets = Transaction::where('type', 'asset')
                                  ->where('description', 'current')
                                  ->where('cost_type', '!=', 'Inventory')
                                  ->sum('amount');
        $currentLiabilities = Transaction::where('type', 'liability')->where('description', 'current')->sum('amount');

        if ($currentLiabilities == 0) {
            $quickRatio = 'Infinito (passivos circulantes são zero)';
        } else {
            $quickRatio = $quickAssets / $currentLiabilities;
        }

        return view('financial.quick_ratio', compact('quickAssets', 'currentLiabilities', 'quickRatio'));
    }

/**
 * Calcula o índice de endividamento.
 *
 * @return \Illuminate\View\View
 */
    public function calculateDebtRatio()
    {
        $totalLiabilities = Transaction::where('type', 'liability')->sum('amount');
        $totalEquity = Transaction::where('type', 'equity')->sum('amount');

        if ($totalEquity == 0) {
            $debtRatio = 'Infinito (patrimônio líquido é zero)';
        } else {
            $debtRatio = $totalLiabilities / $totalEquity;
        }

        return view('financial.debt_ratio', compact('totalLiabilities', 'totalEquity', 'debtRatio'));
    }

/**
 * Calcula a cobertura de juros.
 *
 * @return \Illuminate\View\View
 */
    public function calculateInterestCoverage()
    {
        $ebit = Transaction::where('type', 'revenue')->sum('amount') - Transaction::where('type', 'expense')->where('description', '!=', 'interest')->sum('amount');
        $interestExpense = Transaction::where('type', 'expense')->where('description', 'interest')->sum('amount');

        if ($interestExpense == 0) {
            $interestCoverage = 'Infinito (despesas de juros são zero)';
        } else {
            $interestCoverage = $ebit / $interestExpense;
        }

        return view('financial.interest_coverage', compact('ebit', 'interestExpense', 'interestCoverage'));
    }

/**
 * Calcula o giro do ativo.
 *
 * @return \Illuminate\View\View
 */
    public function calculateAssetTurnover()
    {
        $totalRevenue = Transaction::where('type', 'revenue')->sum('amount');

        $initialAssets = Asset::where('created_at', '>=', now()->subYear())->orderBy('created_at', 'asc')->first();
        $finalAssets = Asset::where('created_at', '<=', now())->orderBy('created_at', 'desc')->first();

        if ($initialAssets && $finalAssets) {
            $averageAssets = ($initialAssets->amount + $finalAssets->amount) / 2;
        } else {
            $averageAssets = 0;
        }

        if ($averageAssets == 0) {
            $assetTurnover = 'Infinito (ativos médios são zero)';
        } else {
            $assetTurnover = $totalRevenue / $averageAssets;
        }

        return view('financial.asset_turnover', compact('totalRevenue', 'averageAssets', 'assetTurnover'));
    }

/**
 * Calcula o período médio de cobrança.
 *
 * @return \Illuminate\View\View
 */
    public function averageCollectionPeriod()
    {
        $receivables = Transaction::where('type', 'revenue')->get();
    
        $totalDays = 0;
        foreach ($receivables as $transaction) {
            $transactionDate = \Carbon\Carbon::parse($transaction->transaction_date);
            $paymentDate = \Carbon\Carbon::parse($transaction->payment_date ?? $transaction->transaction_date); // Usar data da transação se payment_date não estiver disponível
            $totalDays += $transactionDate->diffInDays($paymentDate);
        }
    
        $averageCollectionPeriod = count($receivables) > 0 ? $totalDays / count($receivables) : 0;
    
        return view('financial.average_collection_period', compact('averageCollectionPeriod'));
    }
    
/**
 * Calcula o período médio de pagamento.
 *
 * @return \Illuminate\View\View
 */
    public function averagePaymentPeriod()
    {
        $payables = Transaction::where('type', 'expense')->get();
    
        $totalDays = 0;
        foreach ($payables as $transaction) {
            $transactionDate = \Carbon\Carbon::parse($transaction->transaction_date);
            $paymentDate = \Carbon\Carbon::parse($transaction->payment_date ?? $transaction->transaction_date); // Usar data da transação se payment_date não estiver disponível
            $totalDays += $transactionDate->diffInDays($paymentDate);
        }
    
        $averagePaymentPeriod = count($payables) > 0 ? $totalDays / count($payables) : 0;
    
        return view('financial.average_payment_period', compact('averagePaymentPeriod'));
    }

/**
 * Calcula o período de payback.
 *
 * @return \Illuminate\View\View
 */
    public function paybackPeriod()
    {
        $transactions = Transaction::orderBy('date', 'asc')->get();
    
        $cumulativeCashFlow = 0;
        $initialInvestment = 0;
        $paybackPeriodMonths = 0;
    
        foreach ($transactions as $transaction) {
            if ($transaction->type == 'expense') {
                $cumulativeCashFlow -= $transaction->amount;
            } else {
                $cumulativeCashFlow += $transaction->amount;
            }
    
            $paybackPeriodMonths++;
    
            if ($cumulativeCashFlow >= $initialInvestment) {
                break;
            }
        }

        if ($cumulativeCashFlow < $initialInvestment) {
            $paybackPeriodMonths = -1; 
        }
    
        return view('financial.payback_period', compact('paybackPeriodMonths', 'initialInvestment'));
    }

/**
 * Calcula o Valor Presente Líquido (NPV).
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\View\View
 */
    public function calculateNPV(Request $request)
{
    $request->validate([
        'initial_investment' => 'required|numeric',
        'discount_rate' => 'required|numeric'
    ]);

    $initialInvestment = $request->input('initial_investment');
    $discountRate = $request->input('discount_rate') / 100;

    $transactions = Transaction::orderBy('date', 'asc')->get();

    $npv = -$initialInvestment;
    $yearlyCashFlows = [];

    foreach ($transactions as $transaction) {
        $year = \Carbon\Carbon::parse($transaction->date)->year;

        if (!isset($yearlyCashFlows[$year])) {
            $yearlyCashFlows[$year] = 0;
        }

        if ($transaction->type == 'revenue') {
            $yearlyCashFlows[$year] += $transaction->amount;
        } else {
            $yearlyCashFlows[$year] -= $transaction->amount;
        }
    }

    foreach ($yearlyCashFlows as $year => $cashFlow) {
        $npv += $cashFlow / pow(1 + $discountRate, $year - now()->year);
    }

    return view('financial.calculate_npv', compact('npv', 'initialInvestment', 'discountRate'));
}

/**
 * Calcula a Taxa Interna de Retorno (IRR).
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\View\View
 */
public function calculateIRR(Request $request)
{
    $request->validate([
        'initial_investment' => 'required|numeric'
    ]);

    $initialInvestment = $request->input('initial_investment');

    $transactions = Transaction::orderBy('date', 'asc')->get();

    $yearlyCashFlows = [];

    foreach ($transactions as $transaction) {
        $year = \Carbon\Carbon::parse($transaction->date)->year;

        if (!isset($yearlyCashFlows[$year])) {
            $yearlyCashFlows[$year] = 0;
        }

        if ($transaction->type == 'revenue') {
            $yearlyCashFlows[$year] += $transaction->amount;
        } else {
            $yearlyCashFlows[$year] -= $transaction->amount;
        }
    }

    $cashFlows = [-$initialInvestment];
    foreach ($yearlyCashFlows as $year => $cashFlow) {
        $cashFlows[] = $cashFlow;
    }

    $irr = $this->calculateIRRUsingNewtonRaphson($cashFlows);

    return view('financial.calculate_irr', compact('irr', 'initialInvestment'));
}

/**
 * Calcula a Taxa Interna de Retorno (IRR) usando o método de Newton-Raphson.
 *
 * @param array $cashFlows
 * @param float $initialGuess
 * @param float $tolerance
 * @param int $maxIterations
 * @return float
 */
private function calculateIRRUsingNewtonRaphson ($cashFlows, $initialGuess = 0.1, $tolerance = 0.0001, $maxIterations = 1000)
{
    $irr = $initialGuess;
    $iteration = 0;

    while ($iteration < $maxIterations) {
        $npv = 0;
        $npvDerivative = 0;

        foreach ($cashFlows as $t => $cashFlow) {
            $npv += $cashFlow * pow(1 + $irr, -$t);
            $npvDerivative += $t * $cashFlow * pow(1 + $irr, $t + 1);
        }

        $newIrr = $irr - $npv / $npvDerivative;

        if (abs($newIrr - $irr) < $tolerance) {
            return $newIrr;
        }

        $irr = $newIrr;
        $iteration++;
    }

    return $irr;
}
}