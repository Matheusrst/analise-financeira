@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transações</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Adicionar Transação</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Montante</th>
                <th>Tipo</th>
                <th>valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->description }}</td>
                <td>{{ number_format($transaction->amount, 2) }}</td>
                <td>{{ ucfirst($transaction->profit_or_cost) }}</td>
                <td>{{ number_format($transaction->price, 2) }}</td>
                <td>{{ $transaction->date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
