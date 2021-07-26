@extends('admin.layout.main')

@section('title', 'Vendas Pendentes')

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Vendas Pendentes</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" href="javascript:void(0)">Vendas Pendentes</li>
                    <li class="breadcrumb-item active" href="javascript:void(0)">Pesquisar</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="card">
        <header class="card-header">
            <h5 class="text-uppercase">Configurações de Pesquisa</h5>
        </header>
        <section class="card-body">
            <form class="ajax_submit" action="{{ route('venda-pendente.pesquisar.do') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">PDV</label>
                            <select class="form-control" name="TransacaoTerminal" id="TransacaoTerminal" required>
                                <option value="-1" selected>TODOS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Operadora</label>
                            <select class="form-control" name="RedeNome" id="RedeNome" required>
                                <option value="-1" selected>TODAS</option>
                                @foreach($operadoras as $key => $item)
                                    <option value="{{ $item['nome'] }}">{{ $item['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Bandeira</label>
                            <select class="form-control" name="BandeiraNome" id="BandeiraNome" required>
                                <option value="-1" selected>TODAS</option>
                                @foreach($bandeiras as $key => $item)
                                    <option value="{{ $item['nome'] }}">{{ $item['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Grupo Serviço</label>
                            <select class="form-control" name="GrupoServicoDescricao" id="GrupoServicoDescricao" required>
                                <option value="-1" selected>TODOS</option>
                                <option value="Cartão de Crédito">Venda em Crédito</option>
                                <option value="Cartão de Débito">Venda em Débito</option>
                                <option value="Não Informado">Não Informado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Data</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DE</span>
                                    </div>
                                    <input class="form-control" type="date" name="data_inicio" id="data_inicio" required>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="input-group mt-4 pt-1 input-group-sm">
                                    <div class="input-group-prepend input-group-sm">
                                        <span class="input-group-text">ATÉ</span>
                                    </div>
                                    <input class="form-control" type="date" name="data_fim" id="data_fim">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Horário</label>
                                <div class="input-group input-group-sm input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">DE</span>
                                    </div>
                                    <input class="form-control" type="time" name="HoraInicio" id="HoraInicio">
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="input-group pt-1 mt-4 input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ATÉ</span>
                                    </div>
                                    <input class="form-control" type="time" name="HoraFim" id="HoraFim">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">Autorização</label>
                            <input type="text" class="form-control" name="TransacaoCodigoAutorizacao" id="TransacaoCodigoAutorizacao" placeholder="Opcional">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">NSU</label>
                            <input type="text" class="form-control" name="TransacaoNSU" id="TransacaoNSU" placeholder="Opcional">
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-success pl-5 pr-5 mt-4">Pesquisar<i class="ml-2 fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <div class="card">
        <header class="card-header">
            <h5 class="text-uppercase">Resultados da pesquisa</h5>
        </header>
        <section class="card-body" id="report-data">
            <div class="alert alert-light">Nenhuma busca realizada<i class="fas fa-exclamation-triangle ml-2"></i></div>
        </section>
    </div>

    <div id="modal-content"></div>

@endsection
