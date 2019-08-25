@extends('layouts.app')
@section('content-title', 'Supervisor')
@section('content')
    <div class="col-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Listagem de Supervisores</h5>
                <a class="btn-small btn btn-success" style="margin-left: 93%" type="button"
                   href="{{ route('supervisor.create') }}">
                    <span class="glyphicon glyphicon-plus"></span>Novo
                </a>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CRP</th>
                        <th>Matrícula</th>
                        <th>Linha Teórica</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($supervisores as $supervisor)
                        <tr>
                            <td>{{ $supervisor->id }}</td>
                            <td>{{ $supervisor->tx_nome }}</td>
                            <td>{{ $supervisor->nu_crp }}</td>
                            <td>{{ $supervisor->username }}</td>
                            <td>{{ $supervisor->linhateorica->tx_nome }}</td>
                            <td align="center">
                                <a href="{{ route('supervisor.edit', $supervisor->id) }}"
                                   class="btn btn-primary glyphicon glyphicon-pencil">
                                </a>
                            </td>
                            <td align="center">
                                <form action="{{ route('supervisor.delete', $supervisor->id) }}" method="post">
                                    @csrf
                                <a>
                                    <button class="btn btn-danger linha-trash glyphicon glyphicon-trash" type="submit">
                                    </button>
                                </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
