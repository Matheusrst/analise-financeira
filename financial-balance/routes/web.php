<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use App\http\Controllers\FinancialAnalysisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('transactions', TransactionController::class)->only(['index', 'create', 'store']);

Route::get('financial/balance-sheet', [TransactionController::class, 'balanceSheet'])->name('financial.balance_sheet');
Route::get('financial/cash-flow-statement', [TransactionController::class, 'cashFlowStatement'])->name('financial.cash_flow_statement');
Route::get('financial/horizontal-analysis', [TransactionController::class, 'horizontalAnalysis'])->name('financial.horizontal_analysis');
Route::get('financial/financial-ratios', [TransactionController::class, 'financialRatios'])->name('financial.financial_ratios');
Route::get('financial/vertical-analysis', [TransactionController::class, 'verticalAnalysis'])->name('financial.vertical_analysis');
Route::get('financial/comparative-analysis', [TransactionController::class, 'comparativeAnalysis'])->name('financial.comparative_analysis');
Route::get('financial/financial-projections', [TransactionController::class, 'financialProjections'])->name('financial.financial_projections');

Route::get('/transactions/feed', [TransactionController::class, 'feedForm'])->name('transactions.feedForm');
Route::post('/transactions/feed', [TransactionController::class, 'feedData'])->name('transactions.feed');

Route::get('financial/roi', [FinancialAnalysisController::class, 'calculateROI'])->name('financial.calculateROI');
Route::get('financial/roe', [FinancialAnalysisController::class, 'calculateROE'])->name('financial.calculateROE');
Route::get('financial/free-cash-flow', [FinancialAnalysisController::class, 'calculateCashFlow'])->name('financial.calculateFreeCashFlow');

Route::get('financial/assets/create', [FinancialAnalysisController::class, 'createAsset'])->name('financial.createAsset');
Route::post('financial/assets/create', [FinancialAnalysisController::class, 'storeAsset'])->name('financial.storeAsset');

Route::get('financial/liabilities/create', [FinancialAnalysisController::class, 'createLiability'])->name('financial.createLiability');
Route::post('financial/liabilities/create', [FinancialAnalysisController::class, 'storeLiability'])->name('financial.storeLiability');

Route::get('financial/equity/create', [FinancialAnalysisController::class, 'createEquity'])->name('financial.createEquity');
Route::post('financial/equity/create', [FinancialAnalysisController::class, 'storeEquity'])->name('financial.storeEquity');

Route::get('financial/income-statement', [FinancialAnalysisController::class, 'incomeStatement'])->name('financial.incomeStatement');

Route::get('financial/fixed_and_variable_costs', [FinancialAnalysisController::class, 'fixedAndVariableCosts'])->name('financial.fixed_and_variable_costs');

Route::get('financial/operational_costs', [FinancialAnalysisController::class, 'operationalCosts'])->name('financial.operatoinal_costs');

Route::get('financial/selling_price', function() {
    return view('financial.selling_price');
})->name('financial.selling_price');

Route::post('financial/calculateSellingPrice', [FinancialAnalysisController::class, 'calculateSellingPrice'])->name('financial.calculateSellingPrice');

Route::get('financial/revenue', [FinancialAnalysisController::class, 'calculateRevenue'])->name('financial.revenue');

Route::get('financial/transaction_history', [FinancialAnalysisController::class, 'transactionHistory'])->name('financial.transaction_history');

Route::get('financial/consumer_demand', [FinancialAnalysisController::class, 'consumerDemand'])->name('financial.consumer_demand');

Route::get('financial/current_ratio', [FinancialAnalysisController::class, 'calculateCurrentRatio'])->name('financial.current_ratio');