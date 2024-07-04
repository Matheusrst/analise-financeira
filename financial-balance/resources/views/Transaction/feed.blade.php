@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Transações em Massa</h1>
    <form action="{{ route('transactions.feed') }}" method="POST">
        @csrf
        <div id="transactions-container">
            <div class="transaction">
                <div class="form-group">
                    <label for="transactions[0][description]">Descrição</label>
                    <input type="text" name="transactions[0][description]" class="form-control" maxlength="255">
                </div>
                <div class="form-group">
                    <label for="transactions[0][amount]">Montante</label>
                    <input type="number" name="transactions[0][amount]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="transactions[0][profit_or_cost]">Custo ou Lucro</label>
                    <select name="transactions[0][profit_or_cost]" class="form-control" required>
                        <option value="profit">Lucro</option>
                        <option value="cost">Custo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="transactions[0][price]">Preço</label>
                    <input type="number" step="0.01" name="transactions[0][price]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="transactions[0][date]">Data</label>
                    <input type="date" name="transactions[0][date]" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="button" id="add-transaction" class="btn btn-secondary mt-3">Adicionar Outra Transação</button>
        <button type="submit" class="btn btn-primary mt-3">Adicionar Transações</button>
    </form>
</div>

<script>
    document.getElementById('add-transaction').addEventListener('click', function() {
        const container = document.getElementById('transactions-container');
        const transactionCount = container.children.length;
        const newTransaction = container.children[0].cloneNode(true);

        newTransaction.querySelectorAll('input, select').forEach(function(input) {
            input.name = input.name.replace(/\d+/, transactionCount);
            input.value = '';
        });

        container.appendChild(newTransaction);
    });
</script>
@endsection
