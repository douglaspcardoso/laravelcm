@extends('admin.layouts.main')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Página
                        <small>Uniformes > Serviços > Adicionar Novo</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-file"></i> <a href="{{route('content.uniformes.servicos.index')}}">Página: Uniformes > Serviços</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Adicionar Novo
                        </li>
                    </ol>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading clearfix">
                                <h4 style="display: inline-block;">Novo Serviço</h4>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['class' => 'form-horizontal', 'route' => ['content.uniformes.servicos.items.store', $serviceId], 'method' => 'post']) !!}
                                <div class="form-group">
                                    <label for="title" class="col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subtitle" class="col-md-2">Subtitle</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                                               placeholder="Subtitle">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="3" id="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success pull-right" value="Salvar">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

@endsection