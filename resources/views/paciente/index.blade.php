@extends('layouts.app')
@section('content-title', 'Pacientes')
@section('content')

    @if(count($pacientes) >= 1)
        <div class="col-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Listagem Pacientes</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Ações</th>
                                <th>#</th>
                                <th>Nome completo</th>
                                <th>Data nascimento</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Cidade - UF</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pacientes as $paciente)
                            <tr>
                                <td class="ibox-content">
                                    <button class="btn btn-warning  dim btn_cancel_paciente" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn btn-info  dim findById" value="{{$paciente->id}}" type="button">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                                <td class="id_paciente">{{$paciente->id}}</td>
                                <td>{{$paciente->nome}}</td>
                                <td>{{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}</td>
                                <td>
                                    <div class="text-center">
                                        <button type="button findById" class="btn btn-sm btn-w-m btn-success findById"
                                                value="{{$paciente->id}}" type="button" data-toggle="modal"
                                                data-target="#modalTelefone">Visualizar Telefone
                                        </button>
                                    </div>
                                </td>
                                <td>{{$paciente->email}}</td>
                                @if ($paciente->cidade_id)
                                    <td>{{$paciente->cidade->title}} - {{$paciente->cidade->uf->letter}}</td>
                                @else
                                    <td>--</td>

                                @endif

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('components.modal_telefone')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    @else
        <div class="col-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Nenhum paciente cadastrado!</h5>
                </div>
            </div>
        </div>
    @endif

@endsection
