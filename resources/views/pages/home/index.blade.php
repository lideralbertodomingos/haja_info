@extends('tema.web')
@section('titulo', 'Destaque')

@section('pagina')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-0">
                <div class="owl-carousel main-carousel position-relative">
                    @foreach (Geral::Jornal(3) as $jornal)
                        <div class="position-relative overflow-hidden" style="height: 500px;">
                            <img class="img-fluid h-100" src="{{ $jornal->imagem }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="{{ route('home.categoria', $jornal->categoria->link) }}">
                                        {{ $jornal->categoria->nome }}
                                    </a>
                                    <span class="text-white">{{ Geral::DataF($jornal->created_at) }}</span>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                    href="{{ route('home.jornal.detalhe', $jornal->link) }}">{{ $jornal->titulo }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="row mx-0">
                    @foreach (Geral::Jornal(4) as $jornal)
                        <div class="col-md-6 px-0">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img class="img-fluid w-100 h-100" src="{{ $jornal->imagem }}" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="{{ route('home.categoria', $jornal->categoria->link) }}">{{ $jornal->categoria->nome }}</a>
                                        <a class="text-white"><small>{{ Geral::DataF($jornal->created_at) }}</small></a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                        href="{{ route('home.jornal.detalhe', $jornal->link) }}">{{ $jornal->titulo }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">
                            Destaque</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            @foreach (Geral::Jornal(10) as $jornal)
                                <div class="text-truncate">
                                    <a class="text-white text-uppercase font-weight-semi-bold" href="{{ route('home.jornal.detalhe', $jornal->link) }}">
                                        {{ $jornal->titulo }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Recentes</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none"
                                    href="{{ route('home.jornal.index') }}">Ver Todos</a>
                            </div>
                        </div>
                        @foreach (Geral::Jornal(8) as $j)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ $j->imagem }}" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="{{ route('home.categoria', $j->categoria->link) }}">{{ $j->categoria->nome }}</a>
                                            <a class="text-body"><small>{{ Geral::DataF($j->created_at) }}</small></a>
                                        </div>
                                        <p class="m-0">{{ $j->titulo }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="{{ asset('site/img/user.jpg') }}"
                                                width="25" height="25" alt="">
                                            <small>{{ $j->user->name }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('pages.home.parts.siderbar')
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection
