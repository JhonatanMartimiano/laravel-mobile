<header class="topbar" style="background: #EDF1F5">
    <nav class="navbar top-navbar navbar-expand-md navbar-white">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <!-- Logo icon -->
                <b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('admin/images/logo-icon.png') }}" alt="homepage" class="dark-logo"/>
                    <!-- Light Logo icon -->
                    <img src="{{ asset('admin/images/logo-light-icon.png') }}" alt="homepage" class="light-logo"/>
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span>
                    <!-- dark Logo text -->
                    <img src="{{ asset('admin/images/logo-text.png') }}" alt="homepage" class="dark-logo"/>
                    <!-- Light Logo text -->
                    <img src="{{ asset('admin/images/logo-light-text.png') }}" class="light-logo" alt="homepage"/>
                </span>
            </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
{{--                <li class="nav-item"><a class="nav-link sidebartoggler nav-toggler d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a></li>--}}
            </ul>
        </div>
    </nav>
</header>

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav has-arrow">
            <ul id="sidebarnav">
                <li class="{!! Route::current()->getName() == "admin.dashboard" ? 'active' : '' !!}">
                    <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="fas fa-home"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="far fa-credit-card"></i><span class="hide-menu">Vendas Avulsa (POS)</span>
                    </a>

                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('venda-avulsa.cadastrar') }}" title="">Cadastrar</a></li>
                        <li><a href="{{ route('venda-avulsa.pesquisar') }}" title="">Pesquisar</a></li>
                        <li><a href="{{ route('venda-avulsa.importar') }}" title="">Importar</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('pre-conciliacao') }}" aria-expanded="false">
                        <i class="far fa-bookmark"></i><span class="hide-menu">Pré-Conciliação</span>
                    </a>
                </li>
                <hr>
                <li class="{!! Route::current()->getName() == "venda-detalhada.pesquisar" ? 'active' : '' !!}">
                    <a class="waves-effect waves-dark" href="{{ route('venda-detalhada.pesquisar') }}" aria-expanded="false">
                        <i class="fas fa-chart-bar"></i><span class="hide-menu">Vendas Detalhadas</span>
                    </a>
                </li>
                <li class="{!! Route::current()->getName() == "venda-resumo.pesquisar" ? 'active' : '' !!}">
                    <a class="waves-effect waves-dark" href="{{ route('venda-resumo.pesquisar') }}" aria-expanded="false">
                        <i class="fas fa-file-invoice-dollar"></i><span class="hide-menu">Resumo de Vendas</span>
                    </a>
                </li>
                <li class="{!! Route::current()->getName() == "venda-pendente.pesquisar" ? 'active' : '' !!}">
                    <a class="waves-effect waves-dark" href="{{ route('venda-pendente.pesquisar') }}" aria-expanded="false">
                        <i class="fas fa-exclamation-triangle"></i><span class="hide-menu">Vendas Pendentes</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('logout.do') }}" aria-expanded="false" title="sair do sistema">
                        <i class="fas fa-sign-out-alt"></i><span class="hide-menu">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
