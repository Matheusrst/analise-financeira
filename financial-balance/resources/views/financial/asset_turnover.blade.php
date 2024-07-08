@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Giro do Ativo</h1>

    <h2>Receita Total: {{ $totalRevenue }}</h2>
    <h2>Ativos Totais Médios: {{ $averageAssets }}</h2>

    <h3>Giro do Ativo: {{ is_numeric($assetTurnover) ? number_format($assetTurnover, 2) : $assetTurnover }}</h3>

    <p>Um giro do ativo maior indica melhor eficiência em utilizar os ativos para gerar receita.</p>

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
