@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Calcular Preço de Venda</h1>

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
        <div class="form-group">
            <label for="cost">Custo</label>
            <input type="number" step="0.01" class="form-control" id="cost" name="cost" required>
        </div>
        <div class="form-group">
            <label for="desired_margin">Margem de Lucro Desejada (%)</label>
            <input type="number" step="0.01" class="form-control" id="desired_margin" name="desired_margin" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
    </form>

    @if(isset($sellingPrice))
        <hr>
        <h2>Resultados</h2>
        <p><strong>Custo:</strong> R$ {{ number_format($cost, 2, ',', '.') }}</p>
        <p><strong>Margem de Lucro Desejada:</strong> {{ $desiredMargin }}%</p>
        <p><strong>Preço de Venda Ideal:</strong> R$ {{ number_format($sellingPrice, 2, ',', '.') }}</p>
    @endif
</div>
@endsection
