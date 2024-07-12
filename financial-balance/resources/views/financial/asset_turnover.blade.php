<!-- Esta view exibe informações sobre o giro do ativo, incluindo receita total, ativos totais médios e o cálculo do giro do ativo. -->
 
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Giro do Ativo</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Receita Total</td>
                <td>{{ number_format($totalRevenue, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Ativos Totais Médios</td>
                <td>{{ number_format($averageAssets, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Giro do Ativo</td>
                <td>{{ is_numeric($assetTurnover) ? number_format($assetTurnover, 2) : $assetTurnover }}</td>
            </tr>
        </tbody>
    </table>

    <p>Um giro do ativo maior indica melhor eficiência em utilizar os ativos para gerar receita.</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
