<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HAJA INF | @yield('titulo')</title>

    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('site/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('site/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">{{ Geral::data() }}</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="{{ route('home.conversa') }}">Contactos</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="{{ route('perfil.index') }}">{{ Auth::user()->name }}</a>
                            </li>
                            @if (Auth::user()->regra->regra->nome == 'admin' ||
                                    Auth::user()->regra->regra->nome == 'escritor' ||
                                    Auth::user()->regra->regra->nome == 'editor')
                                <li class="nav-item">
                                    <a class="nav-link text-body small" href="{{ route('admin.index') }}">Painel de
                                        Control</a>
                                </li>
                            @endif
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn">Sair</button>
                            </form>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="{{ route('login') }}">Fazer login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-body small" href="{{ route('register') }}">Criar Conta</a>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.facebook.com/albertodomingoss"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="https://www.whatsapp.com/+244932843383"><small class="fab fa-whatsapp"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="{{ route('home.index') }}" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Haja Info<span
                        class="text-white font-weight-normal">Jornal</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('home.index') }}"
                        class="nav-item nav-link @if (Route::is('home.index')) active @endif">Home</a>
                    <a href="{{ route('home.categoria.index') }}"
                        class="nav-item nav-link @if (Route::is('home.categoria.index')) active @endif">Categoria</a>
                    <a href="{{ route('home.sobre') }}"
                        class="nav-item nav-link @if (Route::is('home.sobre')) active @endif">Sobre Nós</a>
                    <a href="{{ route('home.conversa') }}"
                        class="nav-item nav-link @if (Route::is('home.conversa')) active @endif">Contacto</a>
                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <form id="search" action="{{ route('home.search') }}" method="get">
                        @csrf
                        <div class="input-group-append">
                            <input type="seacrh" name="search" class="form-control border-0" placeholder="HAJA">
                            <button class="input-group-text bg-primary text-dark border-0 px-3">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Main News Slider Start -->
    @yield('pagina')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Encontre-nos</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Lalula, junto a escola de sargentos</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+244 932843383</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>hajainformation@hotmail.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Siga-nos</h6>
                <div class="d-flex justify-content-start">

                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.facebook.com/albertodomingoss"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.instagram.com/albertodomingoss"><i
                            class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i
                            class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Noticias Popular</h5>
                @foreach (Geral::Jornal(4) as $jo)
                    <div class="mb-3">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                href="{{ route('home.categoria', $jo->categoria->link) }}">{{ $jo->categoria->nome }}</a>
                            <a class="text-body"><small>{{ Geral::DataF($jo->created_at) }}</small></a>
                        </div>
                        <a class="small text-body text-uppercase font-weight-medium"
                            href="{{ route('home.jornal.detalhe', $jo->link) }}">{{ $jo->titulo }}</a>
                    </div>
                @endforeach

            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categorias</h5>
                <div class="m-n1">
                    @foreach (Geral::Categoria(10) as $categoria)
                        <a href="{{ route('home.categoria', $categoria->link) }}"
                            class="btn btn-sm btn-secondary m-1">{{ $categoria->nome }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Links Recentes</h5>
                <div class="row">
                    @foreach (Geral::Jornal(9) as $jo)
                        <div class="col-4 mb-3">
                            <a href="{{ route('home.jornal.detalhe', $jo->link) }}">
                                <img class="w-100" src="{{ $jo->imagem }}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">
            &copy; {{ date('Y') }} <a href="{{ route('home.index') }}">HajaInf</a>. Todos o Direitos reselvados.
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('site/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('site/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>
