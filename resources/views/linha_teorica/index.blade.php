@extends('layouts.app')
@section('content-title', 'Linha Teórica')
@section('content')
    <div class="col-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Listagem de Linha Teórica</h5>
                <a class="btn-small btn btn-success" style="margin-left: 93%" type="button"
                   href="{{ route('linha_teorica.create') }}">
                    <span class="glyphicon glyphicon-plus"></span>Novo
                </a>
            </div>
            <div class="ibox-content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data nascimento</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($linhas as $linha)
                        <tr>
                            <td>{{$linha->id}}</td>
                            <td>{{$linha->tx_nome}}</td>
                            <td>{{$linha->tx_desc}}</td>
                            <td align="center">
                                <a href="{{ route('linha_teorica.edit', $linha->id) }}"
                                   class="btn btn-primary glyphicon glyphicon-pencil">
                                </a>
                            </td>
                            <td align="center">
                                <form action="{{ route('linha_teorica.delete', $linha->id) }}" method="post">
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
