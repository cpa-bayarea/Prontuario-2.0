@extends('layouts.app')
@section('content-title', 'Status de Prontuário')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dados Gerais</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ route('prontuariostatus.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp;Novo</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>Ações</th>
                                        <th>Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($aItens as $item)
                                    <tr>
                                        <td>
                                            <a href="/prontuariostatus/{{base64_encode($item->id)}}/edit"
                                               class="btn btn-primary" title="Editar">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <a href="/prontuariostatus/{{base64_encode($item->id)}}/destroy"
                                               class="btn btn-danger link-excluir" title="Excluir">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                        <td>{{$item->nome}}</td>
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
