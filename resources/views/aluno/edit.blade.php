@extends('layouts.app')
@section('content-title', 'Editar Aluno')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dados Gerais</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" action="{{ route('aluno.store') }}" method="post">
                            @csrf
                            <div id="oculto">
                                <input type="number" name="id" value="{{ $aluno->id }}" hidden>
                            </div>
                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label">Nome <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nome" name="tx_nome"
                                           value="{{ $aluno->tx_nome }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mat" class="col-sm-2 control-label">Matrícula <span
                                        class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" id="mat" name="username"
                                           maxlength="11" value="{{ $aluno->username }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefone" class="col-sm-2 control-label">Telefone <span class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" id="telefone" name="nu_telefone"
                                           value="{{ $aluno->nu_telefone }}" maxlength="10" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="celular" class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control inteiro" id="celular"
                                           value="{{ $aluno->nu_celular }}" maxlength="10" name="nu_celular">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sem" class="col-sm-2 control-label">Semestre <span
                                        class="obrigatorio">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="sem" name="nu_semestre" required
                                           value="{{ $aluno->nu_semestre }}" maxlength="2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="supervisor_id">Supervisor <span
                                        class="obrigatorio">*</span></label>
                                <div class="col-lg-10">
                                    <select name="supervisor_id" class="form-control" data-show-subtext="true"
                                            id="supervisor_id" data-live-search="true" required>
                                        <option disabled>Selecione</option>
                                        @foreach($supervisores as $supervisor)
                                            @php
                                                $checked = ($supervisor->id == $aluno->supervisor_id ) ? 'selected="true"' : '';
                                            @endphp
                                            <option {{ $checked  }} value="{{ $supervisor->id }}">
                                                {{ $supervisor->tx_nome }}
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
                                    <a href="{{ route('aluno.index') }}" class="btn btn-danger">
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
