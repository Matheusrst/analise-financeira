@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return on Equity (ROE)</title>
    <link rel="stylesheet" href="{{ asset('css/financial.css') }}">
</head>
<body>
    <div class="container">
        <h1>Return on Equity (ROE)</h1>
        @if(isset($error))
            <div class="error">
                <p>{{ $error }}</p>
            </div>
        @else
            <div class="result">
                <p>ROE: {{ $roe }}%</p>
            </div>
        @endif
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
    </div>
</body>
</html>
@endsection