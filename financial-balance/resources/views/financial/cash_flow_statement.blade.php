@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Demonstração do Fluxo de Caixa</h1>
    <table class="table">
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
</div>
@endsection
