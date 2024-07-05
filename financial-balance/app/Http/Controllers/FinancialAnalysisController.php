<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Equity;

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
}
