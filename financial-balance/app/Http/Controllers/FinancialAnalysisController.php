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

    public function calculateCashFlow()
    {
        $transactions = Transaction::all();

        $totalOperationalIncome = $transactions->where('profit_or_cost', 'profit')->sum('amount');

        $totalOperationalExpense = $transactions->where('profit_or_cost', 'cost')->sum('amount');

        $totalCapex = $transactions->where('description', 'capex')->sum('amount');

        $freecashFlow = $totalOperationalIncome - $totalOperationalExpense - $totalCapex;

        return response()->json(['FreeCashFlow' => $freecashFlow], 200);
    }

    public function createAsset()
    {
        return view('financial.create_asset');
    }

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


    public function createLiability()
    {
        return view('financial.create_liability');
    }

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

    public function createEquity()
    {
        return view('financial.create_equity');
    }

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

    public function incomeStatement()
    {
        $revenues = Transaction::where('type', 'revenue')->sum('amount');
        
        $expenses = Transaction::where('type', 'expense')->sum('amount');
        
        $netIncome = $revenues - $expenses;
        
        return view('financial.income_statement', compact('revenues', 'expenses', 'netIncome'));
    }

    public function fixedAndVariableCosts()
    {
        $fixedCosts = Transaction::where('type', 'expense')->where('cost_type', 'fixed')->sum('amount');

        $variableCosts = Transaction::where('type', 'expense')->where('cost_type', 'variable')->sum('amount');

        return view('financial.fixed_and_variable_costs', compact('fixedCosts', 'variableCosts'));
    }

    public function operationalCosts()
    {
        $operationalCosts = Transaction::where('type', 'expense')->where('cost_type', 'operational')->sum('amount');

        return view('financial.operational_costs', compact('operationalCosts'));
    }

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

    public function transactionHistory()
    {
        $transactions = Transaction::orderBy('date', 'asc')->get();

        $monthlyTransactions = Transaction::selectRaw('YEAR(date) as year, MONTH(date) as month, SUM(amount) as total_amount')
            ->groupBy('year', 'month')
            ->orderByRaw('year asc, month asc')
            ->get();

        return view('financial.transaction_history', compact('transactions', 'monthlyTransactions'));
    }

    public function consumerDemand()
    {
        $transactions = Transaction::orderBy('date', 'asc')->get();

        $productDemand = Transaction::selectRaw('description as product, COUNT(*) as purchase_count, SUM(amount) as total_revenue')
            ->groupBy('product')
            ->orderBy('purchase_count', 'desc')
            ->get();

        return view('financial.consumer_demand', compact('transactions', 'productDemand'));
    }

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
}
