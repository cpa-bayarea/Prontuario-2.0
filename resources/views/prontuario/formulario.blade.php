@extends('layouts.app')
@section('content-title', 'Prontuário')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Dados Gerais</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="/prontuario" method="post" class="form-horizontal">
                                @csrf

                                <input type="hidden" name="id" id="id" value="{{base64_encode($model->id)}}">

                                <div class="form-group">
                                    <label for="numero" class="col-sm-3 control-label">Número <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control inteiro" name="numero" id="numero" value="{{$model->numero}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paciente_id" class="col-sm-3 control-label">Paciente <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="paciente_id" class="form-control" id="paciente_id" required>
                                            <option value="">Selecione</option>
                                            @foreach($aPacientes as $paciente)
                                                <option  {{ $paciente->id == $model->paciente_id ? 'selected="selected"' : ''}} value="{{$paciente->id}}">{{$paciente->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="aluno_id" class="col-sm-3 control-label">Terapeuta <span class="obrigatorio">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="aluno_id" class="form-control" id="aluno_id" required>
                                            <option value="">Selecione</option>
                                            @foreach($aAlunos as $aluno)
                                                <option  {{ $aluno->id == $model->aluno_id ? 'selected="selected"' : ''}} value="{{$aluno->id}}">{{$aluno->tx_nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="valor" class="col-sm-3 control-label">Valor: </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="valor" id="valor" value="{{$model->valor}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prontuario_status_id" class="col-sm-3 control-label">Status: </label>
                                    <div class="col-sm-9">
                                        <select name="prontuario_status_id" class="form-control" id="prontuario_status_id" required>
                                            <option value="">Selecione</option>
                                            @foreach($aProntuarioStatus as $prontuarioStatus)
                                                <option  {{ $prontuarioStatus->id == $model->prontuario_status_id ? 'selected="selected"' : ''}} value="{{$prontuarioStatus->id}}">{{$prontuarioStatus->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Salvar</button>
                                        <a href="/prontuario" class="btn btn-danger"><span class="fa fa-hand-o-left"></span> Voltar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
