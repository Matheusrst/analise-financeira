@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Índices Financeiros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Índice</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Índice de Liquidez Geral</td>
                <td>{{ $liquidityRatio !== null ? number_format($liquidityRatio, 2) : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Lucratividade Líquida (%)</td>
                <td>{{ $netProfitability !== null ? number_format($netProfitability, 2) : 'N/A' }}%</td>
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
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
