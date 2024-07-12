<!-- Esta view apresenta o Prazo Médio de Recebimento (PMR), que indica o tempo médio que a empresa leva para receber pagamentos. -->
 
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Prazo Médio de Recebimento (PMR)</h1>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">PMR</th>
                <td>{{ $averageCollectionPeriod }} dias</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
