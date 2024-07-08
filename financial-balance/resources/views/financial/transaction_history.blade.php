@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Histórico de Transações</h1>

    <h2>Todas as Transações</h2>
    <table class="table">
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
                    <td>{{ $transaction->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Transações Mensais</h2>
    <table class="table">
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
                    <td>{{ $monthly->total_amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
