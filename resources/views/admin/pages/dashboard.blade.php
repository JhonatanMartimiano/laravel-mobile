@extends('admin.layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" href="javascript:void(0)">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="align-items-center">
                            <div>
                                <p class="text-muted"><i class="far fa-chart-bar mr-2"></i>Vendas Hoje</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-primary">R${{ number_format($stats['vendas_hoje'], 2, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="align-items-center">
                            <div>
                                <p class="text-muted"><i class="far fa-chart-bar mr-2"></i>Vendas últimos 7 dias</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-cyan">R${{ number_format($stats['vendas_semana'], 2, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="align-items-center">
                            <div>
                                <p class="text-muted"><i class="far fa-chart-bar mr-2"></i>Vendas últimos 30 dias</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-purple">R${{ number_format($stats['vendas_mes'], 2, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="align-items-center">
                            <div>
                                <p class="text-muted"><i class="far fa-chart-bar mr-2"></i>Vendas último Ano</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="counter text-success">R${{ number_format($stats['vendas_ano'], 2, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
