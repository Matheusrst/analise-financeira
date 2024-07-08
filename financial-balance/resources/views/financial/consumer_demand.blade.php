@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Demanda de Consumidores</h1>

    <h2>Transações Recentes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td>{{ $transaction->product_id }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->amount }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Demanda por Produto</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID do Produto</th>
                <th>Quantidade Comprada</th>
                <th>Receita Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productDemand as $demand)
                <tr>
                    <td>{{ $demand->product_id }}</td>
                    <td>{{ $demand->purchase_count }}</td>
                    <td>{{ $demand->total_revenue }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
