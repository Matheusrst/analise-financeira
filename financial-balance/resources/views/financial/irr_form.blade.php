@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Calcular Taxa Interna de Retorno (TIR)</h1>

    <form action="{{ route('financial.calculateIRR') }}" method="POST">
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
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary mt-3">Calcular TIR</button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </form>
</div>
@endsection
