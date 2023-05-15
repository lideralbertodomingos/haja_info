@extends('tema.admin')
@section('titulo', 'Destaque')

@section('pagina')
    <div class="row">
        <div class="col-lg-4 col-xl-3 col-xlg-2 ">
            <div class="row">
                <div class="col-lg-12 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <a href="{{ route('admin.jornal.index') }}">
                        <div class="widget-9 card  bg-success no-margin widget-loader-bar">
                            <div class="full-height d-flex flex-column">
                                <div class="card-header ">
                                    <div class="card-title">
                                        <span class="font-montserrat fs-11 all-caps">Jornal </span>
                                    </div>
                                    <div class="card-controls">
                                        <ul>
                                            <li><a href="#" class="card-refresh" data-toggle="refresh"><i
                                                        class="card-icon card-icon-refresh"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END WIDGET -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 m-b-10">
                    <!-- START WIDGET widget_progressTileFlat-->
                    <a href="{{ route('admin.categoria.index') }}">
                        <div class="widget-9 card  bg-info no-margin widget-loader-bar">
                            <div class="full-height d-flex flex-column">
                                <div class="card-header ">
                                    <div class="card-title">
                                        <span class="font-montserrat fs-11 all-caps">Categorias </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-9 col-xlg-6 m-b-10">
            <div class="row">
                <div class="col-md-12">
                    <!-- START WIDGET D3 widget_graphWidget-->
                    <div class="widget-12 card  widget-loader-circle no-margin">
                        <div class="row">
                            <div class="col-lg-8 ">
                                <div class="card-header  pull-up top-right ">
                                    <div class="card-controls">
                                        <ul>

                                            <li>
                                                <a data-toggle="refresh" class="card-refresh text-black" href="#"><i
                                                        class="card-icon card-icon-refresh"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="p-l-5">
                                        <h2 class="pull-left m-t-5 m-b-5">Usuários.</h2>
                                        <h2 class="pull-right m-r-25 m-t-5 m-b-5 text-success">
                                            <i class="pg-icon m-r-5">arrow_up</i>
                                            <span class="">{{ $user->count() }}</span>
                                        </h2>
                                        <div class="clearfix"></div>
                                        <div class="nvd3-line line-chart text-center" data-x-grid="false">
                                            <svg></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 p-l-15">
                                    <h3>Regras existentes</h3>
                                    <div class="company-stat-boxes">
                                        @foreach ($regras as $regra)
                                            <div data-index="0"
                                                class="company-stat-box m-t-15 active p-l-5 p-r-5 p-t-10 p-b-10 b-b b-grey">
                                                <div class="pull-left">
                                                    <p class="company-name pull-left text-uppercase bold no-margin">
                                                        <span class="text-success fs-11"></span> {{ $regra->nome }}
                                                    </p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>

    </div>
@endsection
