@extends('layouts.app')
@section('content-title', 'Pacientes')
@section('content')


    <div class="col-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Dados Gerais</h5>
            </div>
            <div class="ibox-content">
                <a href="{{ route('prontuariostatus.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i>&nbsp;Novo</a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Nome completo</th>
                                <th>Data nascimento</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Cidade - UF</th>
                                <th> Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pacientes as $paciente)
                            <tr>
                                <td>{{$paciente->nome}}</td>
                                <td>{{ date('d/m/Y', strtotime($paciente->data_nascimento)) }}</td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-sm btn-w-m btn-success findById"
                                                value="{{$paciente->id}}" data-toggle="modal"
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
                                <td class="ibox-content">
                                    <form action="paciente/delete/{{$paciente->id}}" method="POST">
                                        @csrf
                                        <button class="btn btn-warning  dim" type="submit"><i
                                                class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-info  dim findById" value="{{$paciente->id}}"
                                            type="button">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('components.modal_telefone')
    </div>
@endsection
