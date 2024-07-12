<!-- Esta view exibe o fluxo de caixa, apresentando a receita operacional total, a despesa operacional total e o fluxo de caixa líquido. -->
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow</title>
    <link rel="stylesheet" href="{{ asset('css/financial.css') }}">
</head>
<body>
    <div class="container">
        <h1>Cash Flow</h1>
        <div class="result">
            <p>Total Operational Income: {{ $totalOperationalIncome }}</p>
            <p>Total Operational Expense: {{ $totalOperationalExpense }}</p>
            <p>Net Cash Flow: {{ $netCashFlow }}</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </div>
</body>
</html>
@endsection
