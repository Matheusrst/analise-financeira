@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Cobertura de Juros</h1>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Lucro Antes dos Juros e Impostos (EBIT)</th>
                <td>{{ $ebit }}</td>
            </tr>
            <tr>
                <th scope="row">Despesas de Juros</th>
                <td>{{ $interestExpense }}</td>
            </tr>
            <tr>
                <th scope="row">Cobertura de Juros</th>
                <td>{{ is_numeric($interestCoverage) ? number_format($interestCoverage, 2) : $interestCoverage }}</td>
            </tr>
        </tbody>
    </table>

    <p>Uma cobertura de juros maior indica melhor capacidade de pagar juros sobre dívidas.</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
