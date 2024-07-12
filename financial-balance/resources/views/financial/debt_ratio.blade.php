<!-- Esta view exibe o Índice de Endividamento, apresentando os passivos totais, patrimônio líquido e o cálculo do índice de endividamento, além de uma interpretação sobre seu significado. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Índice de Endividamento</h1>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Passivos Totais</th>
                <td>{{ $totalLiabilities }}</td>
            </tr>
            <tr>
                <th scope="row">Patrimônio Líquido</th>
                <td>{{ $totalEquity }}</td>
            </tr>
            <tr>
                <th scope="row">Índice de Endividamento</th>
                <td>{{ is_numeric($debtRatio) ? number_format($debtRatio, 2) : $debtRatio }}</td>
            </tr>
        </tbody>
    </table>

    <p>Um índice de endividamento menor indica menor dependência de dívidas.</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
