<!-- Esta view exibe o faturamento mensal, trimestral, semestral e anual, permitindo análise de desempenho ao longo do tempo. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Faturamento</h1>
    <h2 class="mb-4 text-center">Desempenho ao longo do tempo</h2>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Mensal</h3>
            <p class="card-text">R$ {{ number_format($monthlyRevenue, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Trimestral</h3>
            <p class="card-text">R$ {{ number_format($quarterlyRevenue, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Semestral</h3>
            <p class="card-text">R$ {{ number_format($semiAnnualRevenue, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h3 class="card-title">Anual</h3>
            <p class="card-text">R$ {{ number_format($annualRevenue, 2, ',', '.') }}</p>
        </div>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
