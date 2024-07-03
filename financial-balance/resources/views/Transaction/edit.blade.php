@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Transaction</h1>
    <form action="{{ route('transactions.update', $transaction) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $transaction->description }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ $transaction->amount }}" required>
        </div>
        <div class="form-group">
            <label for="transaction_date">Date</label>
            <input type="date" name="transaction_date" class="form-control" value="{{ $transaction->transaction_date }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
