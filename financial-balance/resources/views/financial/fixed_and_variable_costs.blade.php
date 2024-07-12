<!-- Esta view exibe os custos fixos e variáveis, mostrando o total de cada categoria. -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Custos Fixos e Variáveis</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Custos Fixos</h5>
                    <p class="card-text">Total: R$ {{ number_format($fixedCosts, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Custos Variáveis</h5>
                    <p class="card-text">Total: R$ {{ number_format($variableCosts, 2, ',', '.') }}</p>
                </div>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
        </div>
    </div>
</div>
@endsection
