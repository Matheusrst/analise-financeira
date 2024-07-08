@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cobertura de Juros</h1>

    <h2>Lucro Antes dos Juros e Impostos (EBIT): {{ $ebit }}</h2>
    <h2>Despesas de Juros: {{ $interestExpense }}</h2>

    <h3>Cobertura de Juros: {{ is_numeric($interestCoverage) ? number_format($interestCoverage, 2) : $interestCoverage }}</h3>

    <p>Uma cobertura de juros maior indica melhor capacidade de pagar juros sobre dívidas.</p>

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
