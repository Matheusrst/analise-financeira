@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Rate of Return (IRR)</title>
    <link rel="stylesheet" href="{{ asset('css/financial.css') }}">
</head>
<body>
    <div class="container">
        <h1>Internal Rate of Return (IRR)</h1>
        <div class="result">
            <p>Initial Investment: {{ $initialInvestment }}</p>
            <p>IRR: {{ $irr }}%</p>
        </div>
    </div>
</body>
</html>

@endsection
