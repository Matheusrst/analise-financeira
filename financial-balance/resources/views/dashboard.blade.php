@extends('layouts.app')

@section('content')
<div >
    <h1>Painel de Controle</h1>
    <div class="list-group">
        <a href="{{ route('transactions.index') }}" class="list-group-item list-group-item-action">Listar Transações</a>
        <th>|</th>
        <a href="{{ route('transactions.create') }}" class="list-group-item list-group-item-action">Adicionar Transação</a>
        <th>|</th>
        <a href="{{ route('transactions.feedForm') }}" class="list-group-item list-group-item-action">Adicionar Transações em Massa</a>
        <th>|</th>
        <a href="{{ route('financial.horizontal_analysis') }}" class="list-group-item list-group-item-action">Análise Horizontal</a>
        <th>|</th>
        <a href="{{ route('financial.vertical_analysis') }}" class="list-group-item list-group-item-action">Análise Vertical</a>
        <th>|</th>
        <a href="{{ route('financial.financial_ratios') }}" class="list-group-item list-group-item-action">Índices Financeiros</a>
        <th>|</th>
        <a href="{{ route('financial.comparative_analysis') }}" class="list-group-item list-group-item-action">Análise Comparativa</a>
        <th>|</th>
        <a href="{{ route('financial.financial_projections') }}" class="list-group-item list-group-item-action">Projeção Financeira</a>
        <th>|</th>
        <a href="{{ route('financial.calculateROI') }}" class="list-group-item list-group-item-action">Calcular ROI</a>
        <th>|</th>
        <a href="{{ route('financial.calculateROE') }}" class="list-group-item list-group-item-action">Calcular ROE</a>
    </div>
</div>
@endsection
