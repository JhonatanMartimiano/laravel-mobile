@extends('admin.layout.login')

@section('title', 'Acesso Restrito | DataPay Tecnologia')

@section('content')

    <div class="login-register" style="background-image:url({{ asset('admin/images/login-register.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
                <form class="ajax_submit" action="{{ route('login.do') }}" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center m-b-20">Acesso Restrito</h3>
                    <div class="col-12" id="response"></div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="email" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" required="" placeholder="Senha"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Lembrar senha</label>
                                </div>
                                {{--                                <div class="ml-auto">--}}
                                {{--                                    <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Esqueceu a senha?</a>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">ACESSAR</button>
                        </div>
                    </div>
                </form>
                {{--                <form class="form-horizontal" id="recoverform" action="index.html">--}}
                {{--                    <div class="form-group ">--}}
                {{--                        <div class="col-xs-12">--}}
                {{--                            <h3>Recuperar senha</h3>--}}
                {{--                            <p class="text-muted">Por favor, informe o seu e-mail! </p>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="form-group ">--}}
                {{--                        <div class="col-xs-12">--}}
                {{--                            <input class="form-control" type="text" required="" placeholder="Email"></div>--}}
                {{--                    </div>--}}
                {{--                    <div class="form-group text-center m-t-20">--}}
                {{--                        <div class="col-xs-12">--}}
                {{--                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </form>--}}
            </div>
        </div>
    </div>

@endsection
