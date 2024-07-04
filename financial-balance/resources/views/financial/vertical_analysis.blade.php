@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Análise Vertical</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Item</th>
                <th>Porcentagem</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ativos</td>
                <td>{{ number_format($assetsPercentage, 2) }}%</td>
            </tr>
            <tr>
                <td>Passivos</td>
                <td>{{ number_format($liabilitiesPercentage, 2) }}%</td>
            </tr>
            <tr>
                <td>Patrimônio Líquido</td>
                <td>{{ number_format($equityPercentage, 2) }}%</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
</div>
@endsection
