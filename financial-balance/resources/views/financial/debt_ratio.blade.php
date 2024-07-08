@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Índice de Endividamento</h1>

    <h2>Passivos Totais: {{ $totalLiabilities }}</h2>
    <h2>Patrimônio Líquido: {{ $totalEquity }}</h2>

    <h3>Índice de Endividamento: {{ is_numeric($debtRatio) ? number_format($debtRatio, 2) : $debtRatio }}</h3>

    <p>Um índice de endividamento menor indica menor dependência de dívidas.</p>

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
