@extends('admin.layouts.main')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Página
                        <small>Uniformes > Produtos</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Página: Uniformes > Produtos
                        </li>
                    </ol>
                    <div class="col-md-12">
                        {!! Form::open(['class' => 'form-horizontal', 'route' => ['content.uniformes.produtos.update'],
                        'method' => 'put', 'files' => true]) !!}
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading clearfix">
                                <h4>Descrição da página</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="title" class="col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Title" value="{{$gallery->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="description" name="description"
                                               placeholder="Description" value="{{$gallery->description}}">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success pull-right" value="Salvar">
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading">
                                <h4>Galeria de Fotos</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="container-fluid">

                                        <div class="row">
                                            <div class="col-md-12">
                                                @if($gallery->id)
                                                    <input id="uniformes_gallery_images" name="gallery_images[]" type="file" multiple=true class="file-loading">
                                                @else
                                                    <span>É necessário salvar os dados da galeria para adicionar produtos.</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
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