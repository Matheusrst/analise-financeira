@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Painel de Controle</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Transações</h3>
                    <p class="card-text">Gerencie suas transações financeiras</p>
                    <div class="list-group">
                        <a href="{{ route('transactions.index') }}" class="list-group-item list-group-item-action btn-primary">Listar Transações</a>
                        <th>|</th>
                        <a href="{{ route('transactions.create') }}" class="list-group-item list-group-item-action btn-success">Adicionar Transação</a>
                        <th>|</th>
                        <a href="{{ route('transactions.feedForm') }}" class="list-group-item list-group-item-action btn-warning">Adicionar Transações em Massa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Análises e Relatórios</h3>
                    <p class="card-text">Visualize e analise seu desempenho financeiro</p>
                    <div class="list-group">
                        <a href="{{ route('financial.balance_sheet') }}" class="list-group-item list-group-item-action btn-info">Balanço Patrimonial</a>
                        <th>|</th>
                        <a href="{{ route('financial.horizontal_analysis') }}" class="list-group-item list-group-item-action btn-info">Análise Horizontal</a>
                        <th>|</th>
                        <a href="{{ route('financial.vertical_analysis') }}" class="list-group-item list-group-item-action btn-info">Análise Vertical</a>
                        <th>|</th>
                        <a href="{{ route('financial.financial_ratios') }}" class="list-group-item list-group-item-action btn-info">Índices Financeiros</a>
                        <th>|</th>
                        <a href="{{ route('financial.comparative_analysis') }}" class="list-group-item list-group-item-action btn-info">Análise Comparativa</a>
                        <th>|</th>
                        <a href="{{ route('financial.revenue') }}" class="list-group-item list-group-item-action btn-info">Faturamento</a>
                        <th>|</th>
                        <a href="{{ route('financial.debt_ratio') }}" class="list-group-item list-group-item-action btn-info">Índice de Endividamento</a>
                        <th>|</th>
                        <a href="{{ route('financial.consumer_demand') }}" class="list-group-item list-group-item-action btn-info">Demanda de Consumidores</a>
                        <th>|</th>
                        <a href="{{ route('financial.interest_coverage') }}" class="list-group-item list-group-item-action btn-info">Cobertura de Juros</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Ferramentas de Planejamento</h3>
                    <p class="card-text">Planeje e projete seu futuro financeiro</p>
                    <div class="list-group">
                        <a href="{{ route('financial.financial_projections') }}" class="list-group-item list-group-item-action btn-secondary">Projeção Financeira</a>
                        <th>|</th>
                        <a href="{{ route('financial.calculateROI') }}" class="list-group-item list-group-item-action btn-secondary">Calcular ROI</a>
                        <th>|</th>
                        <a href="{{ route('financial.calculateROE') }}" class="list-group-item list-group-item-action btn-secondary">Calcular ROE</a>
                        <th>|</th>
                        <a href="{{ route('financial.calculateFreeCashFlow') }}" class="list-group-item list-group-item-action btn-secondary">Calcular Fluxo de Caixa Livre</a>
                        <th>|</th>
                        <a href="{{ route('financial.current_ratio') }}" class="list-group-item list-group-item-action btn-secondary">Razão Corrente</a>
                        <th>|</th>
                        <a href="{{ route('financial.quick_ratio') }}" class="list-group-item list-group-item-action btn-secondary">Razão Rápida</a>
                        <th>|</th>
                        <a href="{{ route('financial.selling_price') }}" class="list-group-item list-group-item-action btn-secondary">Definir preço de venda</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Ativos, Passivos e Patrimônio</h3>
                    <p class="card-text">Gerencie seus ativos, passivos e patrimônio líquido</p>
                    <div class="list-group">
                        <a href="{{ route('financial.createAsset') }}" class="list-group-item list-group-item-action btn-dark">Adicionar Ativo</a>
                        <th>|</th>
                        <a href="{{ route('financial.createLiability') }}" class="list-group-item list-group-item-action btn-dark">Adicionar Passivo</a>
                        <th>|</th>
                        <a href="{{ route('financial.createEquity') }}" class="list-group-item list-group-item-action btn-dark">Adicionar Patrimônio Líquido</a>
                        <th>|</th>
                        <a href="{{ route('financial.fixed_and_variable_costs') }}" class="list-group-item list-group-item-action btn-warning">Custos Fixos e Variáveis</a>
                        <th>|</th>
                        <a href="{{ route('financial.operationalCosts') }}" class="list-group-item list-group-item-action btn-warning">Custos Operacionais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Demonstrações Financeiras</h3>
                    <p class="card-text">Veja suas demonstrações financeiras detalhadas</p>
                    <div class="list-group">
                        <a href="{{ route('financial.incomeStatement') }}" class="list-group-item list-group-item-action btn-primary">Demonstração de Resultados</a>
                        <th>|</th>
                        <a href="{{ route('financial.transaction_history') }}" class="list-group-item list-group-item-action btn-primary">Histórico de Transações</a>
                        <th>|</th>
                        <a href="{{ route('financial.asset_turnover') }}" class="list-group-item list-group-item-action btn-primary">Giro do Ativo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
