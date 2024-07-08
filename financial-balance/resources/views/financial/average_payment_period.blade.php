@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Prazo Médio de Pagamento (PMP)</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title">PMP: {{ $averagePaymentPeriod }} dias</h3>
        </div>
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">voltar</a>
    </div>
</div>
@endsection
