<!-- Esta view exibe os custos operacionais totais formatados para o usuário. -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Custos Operacionais</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Custos Operacionais</h5>
                    <p class="card-text">Total: R$ {{ number_format($operationalCosts, 2, ',', '.') }}</p>
                </div>
            </div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
        </div>
    </div>
</div>
@endsection
