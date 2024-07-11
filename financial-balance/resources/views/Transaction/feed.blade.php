@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Adicionar Transações em Massa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('transactions.feed') }}" method="POST">
        @csrf
        <div id="transactions-container">
            <div class="transaction">
                <div class="form-group">
                    <label for="transactions[0][description]">Descrição</label>
                    <input type="text" class="form-control" id="transactions[0][description]" name="transactions[0][description]" required>
                </div>
                <div class="form-group">
                    <label for="transactions[0][amount]">Valor</label>
                    <input type="number" step="0.01" class="form-control" id="transactions[0][amount]" name="transactions[0][amount]" required>
                </div>
                <div class="form-group">
                    <label for="transactions[0][type]">Tipo</label>
                    <select class="form-control" id="transactions[0][type]" name="transactions[0][type]" required>
                        <option value="revenue">Receita</option>
                        <option value="expense">Despesa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transactions[0][profit_or_cost]">Lucro ou Custo</label>
                    <select class="form-control" id="transactions[0][profit_or_cost]" name="transactions[0][profit_or_cost]" required>
                        <option value="profit">Lucro</option>
                        <option value="cost">Custo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transactions[0][cost_type]">Tipo de Custo</label>
                    <select class="form-control" id="transactions[0][cost_type]" name="transactions[0][cost_type]">
                        <option value="">Selecione</option>
                        <option value="fixed">Fixo</option>
                        <option value="variable">Variável</option>
                        <option value="operational">Operacional</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transactions[0][date]">Data</label>
                    <input type="date" class="form-control" id="transactions[0][date]" name="transactions[0][date]" required>
                </div>
                <hr>
            </div>
        </div>
        <button type="button" id="add-transaction" class="btn btn-secondary mb-3">Adicionar Transação</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </form>
</div>

<script>
    document.getElementById('add-transaction').addEventListener('click', function() {
        const container = document.getElementById('transactions-container');
        const index = container.children.length;
        const newTransaction = container.children[0].cloneNode(true);
        newTransaction.querySelectorAll('input, select').forEach(input => {
            input.name = input.name.replace(/\[\d+\]/, `[${index}]`);
            input.id = input.id.replace(/\[\d+\]/, `[${index}]`);
            input.value = '';
        });
        container.appendChild(newTransaction);
    });
</script>
@endsection
