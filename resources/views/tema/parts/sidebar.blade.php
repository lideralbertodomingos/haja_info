<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-40"><img src="{{ asset('admin/assets/img/demo/social_app.svg') }}"
                        alt="socail">
                </a>
            </div>
            <div class="col-xs-6 no-padding">
                <a href="#" class="p-l-10"><img src="{{ asset('admin/assets/img/demo/email_app.svg') }}"
                        alt="socail">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-40"><img src="{{ asset('admin/assets/img/demo/calendar_app.svg') }}"
                        alt="socail">
                </a>
            </div>
            <div class="col-xs-6 m-t-20 no-padding">
                <a href="#" class="p-l-10"><img src="{{ asset('admin/assets/img/demo/add_more.svg') }}"
                        alt="socail">
                </a>
            </div>
        </div>
    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="{{ asset('admin/assets/img/logo_white.png') }}" alt="logo" class="brand"
            data-src="{{ asset('admin/assets/img/logo_white.png') }}"
            data-src-retina="{{ asset('admin/assets/img/logo_white_2x.png') }}" width="78" height="22">
        <div class="sidebar-header-controls">
            <button aria-label="Toggle Drawer" type="button"
                class="btn btn-icon-link invert sidebar-slide-toggle m-l-20 m-r-10" data-pages-toggle="#appMenu">
                <i class="pg-icon">chevron_down</i>
            </button>
            <button aria-label="Pin Menu" type="button"
                class="btn btn-icon-link invert d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none"
                data-toggle-pin="sidebar">
                <i class="pg-icon"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li class="m-t-20 ">
                <a href="{{ route('admin.index') }}" class="detailed">
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="m-t-20 ">
                <a href="{{ route('home.index') }}" class="detailed">
                    <span class="title">Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><span class="title">Jornal</span>
                    <span class=" arrow"></span></a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{ route('admin.jornal.index') }}">Lista de Jornais</a>
                        <span class="icon-thumbnail"><i class="pg-icon">LJ</i></span>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.jornal.create') }}">Adicionar Jornal</a>
                        <span class="icon-thumbnail"><i class="pg-icon">+J</i></span>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.categoria.index') }}">Lista de Categoria</a>
                        <span class="icon-thumbnail"><i class="pg-icon">LC</i></span>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.categoria.create') }}">Adicionar Categoria</a>
                        <span class="icon-thumbnail"><i class="pg-icon">+C</i></span>
                    </li>
                </ul>
            </li>
            @if (Auth::user()->regra->regra->nome == 'admin')
                <li>
                    <a href="javascript:;"><span class="title">Gestão de Usuarios</span>
                        <span class=" arrow"></span></a>
                    <ul class="sub-menu">
                        <li class="">
                            <a href="{{ route('admin.usuarios') }}">Lista dos Usuarios</a>
                            <span class="icon-thumbnail"><i class="pg-icon">U</i></span>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.regra.index') }}">Lista de Regras</a>
                            <span class="icon-thumbnail"><i class="pg-icon">+J</i></span>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.regra.create') }}">Adicionar Regra</a>
                            <span class="icon-thumbnail"><i class="pg-icon">+C</i></span>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.permissao.index') }}">Permissão</a>
                            <span class="icon-thumbnail"><i class="pg-icon">LC</i></span>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.permissao.create') }}">Nova Permissao</a>
                            <span class="icon-thumbnail"><i class="pg-icon">+C</i></span>
                        </li>
                        <li class="">
                            <a href="{{ route('admin.nova.lista') }}">lista de Permissao</a>
                            <span class="icon-thumbnail"><i class="pg-icon">+C</i></span>
                        </li>
                        <li class="">
                        <a href="{{ route('admin.nova.permissao') }}">Add Permissão a Regra</a>
                        <span class="icon-thumbnail"><i class="pg-icon">+C</i></span>
                    </li>
                    </ul>
                </li>
            @endif
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
