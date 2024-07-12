<!-- Esta view apresenta uma Análise Comparativa, mostrando diversos índices financeiros da empresa em comparação com a média da indústria. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Análise Comparativa</h1>
    
    <table class="table table-bordered">
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
                <td>{{ $liquidityRatio !== null ? number_format($liquidityRatio, 2, ',', '.') : 'N/A' }}</td>
                <td>{{ number_format($industryData['liquidity_ratio'], 2, ',', '.') }}</td>
                <td>{{ $liquidityRatio !== null ? number_format($liquidityRatio - $industryData['liquidity_ratio'], 2, ',', '.') : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Lucratividade Líquida (%)</td>
                <td>{{ $netProfitability !== null ? number_format($netProfitability, 2, ',', '.') : 'N/A' }}%</td>
                <td>{{ number_format($industryData['net_profitability'], 2, ',', '.') }}%</td>
                <td>{{ $netProfitability !== null ? number_format($netProfitability - $industryData['net_profitability'], 2, ',', '.') : 'N/A' }}%</td>
            </tr>
            <tr>
                <td>Índice de Dívida</td>
                <td>{{ $debtRatio !== null ? number_format($debtRatio, 2, ',', '.') : 'N/A' }}</td>
                <td>{{ number_format($industryData['debt_ratio'], 2, ',', '.') }}</td>
                <td>{{ $debtRatio !== null ? number_format($debtRatio - $industryData['debt_ratio'], 2, ',', '.') : 'N/A' }}</td>
            </tr>
            <tr>
                <td>Índice de Giro dos Ativos</td>
                <td>{{ $assetTurnoverRatio !== null ? number_format($assetTurnoverRatio, 2, ',', '.') : 'N/A' }}</td>
                <td>{{ number_format($industryData['asset_turnover_ratio'], 2, ',', '.') }}</td>
                <td>{{ $assetTurnoverRatio !== null ? number_format($assetTurnoverRatio - $industryData['asset_turnover_ratio'], 2, ',', '.') : 'N/A' }}</td>
            </tr>
        </tbody>
    </table>
    
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
