<!-- Esta view apresenta a Taxa Interna de Retorno (TIR), exibindo o investimento inicial e o valor da TIR. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Taxa Interna de Retorno (TIR)</h1>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td><strong>Investimento Inicial:</strong></td>
                <td>{{ $initialInvestment }}</td>
            </tr>
            <tr>
                <td><strong>TIR:</strong></td>
                <td>{{ $irr }}%</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
