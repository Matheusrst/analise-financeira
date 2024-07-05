@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Balanço Patrimonial</h1>
    
    <h2>Ativos</h2>
    <ul>
        @foreach($assets as $asset)
            <li>{{ $asset->description }}: R$ {{ number_format($asset->amount, 2, ',', '.') }}</li>
        @endforeach
    </ul>
    <p>Total de Ativos: R$ {{ number_format($totalAssets, 2, ',', '.') }}</p>

    <h2>Passivos</h2>
    <ul>
        @foreach($liabilities as $liability)
            <li>{{ $liability->description }}: R$ {{ number_format($liability->amount, 2, ',', '.') }}</li>
        @endforeach
    </ul>
    <p>Total de Passivos: R$ {{ number_format($totalLiabilities, 2, ',', '.') }}</p>

    <h2>Patrimônio Líquido</h2>
    <ul>
        @foreach($equity as $eq)
            <li>{{ $eq->description }}: R$ {{ number_format($eq->amount, 2, ',', '.') }}</li>
        @endforeach
    </ul>
    <p>Total de Patrimônio Líquido: R$ {{ number_format($totalEquity, 2, ',', '.') }}</p>

    <h2>Equação Contábil</h2>
    <p>Total de Ativos = Total de Passivos + Total de Patrimônio Líquido</p>
    <p>R$ {{ number_format($totalAssets, 2, ',', '.') }} = R$ {{ number_format($totalLiabilities, 2, ',', '.') }} + R$ {{ number_format($totalEquity, 2, ',', '.') }}</p>
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
