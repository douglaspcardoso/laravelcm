@extends('admin.layouts.main')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Página
                        <small>Uniformes > Sobre</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Página: Uniformes > Sobre
                        </li>
                    </ol>
                    <div class="col-md-12">
                        {!! Form::open(['class' => 'form-horizontal', 'route' => ['content.uniformes.sobre.update'],
                        'method' => 'put']) !!}
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <h4>Descrição da Página</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="title" class="col-md-2">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="title" value="{{$about->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-md-2">Description</label>
                                        <div class="col-md-10">
                                            <textarea id="sobre-summernote-description" name="description">{{$about->description}}</textarea>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-success pull-right" value="Salvar">
                                </div>
                            </div>
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