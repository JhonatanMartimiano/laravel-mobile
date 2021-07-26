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
                    <li class="breadcrumb-item active" href="javascript:void(0)">Importar</li>
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
{{--            <h5 class="text-uppercase">Importar Vendas</h5>--}}
{{--        </header>--}}
{{--        <div class="col-12">--}}
{{--            <section class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-6">--}}
{{--                        <form class="" action="{{ route('venda-avulsa.cadastrar.do') }}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="">Selecionar arquivo</label>--}}
{{--                                        <input class="form-control" type="file" name="arquivo" id="arquivo" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <button class="btn btn-info pr-5 pl-5" type="submit">Enviar<i class="fas fa-upload ml-2"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div class="col-6">--}}
{{--                        <ul class="list-group list-group-flush pl-3">--}}
{{--                            <li class="list-group-item">--}}
{{--                                <p class="m-0">Formato suportado: <strong>TXT</strong></p>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item">--}}
{{--                                <p class="m-0">Manual de criação do arquivo <br><a class="btn btn-success btn-sm mt-2" target="_blank" href="http://189.50.133.171/PortalCliente/Downloads/Arquivo_Guia.pdf">Download<i class="ml-2 fas fa-download"></i></a></p>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item">--}}
{{--                                <p class="m-0">Manual de criação do arquivo <br><a class="btn btn-success btn-sm mt-2">Download<i class="ml-2 fas fa-download"></i></a></p>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </div>--}}

{{--    </div>--}}
@endsection
