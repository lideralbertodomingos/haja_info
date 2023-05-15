@extends('tema.web')
@section('titulo', 'Categoria '. $categoria->nome )

@section('pagina')
    <!-- News With Sidebar Start -->
    <div class="container-fluid  mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Categoria</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none"
                                    >{{ $categoria->nome }}</a>
                            </div>
                        </div>
                        @foreach ($jornais as $j)
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
                    {{ $jornais->links() }}
                </div>

                <div class="col-lg-4">
                    @include('pages.home.parts.siderbar')
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->
@endsection
