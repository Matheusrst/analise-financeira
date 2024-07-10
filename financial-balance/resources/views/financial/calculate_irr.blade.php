@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Taxa Interna de Retorno (TIR)</h1>

    <p>Investimento Inicial: {{ $initialInvestment }}</p>
    <p>Taxa Interna de Retorno (TIR): {{ number_format($irr * 100, 2) }}%</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
