@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Transação</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="amount">Valor</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo</label>
            <select class="form-control" id="type" name="type" required>
                <option value="revenue">Receita</option>
                <option value="expense">Despesa</option>
            </select>
        </div>
        <div class="form-group">
            <label for="profit_or_cost">Lucro ou Custo</label>
            <select class="form-control" id="profit_or_cost" name="profit_or_cost" required>
                <option value="profit">Lucro</option>
                <option value="cost">Custo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
    </form>
</div>
@endsection
