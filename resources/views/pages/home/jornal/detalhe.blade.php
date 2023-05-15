@extends('tema.web')
@section('titulo', $jornal->titulo)

@section('pagina')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{ $jornal->imagem }}" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="{{ route('home.categoria',$jornal->categoria->link) }}">{{ $jornal->categoria->nome }}</a>
                            <a class="text-body" href="">{{ Geral::DataF($jornal->created_at) }}</a>
                        </div>
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $jornal->titulo }}</h1>
                        <p>{!! $jornal->descricao !!}.</p>
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">
                            <span>{{ $jornal->user->name }}</span>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

            </div>

            <div class="col-lg-4">
                @include('pages.home.parts.siderbar')
            </div>
        </div>
    </div>
</div>

@endsection
