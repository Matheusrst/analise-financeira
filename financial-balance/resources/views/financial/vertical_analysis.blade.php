@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Análise Vertical</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Porcentagem</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ativos</td>
                <td>{{ number_format($assetsPercentage, 2, ',', '.') }}%</td>
            </tr>
            <tr>
                <td>Passivos</td>
                <td>{{ number_format($liabilitiesPercentage, 2, ',', '.') }}%</td>
            </tr>
            <tr>
                <td>Patrimônio Líquido</td>
                <td>{{ number_format($equityPercentage, 2, ',', '.') }}%</td>
            </tr>
        </tbody>
    </table>
    
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
