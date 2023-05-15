<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HAJA INF | @yield('titulo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home.index') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('perfil.conta') }}">Informacao</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('perfil.editar') }}">Atualização</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('perfil.voucher') }}">Voucher</a>
                </li>
            </ul>
            <span class="navbar-text">
                Deus é bom em todos os momentos!!!
            </span>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2">
                <aside class="bg-light top-0 bottom-0 h-100">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Histórico de compras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Configurações</a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main -->
            <main class="col-md-10">
                @yield('pagina')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    @yield('scripts')
</body>

</html>
