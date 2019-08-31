@extends('layouts.app')
@section('content-title', 'GrupoItens itens')
@section('content')




    <div class="container">


        <div class="card">
            <div class="card-body">
                <form action="/grupoitens" method="POST">
                    @if($grupoIten->id != '')
                        <input type="hidden" value="{{ $grupoIten->id }}" name="id">

                    @endif
                    @csrf

                    <div class="form-group">
                        <input type="hidden" value="">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome"
                               value="   {{ $grupoIten->nome }}" required placeholder="Nome">

                        <input type="hidden" value="{{$id}}" name="grupo_id">
                        <label>Ordem</label>
                        <input type="number" class="form-control" name="ordem"  value="{{ $grupoIten->ordem }}" required placeholder="Ordem">
                        <label>Outros</label>
                        <input type="text" class="form-control" name="outro"
                               value="   {{ $grupoIten->outro }}" required placeholder="Outros">

                    </div>
                    <div class="form-group">
                        @if($grupoIten->id != '')
                            <input type="submit" class="btn btn-success" value="Atualizar">
                        @else
                            <input type="submit" class="btn btn-success" value="Cadastrar">
                        @endif

                    </div>


                </form>
            </div>
        </div>


        <br>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    @foreach($grupoItens as $grupoIten)
                        <tr>

                            <th scope="col">Nome</th>
                            <th scope="col">Ordem</th>
                            <th scope="col"> grupo </th>
                            <th scope="col">Outros</th>
                            <th scope="col">Ações</th>

                        </tr>


                        <tr>

                            <td> {{ $grupoIten->nome }}</td>
                            <td> {{ $grupoIten->ordem }}</td>
                            <td> {{ $grupoIten->grupo->nome }}</td>
                            <td> {{ $grupoIten->outro }}</td>
                            <td>

                                <a class="btn btn-info" href="/grupoitens/edit/{{ $grupoIten->id }}"> Editar </a>

                                <form action="/grupoitens/{{ $grupoIten->id }}" method="POST">
                                    @csrf
                                    <input type="submit" value="Excluir" class="btn btn-danger">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection