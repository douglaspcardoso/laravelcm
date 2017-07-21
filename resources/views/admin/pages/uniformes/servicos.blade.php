@extends('admin.layouts.main')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Página
                        <small>Uniformes > Serviços</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Página: Uniformes > Serviços
                        </li>
                    </ol>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading clearfix">
                                <h4 style="display: inline-block;">Descrição da Página</h4>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['class' => 'form-horizontal', 'route' => ['content.uniformes.servicos.' . ($service->id ? 'update' : 'store'), $service->id], 'method' => ($service->id ? 'put' : 'post')]) !!}
                                <div class="form-group">
                                    <label for="title" class="col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Title" value="{{$service->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="description" name="description"
                                               placeholder="Description" value="{{$service->description}}">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success pull-right" value="Salvar">
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading clearfix">
                                <h4 style="display: inline-block;">Itens</h4>
                                <div class="pull-right">
                                    <a href="{{route('content.uniformes.servicos.items.create', $service->id)}}"
                                       class="btn btn-success {{$service->id ? '' : 'disabled'}}">
                                        <i class="fa fa-plus"></i> Serviços
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="col-md-8">Title</th>
                                            <th class="col-md-4 text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($service->items as $item)
                                            <tr>
                                                <td>{{$item->title}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('content.uniformes.servicos.items.edit',
                                                    ['service' => $service->id, 'item' => $item->id])}}" class="btn-sm btn-primary">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="{{route('content.uniformes.servicos.items.destroy',
                                                    ['service' => $service->id, 'item' => $item->id])}}" class="btn-sm btn-danger">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2">Nenhum serviço cadastrado</td>
                                            </tr>
                                        @endforelse

                                        </tbody>
                                    </table>
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