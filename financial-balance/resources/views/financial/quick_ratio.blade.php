@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Razão Rápida</h1>

    <h2>Ativos Circulantes (excluindo estoques): {{ $quickAssets }}</h2>
    <h2>Passivos Circulantes: {{ $currentLiabilities }}</h2>

    <h3>Razão Rápida: {{ is_numeric($quickRatio) ? number_format($quickRatio, 2) : $quickRatio }}</h3>

    <p>Uma razão rápida maior que 1 é geralmente considerada saudável.</p>

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
