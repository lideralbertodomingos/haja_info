
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Criar Conta</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png') }}">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Meet pages - The simplest and fastest way to build web UI for your dashboard or app."
        name="description" />
    <meta content="Ace" name="author" />
    <link href="{{ asset('admin/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet"
        type="text/css" media="screen" />
    <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"
        media="screen" />
    <link class="main-stylesheet" href="{{ asset('admin/pages/css/themes/corporate.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Please remove the file below for production: Contains demo classes -->
    <link class="main-stylesheet" href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        window.onload = function() {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML +=
                `<link rel="stylesheet" type="text/css" href="{{ asset('admin/pages/css/windows.chrome.fix.css') }}" />`
        }
    </script>
</head>

<body class="fixed-header menu-pin menu-behind">
    <div class="register-container full-height sm-p-t-5">
        <div class="d-flex justify-content-center flex-column full-height ">
            <img src="{{ asset('admin/assets/img/logo.png') }}" alt="logo"
                data-src="{{ asset('admin/assets/img/logo.png') }}"
                data-src-retina="{{ asset('admin/assets/img/logo_2x.png') }}" width="78" height="22">
            <h3>Criar uma Conta, para puder ter acesso a todas as nossas informações</h3>
            <p>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </p>
            <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Nome</label>
                            <input type="text" name="name" placeholder="Seu nome Completo" class="form-control" :value="old('name')" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Contacto</label>
                            <input type="text" name="contacto" placeholder="Nº de telefone" class="form-control"  :value="old('contacto')" autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Cidade</label>
                            <input type="text" name="cidade" placeholder="Sua Cidade" class="form-control"  :value="old('cidade')" autofocus required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Endereço</label>
                            <input type="text" name="endereco" placeholder="Seu Endereço" class="form-control"  :value="old('endereco')" autofocus required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control"  :value="old('email')" autofocus required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Senha</label>
                            <input type="password" name="password" placeholder="Senha"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Confirmar Senha</label>
                            <input type="password" name="password_confirmation"  placeholder="Confirmar Senha"
                                class="form-control" required>
                        </div>
                    </div>
                </div>
                <button aria-label="" class="btn btn-primary btn-cons m-t-10" type="submit">
                    Criar Conta
                </button>
            </form>
        </div>
    </div>
    <div class=" full-width">
        <div class="register-container m-b-10 clearfix">
            <div class="m-b-10 sm-m-t-10 sm-p-r-15 sm-p-b-10 clearfix d-flex-md-up">
                <div class="col-md-9 no-padding d-flex align-items-center">
                    <p class="hinted-text small inline sm-p-t-10">Já Possui uma conta? <a href="{{ route('login') }}">Fazer Login</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- START OVERLAY -->

    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    <script src="{{ asset('admin/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="{{ asset('admin/assets/plugins/liga.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript">
    </script>
    <!-- END VENDOR JS -->
    <script src="{{ asset('admin/pages/js/pages.min.js') }}"></script>
    <script>
        $(function() {
            $('#form-register').validate()
        })
    </script>
</body>

</html>
