<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
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
    return view('welcome');
});


Route::resource('transactions', TransactionController::class);

Route::get('financial/balance-sheet', [TransactionController::class, 'balanceSheet'])->name('financial.balance_sheet');
Route::get('financial/cash-flow-statement', [TransactionController::class, 'cashFlowStatement'])->name('financial.cash_flow_statement');