@extends('layouts.app')
@section('content-title', 'Grupos')
@section('content')




    <div class="container">


        <div class="card">
            <div class="card-body">
                <form action="/grupos" method="POST">
                    @if($grupo->id != '')
                        <input type="hidden"  required value="{{ $grupo->id }}" name="id">

                    @endif
                    @csrf

                    <div class="form-group">
                        <input type="hidden" value="">
                        <label>Nome  <span style="color:red">*</span> </label>

                        <input type="text" class="form-control" name="nome" aria-describedby="emailHelp"
                               value="   {{ $grupo->nome }}" required placeholder="Nome">

                    </div>
                    <div class="form-group">
                        @if($grupo->id != '')
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
                    @foreach($grupos as $grupo)
                        <tr>

                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>

                        </tr>


                        <tr>

                            <td> {{ $grupo->nome }}</td>
                            <td>
                                <a class="btn btn-success" href="/grupoitens/{{ $grupo->id }}"> Cadastrar Items</a>
                                <a class="btn btn-info" href="/grupos/edit/{{ $grupo->id }}"> Editar </a>

                                <form action="/grupos/{{ $grupo->id }}" method="POST">
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