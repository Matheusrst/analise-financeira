<!-- Esta view apresenta a Demonstração do Fluxo de Caixa, detalhando entradas, saídas e o fluxo de caixa líquido por mês. -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Demonstração do Fluxo de Caixa</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Mês</th>
                <th>Entradas de Caixa</th>
                <th>Saídas de Caixa</th>
                <th>Fluxo de Caixa Líquido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cashFlow as $month => $data)
            <tr>
                <td>{{ $month }}</td>
                <td>{{ number_format($data['inflows'], 2) }}</td>
                <td>{{ number_format($data['outflows'], 2) }}</td>
                <td>{{ number_format($data['net'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Voltar</a>
</div>
@endsection
