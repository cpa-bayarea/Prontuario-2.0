@extends('layouts.app')
@section('content-title', 'Prontuário')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Dados Gerais</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <a href="/prontuario/create" class="btn btn-warning">Novo</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered datatable">
                            <thead>
                            <tr>
                                <th>Ações</th>
                                <th>Numero</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($aItens as $item)
                                <tr>
                                    <td>
                                        <a href="/prontuario/{{base64_encode($item->id)}}/edit" class="btn btn-primary" title="Editar"><span class="fa fa-edit"></span></a>
                                        <a href="/prontuario/{{base64_encode($item->id)}}/destroy" class="btn btn-danger link-excluir" title="Excluir"><span class="fa fa-trash"></span></a>
                                    </td>
                                    <td>{{$item->numero}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection