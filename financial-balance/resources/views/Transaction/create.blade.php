@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Transação</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" name="description" id="description" class="form-control" maxlength="255">
        </div>
        <div class="form-group">
            <label for="amount">Montante</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select name="type" id="type" class="form-control" required>
                <option value="revenue">Receita</option>
                <option value="expense">Despesa</option>
            </select>
        </div>
        <div class="form-group">
            <label for="profit_or_cost">Custo ou Lucro</label>
            <select name="profit_or_cost" id="profit_or_cost" class="form-control" required>
                <option value="profit">Lucro</option>
                <option value="cost">Custo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">valor</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
    </form>
</div>
@endsection
