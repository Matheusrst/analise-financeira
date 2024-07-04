@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Análise Comparativa</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Índice</th>
                <th>Empresa</th>
                <th>Indústria</th>
                <th>Diferença</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Índice de Liquidez Geral</td>
                <td>{{ $liquidityRatio !== null ? number_format($liquidityRatio, 2) : 'N/A' }}</td>
                <td>{{ number_format($industryData['liquidity_ratio'], 2) }}</td>
                <td>{{ $liquidityRatio !== null ? number_format($liquidityRatio - $industryData['liquidity_ratio'], 2) : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Lucratividade Líquida (%)</td>
                <td>{{ $netProfitability !== null ? number_format($netProfitability, 2) : 'N/A' }}%</td>
                <td>{{ number_format($industryData['net_profitability'], 2) }}%</td>
                <td>{{ $netProfitability !== null ? number_format($netProfitability - $industryData['net_profitability'], 2) : 'N/A' }}%</td>
            </tr>
            <tr>
                <td>Índice de Dívida</td>
                <td>{{ $debtRatio !== null ? number_format($debtRatio, 2) : 'N/A' }}</td>
                <td>{{ number_format($industryData['debt_ratio'], 2) }}</td>
                <td>{{ $debtRatio !== null ? number_format($debtRatio - $industryData['debt_ratio'], 2) : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Índice de Giro dos Ativos</td>
                <td>{{ $assetTurnoverRatio !== null ? number_format($assetTurnoverRatio, 2) : 'N/A' }}</td>
                <td>{{ number_format($industryData['asset_turnover_ratio'], 2) }}</td>
                <td>{{ $assetTurnoverRatio !== null ? number_format($assetTurnoverRatio - $industryData['asset_turnover_ratio'], 2) : 'N/A' }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
