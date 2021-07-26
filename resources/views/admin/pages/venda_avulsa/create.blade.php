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
                    <li class="breadcrumb-item active" href="javascript:void(0)">Cadastrar</li>
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

{{--    <div class="row card">--}}
{{--        <header class="card-header">--}}
{{--            <h5 class="text-uppercase">Cadastro de vendas</h5>--}}
{{--        </header>--}}
{{--        <section class="card-body col-12">--}}
{{--            <form class="" action="{{ route('venda-avulsa.cadastrar.do') }}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Operadora</label>--}}
{{--                            <select class="form-control" name="" id="" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Bandeira</label>--}}
{{--                            <select class="form-control" name="" id="" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Código de Autorização</label>--}}
{{--                            <input type="number" class="form-control" name="codigo_autorizacao" id="codigo_autorizacao" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">NSU</label>--}}
{{--                            <input type="number" class="form-control" name="nsu" id="nsu" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Valor</label>--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                    <span class="input-group-text">R$</span>--}}
{{--                                </div>--}}
{{--                                <input class="form-control" type="text" name="valor" id="valor" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Parcelas</label>--}}
{{--                            <input class="form-control" type="number" name="parcelas" id="parcelas" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-6">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Data</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input class="form-control" type="date" name="data" id="data" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="">Horário</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text"><i class="far fa-clock"></i></span>--}}
{{--                                        </div>--}}
{{--                                        <input class="form-control" type="time" name="horario" id="horario" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Identificação PDV</label>--}}
{{--                            <input class="form-control" type="number" name="parcelas" id="parcelas" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Grupo</label>--}}
{{--                            <select class="form-control" name="grupo" id="grupo" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                                <option value="">Venda em Crédito</option>--}}
{{--                                <option value="">Venda em Débito</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="">Serviço</label>--}}
{{--                            <select class="form-control" name="servico" id="servico" required>--}}
{{--                                <option value="">Selecione...</option>--}}
{{--                                <option value="">Crédito à vista</option>--}}
{{--                                <option value="">Crédito Parc. Adm</option>--}}
{{--                                <option value="">Crédito à vista com juros</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="row mt-3">--}}
{{--                    <div class="col-12">--}}
{{--                        <button class="btn btn-info pr-5 pl-5" type="submit">SALVAR<i class="fas fa-save ml-2"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </section>--}}
{{--    </div>--}}
@endsection
