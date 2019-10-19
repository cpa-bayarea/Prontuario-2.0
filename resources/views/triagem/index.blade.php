@extends('layouts.app')
@section('content-title', 'Triagem')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Listagem Triagem</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <a class="btn-small btn btn-success" type="button"
                    href="{{ route('triagem.create') }}">
                    <span class="glyphicon glyphicon-plus"></span> Novo
                </a>
 
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered datatable">
                        <thead>
                        <tr>
                            <th>Ações</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Data Nascimento</th>
                            <th>Triador</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paciente as $item)
                          <tr>
                              <td class="text-center">
                                  <form action="/triagem/delete/" method="POST">
                                    @csrf
                                    <a href="/triagem/edit/{{$item->id}}" class="btn btn-primary disabled" title="Editar"><span class="fa fa-edit"></span></a>
                                    <input type="hidden" name="paciente" value="{{$item->id}}">
                                    <button class="btn btn-danger link-excluir" type="submit" title="Excluir"><span class="fa fa-trash"></span></button>
                                </form>
                              </td>
                              <td> {{ $item->nome }} </td>
                              <td> {{ $item->cpf }} </td>
                              <td> {{ $dataNascimento = date("m-d-Y", strtotime($item->data_nascimento))  }} </td>
                              <td> {{ $item->triagem->aluno->tx_nome }} </td>
                              <td> {{ $item->status->status }} </td>
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
