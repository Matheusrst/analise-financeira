@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Demonstração de Resultados</h1>
    
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
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
