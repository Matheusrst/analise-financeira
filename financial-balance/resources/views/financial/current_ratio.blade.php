@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Razão Corrente</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h2>Ativos Circulantes</h2>
            <p>R$ {{ number_format($currentAssets, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h2>Passivos Circulantes</h2>
            <p>R$ {{ number_format($currentLiabilities, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h3>Razão Corrente</h3>
            <p>{{ is_numeric($currentRatio) ? number_format($currentRatio, 2) : $currentRatio }}</p>
        </div>
    </div>

    <div class="alert alert-info" role="alert">
        <p>Uma razão corrente maior que 1 é geralmente considerada saudável.</p>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
