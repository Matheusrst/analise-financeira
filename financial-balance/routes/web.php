<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use App\http\Controllers\FinancialAnalysisController;

// Rota para exibir o dashboard principal
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Rotas para transações, permitindo apenas index, create e store
Route::resource('transactions', TransactionController::class)->only(['index', 'create', 'store']);

// Rota para exibir o balanço patrimonial
Route::get('financial/balance-sheet', [TransactionController::class, 'balanceSheet'])->name('financial.balance_sheet');

// Rota para exibir a demonstração do fluxo de caixa
Route::get('financial/cash-flow-statement', [TransactionController::class, 'cashFlowStatement'])->name('financial.cash_flow_statement');

// Rota para exibir a análise horizontal das demonstrações financeiras
Route::get('financial/horizontal-analysis', [TransactionController::class, 'horizontalAnalysis'])->name('financial.horizontal_analysis');

// Rota para exibir os índices financeiros calculados a partir das demonstrações financeiras
Route::get('financial/financial-ratios', [TransactionController::class, 'financialRatios'])->name('financial.financial_ratios');

// Rota para exibir a análise vertical das demonstrações financeiras
Route::get('financial/vertical-analysis', [TransactionController::class, 'verticalAnalysis'])->name('financial.vertical_analysis');

// Rota para exibir a análise comparativa do desempenho financeiro da empresa
Route::get('financial/comparative-analysis', [TransactionController::class, 'comparativeAnalysis'])->name('financial.comparative_analysis');

// Rota para exibir as projeções financeiras da empresa
Route::get('financial/financial-projections', [TransactionController::class, 'financialProjections'])->name('financial.financial_projections');

// Rota para exibir o formulário de alimentação de transações em massa
Route::get('/transactions/feed', [TransactionController::class, 'feedForm'])->name('transactions.feedForm');

// Rota para processar a alimentação de dados em massa das transações
Route::post('/transactions/feed', [TransactionController::class, 'feedData'])->name('transactions.feed');

// Rota para calcular e exibir o ROI (Retorno sobre Investimento)
Route::get('financial/roi', [FinancialAnalysisController::class, 'calculateROI'])->name('financial.calculateROI');

// Rota para calcular e exibir o ROE (Retorno sobre o Patrimônio Líquido)
Route::get('financial/roe', [FinancialAnalysisController::class, 'calculateROE'])->name('financial.calculateROE');

// Rota para calcular e exibir o fluxo de caixa livre
Route::get('financial/free-cash-flow', [FinancialAnalysisController::class, 'calculateCashFlow'])->name('financial.calculateFreeCashFlow');

// Rota para exibir o formulário de criação de ativos
Route::get('financial/assets/create', [FinancialAnalysisController::class, 'createAsset'])->name('financial.createAsset');

// Rota para armazenar novos ativos no sistema
Route::post('financial/assets/create', [FinancialAnalysisController::class, 'storeAsset'])->name('financial.storeAsset');

// Rota para exibir o formulário de criação de passivos
Route::get('financial/liabilities/create', [FinancialAnalysisController::class, 'createLiability'])->name('financial.createLiability');

// Rota para armazenar novos passivos no sistema
Route::post('financial/liabilities/create', [FinancialAnalysisController::class, 'storeLiability'])->name('financial.storeLiability');

// Rota para exibir o formulário de criação de patrimônio líquido
Route::get('financial/equity/create', [FinancialAnalysisController::class, 'createEquity'])->name('financial.createEquity');

// Rota para armazenar novo patrimônio líquido no sistema
Route::post('financial/equity/create', [FinancialAnalysisController::class, 'storeEquity'])->name('financial.storeEquity');

// Rota para exibir a demonstração de resultados da empresa
Route::get('financial/income-statement', [FinancialAnalysisController::class, 'incomeStatement'])->name('financial.incomeStatement');

// Rota para exibir os custos fixos e variáveis da empresa
Route::get('financial/fixed_and_variable_costs', [FinancialAnalysisController::class, 'fixedAndVariableCosts'])->name('financial.fixed_and_variable_costs');

// Rota para exibir os custos operacionais da empresa
Route::get('financial/operational_costs', [FinancialAnalysisController::class, 'operationalCosts'])->name('financial.operatoinal_costs');

// Rota para exibir o formulário de cálculo do preço de venda ideal
Route::get('financial/selling_price', function() {
    return view('financial.selling_price');
})->name('financial.selling_price');

// Rota para processar o cálculo do preço de venda ideal
Route::post('financial/calculateSellingPrice', [FinancialAnalysisController::class, 'calculateSellingPrice'])->name('financial.calculateSellingPrice');

// Rota para exibir o faturamento da empresa
Route::get('financial/revenue', [FinancialAnalysisController::class, 'calculateRevenue'])->name('financial.revenue');

// Rota para exibir o histórico de transações da empresa
Route::get('financial/transaction_history', [FinancialAnalysisController::class, 'transactionHistory'])->name('financial.transaction_history');

// Rota para exibir a demanda de consumidores da empresa
Route::get('financial/consumer_demand', [FinancialAnalysisController::class, 'consumerDemand'])->name('financial.consumer_demand');

// Rota para calcular e exibir a razão corrente da empresa
Route::get('financial/current_ratio', [FinancialAnalysisController::class, 'calculateCurrentRatio'])->name('financial.current_ratio');

// Rota para calcular e exibir a razão rápida (quick ratio) da empresa
Route::get('financial/quick_ratio', [FinancialAnalysisController::class, 'calculateQuickRatio'])->name('financial.quick_ratio');

// Rota para calcular e exibir o índice de endividamento da empresa
Route::get('financial/debt_ratio', [FinancialAnalysisController::class, 'calculateDebtRatio'])->name('financial.debt_ratio');

// Rota para calcular e exibir a cobertura de juros da empresa
Route::get('financial/interest_coverage', [FinancialAnalysisController::class, 'calculateInterestCoverage'])->name('financial.interest_coverage');

// Rota para calcular e exibir o giro do ativo da empresa
Route::get('financial/asset_turnover', [FinancialAnalysisController::class, 'calculateAssetTurnover'])->name('financial.asset_turnover');
