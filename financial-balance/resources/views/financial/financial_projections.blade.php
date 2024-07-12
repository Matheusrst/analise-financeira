<!-- Esta view exibe as Projeções Financeiras, mostrando a receita projetada, despesas projetadas e lucro líquido projetado para cada ano. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Projeções Financeiras</h1>

    <table class="table table-striped">
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
                    <td>R$ {{ number_format($projection['revenue'], 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($projection['expenses'], 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($projection['net_income'], 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
