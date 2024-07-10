@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Calcular Taxa Interna de Retorno (TIR)</h1>

    <form action="{{ route('financial.calculateIRR') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="initial_investment">Investimento Inicial</label>
            <input type="number" name="initial_investment" id="initial_investment" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Calcular TIR</button>
    </form>
</div>
@endsection
