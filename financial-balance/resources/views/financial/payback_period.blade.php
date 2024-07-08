@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Período de Payback</h1>

    @if($paybackPeriodMonths != -1)
        <p>O investimento inicial de {{ $initialInvestment }} será recuperado em aproximadamente {{ $paybackPeriodMonths }} meses.</p>
    @else
        <p>O investimento inicial de {{ $initialInvestment }} não pode ser recuperado com o fluxo de caixa atual.</p>
    @endif

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar ao Painel de Controle</a>
</div>
@endsection
