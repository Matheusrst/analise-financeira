<!-- Esta view exibe os Índices Financeiros, apresentando o índice de liquidez geral, lucratividade líquida, índice de dívida e índice de giro dos ativos. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Índices Financeiros</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Índice</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Índice de Liquidez Geral</td>
                <td>{{ $liquidityRatio !== null ? number_format($liquidityRatio, 2) : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Lucratividade Líquida (%)</td>
                <td>{{ $netProfitability !== null ? number_format($netProfitability, 2) . '%' : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Índice de Dívida</td>
                <td>{{ $debtRatio !== null ? number_format($debtRatio, 2) : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Índice de Giro dos Ativos</td>
                <td>{{ $assetTurnoverRatio !== null ? number_format($assetTurnoverRatio, 2) : 'N/A' }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
