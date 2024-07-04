@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Projeções Financeiras</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Receita Projeta</th>
                <th>Despesas Projetadas</th>
                <th>Lucro Líquido Projetado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projections as $projection)
            <tr>
                <td>{{ $projection['year'] }}</td>
                <td>{{ number_format($projection['revenue'], 2) }}</td>
                <td>{{ number_format($projection['expenses'], 2) }}</td>
                <td>{{ number_format($projection['net_income'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
