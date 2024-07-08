@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Razão Corrente</h1>

    <h2>Ativos Circulantes: {{ $currentAssets }}</h2>
    <h2>Passivos Circulantes: {{ $currentLiabilities }}</h2>

    <h3>Razão Corrente: {{ is_numeric($currentRatio) ? number_format($currentRatio, 2) : $currentRatio }}</h3>

    <p>Uma razão corrente maior que 1 é geralmente considerada saudável.</p>

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
