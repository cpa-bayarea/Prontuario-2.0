@extends('layouts.layout')
@section('title', 'Lista de Linha Teórica')
@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Linha Teórica</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Apoio</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Linha Teórica</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn-small btn btn-success" href="{{ route('linhas.create') }}">
                    <span class="glyphicon glyphicon-plus"></span>Novo
                </a>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lista de Linhas Teóricas</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="dataTables_wrapper form-inline dt-bootstrap">
                            <table class="table table-striped table-bordered table-hover dataTables dataTable">
                                <thead>
                                <tr>
                                    <th colspan="2" style="width: 5%; text-align: center;">Ações</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($linhas as $linha)
                                    <tr>
                                        <td align="center">
                                            <a href="{{ route('linhas.edit', $linha->id_linha_teorica) }}" class="btn btn-primary glyphicon glyphicon-pencil"></a>
                                        </td>
                                        <td align="center">
                                            <a>
                                                <form action="{{ route('linhas.destroy', $linha->id_linha_teorica )}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger glyphicon glyphicon-trash" type="submit"></button>
                                                </form>
                                            </a>
                                        </td>
                                        <td> {{ $linha->tx_nome }}</td>
                                        <td> {{ $linha->tx_desc ? $linha->tx_desc : ' - ' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
