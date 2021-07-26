@extends('admin.layout.main')

@section('title', 'Cadastrar Conta')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Vendas Avulsas</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" href="javascript:void(0)">Vendas Avulsas</li>
                    <li class="breadcrumb-item active" href="javascript:void(0)">Pesquisar</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card pt-5 pb-5 mt-4">
                <div class="card-body text-center">
                    <h1 class="display-6"><span class="fas fa-tools mr-4 text-info"></span>Recurso em desenvolvimento!</h1>
                    <p class="lead">Estamos trabalhando nesta ferramenta e em breve você poderá acessar este recurso.</p>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="card">--}}
{{--        <header class="card-header">--}}
{{--            <h5 class="text-uppercase">Configurações de Pesquisa</h5>--}}
{{--        </header>--}}
{{--        <section class="card-body">--}}
{{--            <form class="" action="{{ route('venda-avulsa.cadastrar.do') }}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">PDV</label>--}}
{{--                            <select class="form-control" name="pdv" id="pdv" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Operadora</label>--}}
{{--                            <select class="form-control" name="operadora" id="operadora" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Bandeira</label>--}}
{{--                            <select class="form-control" name="bandeira" id="bandeira" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Grupo Serviço</label>--}}
{{--                            <select class="form-control" name="grupo_servico" id="grupo_servico" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Serviço</label>--}}
{{--                            <select class="form-control" name="grupo_servico" id="grupo_servico" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-5">--}}
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-6">--}}
{{--                                <label for="">Data</label>--}}
{{--                                <div class="input-group input-group-sm">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <span class="input-group-text">DE</span>--}}
{{--                                    </div>--}}
{{--                                    <input class="form-control" type="date" name="data_inicio" id="data_inicio">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-6">--}}
{{--                                <div class="input-group mt-4 pt-1 input-group-sm">--}}
{{--                                    <div class="input-group-prepend input-group-sm">--}}
{{--                                        <span class="input-group-text">ATÉ</span>--}}
{{--                                    </div>--}}
{{--                                    <input class="form-control" type="date" name="data_fim" id="data_fim">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-5">--}}
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-6">--}}
{{--                                <label for="">Horário</label>--}}
{{--                                <div class="input-group input-group-sm input-group-sm">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <span class="input-group-text">DE</span>--}}
{{--                                    </div>--}}
{{--                                    <input class="form-control" type="time" name="time_inicio" id="time_inicio">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-6">--}}
{{--                                <div class="input-group pt-1 mt-4 input-group-sm">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <span class="input-group-text">ATÉ</span>--}}
{{--                                    </div>--}}
{{--                                    <input class="form-control" type="time" name="time_fim" id="time_fim">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Autorização</label>--}}
{{--                            <input type="number" class="form-control" name="autorizacao" placeholder="Opcional">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-2">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">NSU</label>--}}
{{--                            <input type="number" class="form-control" name="nsu" placeholder="Opcional">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-8 pt-4">--}}
{{--                        <button class="btn btn-success pl-5 pr-5 mt-1">Pesquisar<i class="ml-2 fas fa-search"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </section>--}}
{{--    </div>--}}
@endsection
