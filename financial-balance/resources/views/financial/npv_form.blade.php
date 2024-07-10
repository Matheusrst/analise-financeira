@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Calcular Valor Presente Líquido (VPL)</h1>

    <form action="{{ route('financial_calculateNPV') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="initial_investment">Investimento Inicial</label>
            <input type="number" name="initial_investment" id="initial_investment" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="discount_rate">Taxa de Desconto (%)</label>
            <input type="number" name="discount_rate" id="discount_rate" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Calcular VPL</button>
    </form>
</div>
@endsection
