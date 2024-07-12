@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Prazo Médio de Pagamento (PMP)</h1>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">PMP</th>
                <td>{{ $averagePaymentPeriod }} dias</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
