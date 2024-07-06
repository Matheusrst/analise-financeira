@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Faturamento</h1>
    <h2>Desempenho ao longo do tempo</h2>

    <div class="card">
        <div class="card-body">
            <h3>Mensal</h3>
            <p>R$ {{ number_format($monthlyRevenue, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h3>Trimestral</h3>
            <p>R$ {{ number_format($quarterlyRevenue, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h3>Semestral</h3>
            <p>R$ {{ number_format($semiAnnualRevenue, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h3>Anual</h3>
            <p>R$ {{ number_format($annualRevenue, 2, ',', '.') }}</p>
        </div>
    </div>
</div>
@endsection
