@extends('layouts.app')
@section('content-title', 'Consultas')
@section('content')
    <div class="col-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Listagem de Alunos</h5>
                <a class="btn-small btn btn-success" style="margin-left: 93%" type="button"
                   href="{{ route('aluno.create') }}">
                    <span class="glyphicon glyphicon-plus"></span>Novo
                </a>
            </div>
            <div class="ibox-content">
                <table class="table" id="consultas">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Semestre</th>
                        <th>Supervisor</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->id }}</td>
                            <td>{{ $aluno->tx_nome }}</td>
                            <td>{{ $aluno->nu_semestre }}</td>
                            <td>{{ $aluno->username }}</td>
                            <td>{{ $aluno->supervisor->tx_nome }}</td>
                            <td align="center">
                                <a href="{{ route('aluno.edit', $aluno->id) }}"
                                   class="btn btn-primary glyphicon glyphicon-pencil">
                                </a>
                            </td>
                            <td align="center">
                                <form action="{{ route('aluno.delete', $aluno->id) }}" method="post">
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

@section('js')
    <script>
        $(document).ready( function () {
            $('#consultas').DataTable();
        } );
    </script>
@endsection
