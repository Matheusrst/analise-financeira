@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Período de Payback</h1>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">Investimento Inicial</th>
                <td>{{ $initialInvestment }}</td>
            </tr>
            <tr>
                <th scope="row">Período de Payback</th>
                <td>
                    @if($paybackPeriodMonths != -1)
                        Aproximadamente {{ $paybackPeriodMonths }} meses
                    @else
                        Não pode ser recuperado com o fluxo de caixa atual
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
