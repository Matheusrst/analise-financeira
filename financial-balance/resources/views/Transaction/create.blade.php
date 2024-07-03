@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Transaction</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="transaction_date">Date</label>
            <input type="date" name="transaction_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
</div>
@endsection
