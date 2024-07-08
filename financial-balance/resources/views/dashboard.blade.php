@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Painel de Controle</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Transações</h3>
                    <p class="card-text">Gerencie suas transações financeiras</p>
                    <a href="{{ route('transactions.index') }}" class="btn btn-primary btn-block mb-2">Listar Transações</a>
                    <th>|</th>
                    <a href="{{ route('transactions.create') }}" class="btn btn-success btn-block mb-2">Adicionar Transação</a>
                    <th>|</th>
                    <a href="{{ route('transactions.feedForm') }}" class="btn btn-warning btn-block">Adicionar Transações em Massa</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Análises e Relatórios</h3>
                    <p class="card-text">Visualize e analise seu desempenho financeiro</p>
                    <a href="{{ route('financial.balance_sheet') }}" class="btn btn-info btn-block mb-2">Balanço Patrimonial</a>
                    <th>|</th>
                    <a href="{{ route('financial.horizontal_analysis') }}" class="btn btn-info btn-block mb-2">Análise Horizontal</a>
                    <th>|</th>
                    <a href="{{ route('financial.vertical_analysis') }}" class="btn btn-info btn-block mb-2">Análise Vertical</a>
                    <th>|</th>
                    <a href="{{ route('financial.financial_ratios') }}" class="btn btn-info btn-block mb-2">Índices Financeiros</a>
                    <th>|</th>
                    <a href="{{ route('financial.comparative_analysis') }}" class="btn btn-info btn-block">Análise Comparativa</a>
                    <th>|</th>
                    <a href="{{ route('financial.revenue') }}" class="list-group-item list-group-item-action">Faturamento</a>
                    <th>|</th>
                    <a href="{{ route('financial.debt_ratio') }}" class="list-group-item list-group-item-action">Índice de Endividamento</a>
                    <th>|</th>
                    <a href="{{ route('financial.consumer_demand') }}" class="list-group-item list-group-item-action">Demanda de Consumidores</a>
                    <th>|</th>
                    <a href="{{ route('financial.interest_coverage') }}" class="list-group-item list-group-item-action">Cobertura de Juros</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Ferramentas de Planejamento</h3>
                    <p class="card-text">Planeje e projete seu futuro financeiro</p>
                    <a href="{{ route('financial.financial_projections') }}" class="btn btn-secondary btn-block mb-2">Projeção Financeira</a>
                    <th>|</th>
                    <a href="{{ route('financial.calculateROI') }}" class="btn btn-secondary btn-block mb-2">Calcular ROI</a>
                    <th>|</th>
                    <a href="{{ route('financial.calculateROE') }}" class="btn btn-secondary btn-block mb-2">Calcular ROE</a>
                    <th>|</th>
                    <a href="{{ route('financial.calculateFreeCashFlow') }}" class="btn btn-secondary btn-block">Calcular Fluxo de Caixa Livre</a>
                    <th>|</th>
                    <a href="{{ route('financial.current_ratio') }}" class="list-group-item list-group-item-action">Razão Corrente</a>
                    <th>|</th>
                    <a href="{{ route('financial.quick_ratio') }}" class="list-group-item list-group-item-action">Razão Rápida</a>
                    <th>|</th>
                    <a href="{{ route('financial.selling_price') }}" class="btn btn-secondary btn-block">Definir preço de venda</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Ativos, Passivos e Patrimônio</h3>
                    <p class="card-text">Gerencie seus ativos, passivos e patrimônio líquido</p>
                    <a href="{{ route('financial.createAsset') }}" class="btn btn-dark btn-block mb-2">Adicionar Ativo</a>
                    <th>|</th>
                    <a href="{{ route('financial.createLiability') }}" class="btn btn-dark btn-block mb-2">Adicionar Passivo</a>
                    <th>|</th>
                    <a href="{{ route('financial.createEquity') }}" class="btn btn-dark btn-block">Adicionar Patrimônio Líquido</a>
                    <th>|</th>
                    <a href="{{ route('financial.fixed_and_variable_costs') }}" class="btn btn-warning btn-block">custos fixos e variaveis</a>
                    <th>|</th>
                    <a href="{{ route('financial.operatoinal_costs') }}" class="btn btn-warning btn-block">custos operacionais</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Demonstrações Financeiras</h3>
                    <p class="card-text">Veja suas demonstrações financeiras detalhadas</p>
                    <a href="{{ route('financial.incomeStatement') }}" class="btn btn-primary btn-block">Demonstração de Resultados</a>
                    <th>|</th>
                    <a href="{{ route('financial.transaction_history') }}" class="list-group-item list-group-item-action">Histórico de Transações</a>
                    <th>|</th>
                    <a href="{{ route('financial.asset_turnover') }}" class="list-group-item list-group-item-action">Giro do Ativo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
