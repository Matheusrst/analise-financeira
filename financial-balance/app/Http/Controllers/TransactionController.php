<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

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
            'description' => 'required',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
        ]);

        Transaction::create($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
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
        $assets = Transaction::where('amount', '>', 0)->sum('amount');
        $liabilities = Transaction::where('amount', '<', 0)->sum('amount');
        $equity = $assets + $liabilities;

        return view('financial.balance_sheet', compact('assets', 'liabilities', 'equity'));
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
}