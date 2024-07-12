<!-- Esta view permite calcular o preço de venda com base no custo e na margem de lucro desejada. -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Calcular Preço de Venda</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('financial.calculateSellingPrice') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="cost">Custo</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" required>
        </div>
        <div class="form-group mb-3">
            <label for="desired_margin">Margem de Lucro Desejada (%)</label>
            <input type="number" step="0.01" class="form-control" id="desired_margin" name="desired_margin" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </form>

    @if(isset($sellingPrice))
        <hr class="my-4">
        <h2>Resultados</h2>
        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Custo:</strong> R$ {{ number_format($cost, 2, ',', '.') }}</p>
                <p><strong>Margem de Lucro Desejada:</strong> {{ $desiredMargin }}%</p>
                <p><strong>Preço de Venda Ideal:</strong> R$ {{ number_format($sellingPrice, 2, ',', '.') }}</p>
            </div>
        </div>
    @endif
</div>
@endsection
