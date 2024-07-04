@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Balanço Patrimonial</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ativos</td>
                <td>{{ number_format($assets, 2) }}</td>
            </tr>
            <tr>
                <td>Passivos</td>
                <td>{{ number_format($liabilities, 2) }}</td>
            </tr>
            <tr>
                <td>Patrimônio Líquido</td>
                <td>{{ number_format($equity, 2) }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
