@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Adicionar Ativo</h1>
    
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
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row"><label for="description">Descrição</label></th>
                    <td><input type="text" class="form-control" id="description" name="description" required></td>
                </tr>
                <tr>
                    <th scope="row"><label for="amount">Valor</label></th>
                    <td><input type="number" step="0.01" class="form-control" id="amount" name="amount" required></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </form>
</div>
@endsection
