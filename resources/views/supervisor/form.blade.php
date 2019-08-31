@extends('layouts.app')
@section('content-title', 'Cadastro de Supervisor')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dados Gerais</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" action="{{ route('supervisor.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nome" name="tx_nome" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mat" class="col-sm-2 control-label">Matrícula</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mat" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="telefone" name="nu_telefone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="celular" class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="celular" name="nu_celular">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="crp" class="col-sm-2 control-label">CRP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="crp" name="nu_crp" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="linha_teorica">Linha Teórica</label>
                                <div class="col-lg-10">
                                    <select name="linha_id" class="form-control" data-show-subtext="true"
                                            id="linha_teorica" data-live-search="true" required>

                                        <option selected="true">Selecione</option>
                                        @foreach($linhas as $linha)
                                            <option value="{{$linha->id}}">{{ $linha->tx_nome }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-send"></span>
                                        Salvar
                                    </button>
                                    <a href="{{ route('supervisor.index') }}" class="btn btn-danger">
                                        <span class="fa fa-reply"></span>
                                        Voltar
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
