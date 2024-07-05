@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Demonstração de Resultados</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Receitas</td>
                <td>{{ number_format($revenues, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Despesas</td>
                <td>{{ number_format($expenses, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Lucro Líquido</td>
                <td>{{ number_format($netIncome, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
