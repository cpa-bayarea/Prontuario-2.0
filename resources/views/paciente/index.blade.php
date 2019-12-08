@extends('layouts.app')
@section('content-title', 'Pacientes')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dados Gerais</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ route('paciente.create') }}" class="btn-novo btn btn-success">
                            <i class="fa fa-plus"></i>&nbsp;Novo
                        </a>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th> Ações</th>
                                        <th>Nome completo</th>
                                        <th>Data nascimento</th>
                                        {{--                                        <th>Telefone</th>--}}
                                        <th>E-mail</th>
                                        <th>Cidade - UF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($aItens as $paciente)
                                    <tr>
                                        <td>
                                            <a href="{{ route('paciente.edit', base64_encode($paciente->id)) }}"
                                               class="btn btn-primary" title="Editar">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <a href="{{ route('paciente.delete', base64_encode($paciente->id)) }}"
                                               class="btn btn-danger link-excluir" title="Excluir">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                        <td>{{$paciente->tx_nome}}</td>
                                        <td>{{ date('d/m/Y', strtotime($paciente->dt_nascimento)) }}</td>
                                        <td>{{$paciente->tx_email}}</td>
                                        <td>{{ $paciente->tx_localidade }}-{{ $paciente->tx_uf }}</td>
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
