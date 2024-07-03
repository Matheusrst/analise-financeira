@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transactions</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transaction</a>
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->description }}</td>
                <td>{{ $transaction->amount }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection