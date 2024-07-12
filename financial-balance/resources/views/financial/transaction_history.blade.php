@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Histórico de Transações</h1>

    <h2>Todas as Transações</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ number_format($transaction->amount, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Transações Mensais</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Mês</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monthlyTransactions as $monthly)
                <tr>
                    <td>{{ $monthly->year }}</td>
                    <td>{{ $monthly->month }}</td>
                    <td>{{ number_format($monthly->total_amount, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
