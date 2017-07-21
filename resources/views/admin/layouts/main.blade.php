<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CM - Content Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Temaplate CSS -->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Summernote -->
    <link href="{{asset('js/plugins/summernote/summernote.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap FileInput -->
    <link href="{{asset('js/plugins/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('content.index')}}">CM - Content Manager</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b
                            class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#pages">
                        Paginas / Seções <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="pages" class="collapse">
                        <li>
                            <a href="/admin/page/home">Home</a>
                        </li>
                        <li>
                            <a href="/admin/page/contato">Contato</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#uniformes-sections">
                                Uniformes <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul id="uniformes-sections" class="collapse">
                                <li>
                                    <a href="/admin/page/uniformes-banner">Banner Principal</a>
                                </li>
                                <li>
                                    <a href="/admin/page/uniformes-sobre">Sobre</a>
                                </li>
                                <li>
                                    <a href="/admin/page/uniformes-produtos">Produtos</a>
                                </li>
                                <li>
                                    <a href="/admin/page/uniformes-servicos">Serviços</a>
                                </li>
                                <li>
                                    <a href="/admin/page/uniformes-clientes">Clientes</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#camisaria-sections">
                                Camisaria <i class="fa fa-fw fa-caret-down"></i>
                            </a>
                            <ul id="camisaria-sections" class="collapse">
                                <li>
                                    <a href="/admin/page/camisaria-banner">Banner Principal</a>
                                </li>
                                <li>
                                    <a href="/admin/page/camisaria-sobre">Sobre</a>
                                </li>
                                <li>
                                    <a href="/admin/page/camisaria-produtos">Produtos</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    @yield('content')

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Custom JavaScript -->
<script src="{{asset('js/custom.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('js/plugins/summernote/summernote.min.js')}}"></script>

<!-- Bootstrap FileInput -->
<script src="{{asset('js/plugins/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-fileinput/js/locales/pt-BR.js')}}"></script>

</body>

</html>
