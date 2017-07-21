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
                            <i class="fa fa-file"></i> Página: Contato
                        </li>
                    </ol>
                    <div class="col-md-12">
                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading">
                                    <h4>Informações de contato</h4>
                                </div>
                                <div class="panel-body">
                                    {!! Form::open(['class' => 'form-horizontal', 'route' => ['content.contato.update'], 'method' => 'put', 'files' => true]) !!}
                                    <div class="form-group">
                                        <label for="email" class="col-md-2">E-mail</label>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="E-mail" value="{{$contato->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-md-2">Endereço</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="address" name="address"
                                                   placeholder="Endereço" value="{{$contato->address}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone1" class="col-md-2">Telefone 1</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="phone1" name="phone1"
                                                   placeholder="Telefone 1" value="{{$contato->phone1}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone2" class="col-md-2">Telefone 2</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="phone2" name="phone2"
                                                   placeholder="Telefone 2" value="{{$contato->phone2}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnpj" class="col-md-2">CNPJ</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="cnpj" name="cnpj"
                                                   placeholder="CNPJ" value="{{$contato->cnpj}}">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-success pull-right" value="Salvar">
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <!-- Default panel contents -->
                                <div class="panel-heading clearfix">
                                    <h4 style="display: inline-block;">Redes Sociais</h4>
                                    <div class="pull-right">
                                        <a href="{{route('content.contato.redes.create', $contato->id)}}"
                                           class="btn btn-success {{$contato->id ? '' : 'disabled'}}">
                                            <i class="fa fa-plus"></i> Rede Social
                                        </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="col-md-3">Name</th>
                                                <th class="col-md-6">Url</th>
                                                <th class="col-md-3 text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($contato->networks as $network)
                                                <tr>
                                                    <td>{{$network->social}}</td>
                                                    <td>{{$network->url}}</td>
                                                    <td class="text-center">
                                                        <a href="{{route('content.contato.redes.edit',
                                                        ['contact' => $contato->id, 'rede' => $network->id])}}" class="btn-sm btn-primary">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="{{route('content.contato.redes.destroy',
                                                        ['contact' => $contato->id, 'rede' => $network->id])}}" class="btn-sm btn-danger">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Nenhuma rede social cadastrada</td>
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