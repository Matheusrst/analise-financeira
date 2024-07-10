@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Valor Presente Líquido (VPL)</h1>

    <p>Investimento Inicial: {{ $initialInvestment }}</p>
    <p>Taxa de Desconto: {{ $discountRate * 100 }}%</p>
    <p>Valor Presente Líquido (VPL): {{ number_format($npv, 2) }}</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
