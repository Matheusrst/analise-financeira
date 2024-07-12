<!-- Esta view permite ao usuário calcular o Valor Presente Líquido (VPL) com um investimento inicial e uma taxa de desconto. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Calcular Valor Presente Líquido (VPL)</h1>

    <form action="{{ route('financial_calculateNPV') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="initial_investment">Investimento Inicial</label>
                            <input type="number" name="initial_investment" id="initial_investment" class="form-control" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="discount_rate">Taxa de Desconto (%)</label>
                            <input type="number" name="discount_rate" id="discount_rate" class="form-control" required>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary mt-3">Calcular VPL</button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </form>
</div>
@endsection
