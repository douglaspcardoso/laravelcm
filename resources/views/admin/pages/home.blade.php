@extends('admin.layouts.main')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Página
                        <small>Home</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Página: Home
                        </li>
                    </ol>
                    <div class="col-md-12">
                        {!! Form::open(['class' => 'form-horizontal', 'route' => ['content.home.update'], 'method' => 'put', 'files' => true]) !!}
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <h4>Banner Principal</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <img id='img-upload' src="{{$banner->image_url}}" alt="{{$banner->image_alt ? $banner->image_alt : "Nenhum banner cadastrado"}}"/>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-primary btn-file">
                                                        Alterar… <input type="file" id="imgInp" name="imgInp">
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success pull-right" value="Salvar">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

@endsection