@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Ativo</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('financial.storeAsset') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="amount">Valor</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
    </form>
</div>
@endsection
