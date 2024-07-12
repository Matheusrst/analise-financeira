{{-- Esta view é utilizada para adicionar uma nova transação, permitindo que o usuário insira detalhes como descrição, valor, tipo, e data. --}}

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Adicionar Transação</h1>
    
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
            <label for="cost_type">Tipo de Custo</label>
            <select class="form-control" id="cost_type" name="cost_type">
                <option value="">Selecione</option>
                <option value="fixed">Fixo</option>
                <option value="variable">Variável</option>
                <option value="operational">Operacional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-success">Adicionar</button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </form>
</div>
@endsection
