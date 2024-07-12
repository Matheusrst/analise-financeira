<!-- Esta view exibe o Retorno sobre o Investimento (ROI). -->
@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return on Investment (ROI)</title>
    <link rel="stylesheet" href="{{ asset('css/financial.css') }}">
</head>
<body>
    <div class="container">
        <h1>Return on Investment (ROI)</h1>
        <div class="result">
            <p>ROI: {{ $roi }}%</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </div>
</body>
</html>
@endsection
