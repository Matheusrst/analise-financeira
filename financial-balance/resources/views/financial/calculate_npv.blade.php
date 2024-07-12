@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Valor Presente Líquido (VPL)</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Investimento Inicial</td>
                <td>{{ number_format($initialInvestment, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Taxa de Desconto</td>
                <td>{{ number_format($discountRate * 100, 2, ',', '.') }}%</td>
            </tr>
            <tr>
                <td>Valor Presente Líquido (VPL)</td>
                <td>{{ number_format($npv, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
