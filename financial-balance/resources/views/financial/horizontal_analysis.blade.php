@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Análise Horizontal</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mês</th>
                <th>Montante Líquido</th>
                <th>Variação (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($analysis as $month => $data)
            <tr>
                <td>{{ $month }}</td>
                <td>{{ number_format($data['net'], 2, ',', '.') }}</td>
                <td>{{ number_format($data['variation'], 2, ',', '.') }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
