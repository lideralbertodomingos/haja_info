<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HAJA INF | @yield('titulo')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png')  }}">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png')  }}">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png')  }}">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png')  }}">
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
    <link href="{{ asset('admin/assets/plugins/nvd3/nv.d3.min.css') }}" rel="stylesheet" type="text/css"
        media="screen" />
    <link href="{{ asset('admin/assets/plugins/mapplic/css/mapplic.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/rickshaw/rickshaw.min.css') }}" rel="stylesheet" type="text/css" />
    <link class="main-stylesheet" href="{{ asset('admin/pages/css/themes/corporate.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Please remove the file below for production: Contains demo classes -->
    <link class="main-stylesheet" href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="fixed-header dashboard menu-pin menu-behind">
    <!-- BEGIN SIDEBPANEL-->
    @include('tema.parts.sidebar')
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
        <!-- START HEADER -->
        @include('tema.parts.menu')
        <!-- END HEADER -->
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content sm-gutter">
                <!-- START CONTAINER FLUID -->
                <div class="container-fluid padding-25 sm-padding-10">
                    @yield('pagina')
                </div>
                <!-- END CONTAINER FLUID -->
            </div>
            <!-- END PAGE CONTENT -->
            <!-- START COPYRIGHT -->
            <!-- START CONTAINER FLUID -->
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid  container-fixed-lg footer">
                <div class="copyright sm-text-center">
                    <p class="small-text no-margin pull-left sm-pull-reset">
                        &copy; {{ date('Y') }} Todos o direitos reservados. HajaInf

                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- END COPYRIGHT -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!--START QUICKVIEW -->
    @include('tema.parts.modal')
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
    <script src="{{ asset('admin/assets/plugins/nvd3/lib/d3.v3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/nvd3/nv.d3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/nvd3/src/utils.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/nvd3/src/tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/nvd3/src/interactiveLayer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/nvd3/src/models/axis.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/nvd3/src/models/line.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/plugins/nvd3/src/models/lineWithFocusChart.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin/assets/plugins/mapplic/js/hammer.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/mapplic/js/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/mapplic/js/mapplic.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('admin/assets/plugins/skycons/skycons.js') }}" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ asset('admin/pages/js/pages.js') }}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('admin/assets/js/dashboard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
</body>

</html>
