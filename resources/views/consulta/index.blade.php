@extends('layouts.app')
@section('content-title', 'Consultas')
@section('content')

    <div class="col-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Consultas realizadas</h5>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Ações</th>
                                <th>Data</th>
                                <th>Paciente</th>
                                <th>Terapeuta</th>
                                <th>Supervisor</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($consultas as $consulta)
                            <tr>
                                <td>
                                    <a href="{{ route('consulta.edit', ($consulta->id)) }}" class="btn btn-primary" title="Editar">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                </td>
                                <td>{{ date('d/m/Y', strtotime($consulta->data)) }}</td>
                                <td>{{$consulta->paciente->nome}}</td>
                                <td>{{$consulta->aluno->tx_nome}}</td>
                                <td>{{$consulta->supervisor->tx_nome}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
