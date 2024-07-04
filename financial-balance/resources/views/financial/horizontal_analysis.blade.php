@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Análise Horizontal</h1>
    <table border="1">
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
                <td>{{ number_format($data['net'], 2) }}</td>
                <td>{{ number_format($data['variation'], 2) }}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
