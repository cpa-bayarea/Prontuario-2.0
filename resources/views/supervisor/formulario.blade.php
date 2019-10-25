@extends('layouts.app')
@section('content-title', 'Supervisor')
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
                            <input type="hidden" name="id" id="id" value="{{base64_encode($model->id)}}">

                            <div class="form-group">
                                <label for="tx_nome" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tx_nome" id="tx_nome"
                                           value="{{ $model->tx_nome }}" maxlength="255" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Matrícula <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="username" id="username"
                                           value="{{ $model->username }}" maxlength="11" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nu_telefone" class="col-sm-2 control-label">Telefone <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="nu_telefone" id="nu_telefone"
                                           value="{{ $model->nu_telefone }}" maxlength="8" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nu_celular" class="col-sm-2 control-label">Celular <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" name="nu_celular" id="nu_celular"
                                           value="{{ $model->nu_celular }}" maxlength="8" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nu_crp" class="col-sm-2 control-label">CRP <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" id="nu_crp" name="nu_crp"
                                           value="{{ $model->nu_celular }}" required maxlength="7">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="linha_teorica">Linha Teórica <span class="obrigatorio">*</span></label>
                                <div class="col-lg-10">
                                    <select name="linha_id" class="form-control" data-show-subtext="true"
                                            id="linha_teorica" data-live-search="true" required>
                                        <option selected disabled>Selecione</option>
                                            @foreach($linhas as $linha)
                                                <option value="{{$linha->id}}" {{ ($model->linha_id == $linha->id) ? 'selected' : '' }}>
                                                    {{ $linha->tx_nome }}
                                                </option>
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
