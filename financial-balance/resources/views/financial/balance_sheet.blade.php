<!-- Esta view apresenta o Balanço Patrimonial, detalhando Ativos, Passivos e Patrimônio Líquido, além da equação contábil. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Balanço Patrimonial</h1>
    
    <h2 class="mt-4">Ativos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Montante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{ $asset->description }}</td>
                <td>R$ {{ number_format($asset->amount, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total de Ativos:</strong> R$ {{ number_format($totalAssets, 2, ',', '.') }}</p>

    <h2 class="mt-4">Passivos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Montante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($liabilities as $liability)
            <tr>
                <td>{{ $liability->description }}</td>
                <td>R$ {{ number_format($liability->amount, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total de Passivos:</strong> R$ {{ number_format($totalLiabilities, 2, ',', '.') }}</p>

    <h2 class="mt-4">Patrimônio Líquido</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Montante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equity as $eq)
            <tr>
                <td>{{ $eq->description }}</td>
                <td>R$ {{ number_format($eq->amount, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total de Patrimônio Líquido:</strong> R$ {{ number_format($totalEquity, 2, ',', '.') }}</p>

    <h2 class="mt-4">Equação Contábil</h2>
    <p>Total de Ativos = Total de Passivos + Total de Patrimônio Líquido</p>
    <p>R$ {{ number_format($totalAssets, 2, ',', '.') }} = R$ {{ number_format($totalLiabilities, 2, ',', '.') }} + R$ {{ number_format($totalEquity, 2, ',', '.') }}</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
