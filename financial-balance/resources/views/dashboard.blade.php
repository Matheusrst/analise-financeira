@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Painel de Controle</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Transações</h3>
                    <p class="card-text">Gerencie suas transações financeiras</p>
                    <div class="list-group">
                        <a href="{{ route('transactions.index') }}" class="list-group-item list-group-item-action btn-primary mb-3">Listar Transações</a>
                        <a href="{{ route('transactions.create') }}" class="list-group-item list-group-item-action btn-success mb-3">Adicionar Transação</a>
                        <a href="{{ route('transactions.feedForm') }}" class="list-group-item list-group-item-action btn-warning mb-3">Adicionar Transações em Massa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Análises e Relatórios</h3>
                    <p class="card-text">Visualize e analise seu desempenho financeiro</p>
                    <div class="list-group">
                        <a href="{{ route('financial.balance_sheet') }}" class="list-group-item list-group-item-action btn-info mb-3">Balanço Patrimonial</a>
                        <a href="{{ route('financial.horizontal_analysis') }}" class="list-group-item list-group-item-action btn-info mb-3">Análise Horizontal</a>
                        <a href="{{ route('financial.vertical_analysis') }}" class="list-group-item list-group-item-action btn-info mb-3">Análise Vertical</a>
                        <a href="{{ route('financial.comparative_analysis') }}" class="list-group-item list-group-item-action btn-info mb-3">Análise Comparativa</a>
                        <a href="{{ route('financial.revenue') }}" class="list-group-item list-group-item-action btn-info mb-3">Faturamento</a>
                        <a href="{{ route('financial.consumer_demand') }}" class="list-group-item list-group-item-action btn-info mb-3">Demanda de Consumidores</a>
                        <a href="{{ route('financial.interest_coverage') }}" class="list-group-item list-group-item-action btn-info mb-3">Cobertura de Juros</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">indices</h3>
                    <p class="card-text">Gerencie os indices do seu negócio</p>
                    <div class="list-group">
                    <a href="{{ route('financial.financial_ratios') }}" class="list-group-item list-group-item-action btn-info mb-3">Índices Financeiros</a>
                    <a href="{{ route('financial.debt_ratio') }}" class="list-group-item list-group-item-action btn-info mb-3">Índice de Endividamento</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Ferramentas de Planejamento</h3>
                    <p class="card-text">Planeje e projete seu futuro financeiro</p>
                    <div class="list-group">
                        <a href="{{ route('financial.financial_projections') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Projeção Financeira</a>
                        <a href="{{ route('financial.calculateROI') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Calcular ROI</a>
                        <a href="{{ route('financial.calculateROE') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Calcular ROE</a>
                        <a href="{{ route('financial.calculateFreeCashFlow') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Calcular Fluxo de Caixa Livre</a>
                        <a href="{{ route('financial.current_ratio') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Razão Corrente</a>
                        <a href="{{ route('financial.quick_ratio') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Razão Rápida</a>
                        <a href="{{ route('financial.selling_price') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Definir preço de venda</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">calcular prazos</h3>
                    <p class="card-text">Gerencie todos os seus prazos</p>
                    <div class="list-group">
                        <a href="{{ route('financial.average_collection_period') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Prazo Médio de Recebimento</a>
                        <a href="{{ route('financial.average_payment_period') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Prazo Médio de Pagamento</a>
                        <a href="{{ route('financial.payback_period') }}" class="list-group-item list-group-item-action btn-secondary mb-3">Retorno do Investimento Inicial</a>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Ativos, Passivos e Patrimônio</h3>
                    <p class="card-text">Gerencie seus ativos, passivos e patrimônio líquido</p>
                    <div class="list-group">
                        <a href="{{ route('financial.createAsset') }}" class="list-group-item list-group-item-action btn-dark mb-3">Adicionar Ativo</a>
                        <a href="{{ route('financial.createLiability') }}" class="list-group-item list-group-item-action btn-dark mb-3">Adicionar Passivo</a>
                        <a href="{{ route('financial.createEquity') }}" class="list-group-item list-group-item-action btn-dark mb-3">Adicionar Patrimônio Líquido</a>
                        <a href="{{ route('financial.fixed_and_variable_costs') }}" class="list-group-item list-group-item-action btn-warning mb-3">Custos Fixos e Variáveis</a>
                        <a href="{{ route('financial.operationalCosts') }}" class="list-group-item list-group-item-action btn-warning mb-3">Custos Operacionais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Demonstrações Financeiras</h3>
                    <p class="card-text">Veja suas demonstrações financeiras detalhadas</p>
                    <div class="list-group">
                        <a href="{{ route('financial.incomeStatement') }}" class="list-group-item list-group-item-action btn-primary mb-3">Demonstração de Resultados</a>
                        <a href="{{ route('financial.transaction_history') }}" class="list-group-item list-group-item-action btn-primary mb-3">Histórico de Transações</a>
                        <a href="{{ route('financial.asset_turnover') }}" class="list-group-item list-group-item-action btn-primary mb-3">Giro do Ativo</a>
                        <a href="{{ route('financial.npv_form') }}" class="list-group-item list-group-item-action btn-warning mb-3">Ver VPL</a>
                        <a href="{{ route('financial.irr_form') }}" class="list-group-item list-group-item-action btn-warning mb-3">Ver IRR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
