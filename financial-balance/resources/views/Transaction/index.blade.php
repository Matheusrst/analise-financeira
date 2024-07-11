@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Transações</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-success mb-3">Adicionar Transação</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Montante</th>
                    <th>Tipo</th>
                    <th>Tipo de Custo</th>
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
                    <td>{{ ucfirst($transaction->cost_type) }}</td>
                    <td>{{ $transaction->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
