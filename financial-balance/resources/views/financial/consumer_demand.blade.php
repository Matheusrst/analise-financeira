<!-- Esta view apresenta a Demanda de Consumidores, mostrando transações recentes e a demanda por produto, incluindo quantidades compradas e receita total. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Demanda de Consumidores</h1>

    <h2 class="mb-3">Transações Recentes</h2>
    <table class="table table-striped">
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
                    <td>R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mt-4 mb-3">Demanda por Produto</h2>
    <table class="table table-striped">
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
                    <td>R$ {{ number_format($demand->total_revenue, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
