@extends('admin.layouts.main')

@section('content')

    <div id="page-wrapper">

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Página
                        <small>Contato > Redes Sociais > Editar</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-file"></i> <a href="{{route('content.contato.index')}}">Página: Contato</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Editar
                        </li>
                    </ol>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading clearfix">
                                <h4 style="display: inline-block;">Editar Rede Social</h4>
                            </div>
                            <div class="panel-body">
                                {!! Form::open(['class' => 'form-horizontal', 'route' => ['content.contato.redes.update', $network->contact_id, $network->id]   , 'method' => 'put']) !!}
                                <div class="form-group">
                                    <label for="social" class="col-sm-2">Social</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="social" name="social">
                                            <option value="">Selecione...</option>
                                            <option value="instagram" {{$network->social == 'instagram' ? 'selected' : ''}}>Instagram</option>
                                            <option value="facebook" {{$network->social == 'facebook' ? 'selected' : ''}}>Facebook</option>
                                            <option value="pinterest" {{$network->social == 'pinterest' ? 'selected' : ''}}>Pinterest</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="url" class="col-md-2">URL</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="url" name="url"
                                               placeholder="URL" value="{{$network->url}}">
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